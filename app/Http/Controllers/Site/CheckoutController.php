<?php

namespace App\Http\Controllers\Site;

use App\Traits\Paypal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller; 

use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\Payer;
use PayPal\Api\PaymentExecution;

use Auth;

class CheckoutController extends Controller
{
    //
    use Paypal;


    public function checkout(Request $request)
    {
        $apiContext = $this->getApiContext();

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $user = Auth::guard('web')->user();

        $items = [];
        $total = 0;
        foreach ($user->cart as $product) {
            $price = $product->discount? $product->discount : $product->price;
            $total += $price;

            $item = new Item();
            $item->setName($product->title)
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setSku($product->id) // Similar to `item_number` in Classic API
                ->setPrice($price);
            
            $items[] = $item;
        }
        $itemList = new ItemList();
        $itemList->setItems($items);

        $shipping = 3;
        $tax = 2;

        $details = new Details();
        $details->setShipping($shipping)
            ->setTax($tax)
            ->setSubtotal($total);

        $amount = new Amount();
        $amount->setCurrency('USD')
                ->setTotal($total + $tax + $shipping)
                ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('Checkout for user ' . $user->username)
            ->setInvoiceNumber('Test-1001');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(url(route('paypal.return')))
                     ->setCancelUrl(url(route('paypal.cancel')));

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        
        $payment = new Payment();
        $payment->setIntent('sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));

        try {
            $payment->create($apiContext);
        } catch (\Exception $e) {
            return $e->getData();
        }

        $approvalUrl = $payment->getApprovalLink();

        return Redirect::away($approvalUrl);
    }

    public function paypalReturn()
    {
        $apiContext = $this->getApiContext();
        $request = request();
        $success = $request->query('success');
        $paymentId = $request->query('paymentId');
        $payerId = $request->query('PayerID');
        if ($paymentId && $payerId) {
            
            $payment = Payment::get($paymentId, $apiContext);
            
            $execution = new PaymentExecution();
            $execution->setPayerId($payerId);
            $result = $payment->execute($execution, $apiContext);
            if ($result->getState() == 'approved') {
                $user = Auth::guard('web')->user();
                $transactions = $payment->getTransactions();
                PaymentTransaction::create([
                    'user_id' => $user->id,
                    'payment_id' => $paymentId,
                    'amount' => $transactions[0]->getAmount()->getTotal(),
                ]);

                $orders = [];
                foreach ($user->cart as $product) {
                    if (!array_key_exists($product->company_id, $orders)) {
                        $order = new Order();
                        $order->company_id = $product->company_id;
                        $order->user_id = $user->id;
                        $order->status = 'pending';

                        $orders[$product->company_id]['order'] = $order;
                        $orders[$product->company_id]['items'] = [];
                    }

                    $orders[$product->company_id]['items'][] = [
                        'product_id' => $product->id,
                        'price' => $product->price,
                        'quantity' => 1,
                    ];
                }

                foreach ($orders as $order) {
                    $order['order']->save();
                    $order->OrderProducts()->createMany($order['items']);
                }
                
                \DB::table('like')->where('user_id', $user->id)->delete();



                return $payment;
            }
            //return $payment;
        }


        return 'Failed';
    }

    public function paypalCancel()
    {
        return 'User Canceled!';
    }
}

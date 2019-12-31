<?php

namespace App\Http\Controllers;

use App\Traits\Paypal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\Payer;
use PayPal\Api\PaymentExecution;

class CheckoutController extends Controller
{
    //
    use Paypal;

    public function cart()
    {
        return view('cart');
    }

    public function checkout(Request $request)
    {
        $apiContext = $this->getApiContext();

        $payer = $this->createPayer();

        $item = new Item();
        $item->setName('Test Item')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice(15);
        $itemList = new ItemList();
        $itemList->setItems([$item]);

        $details = new Details();
        $details->setShipping(3)
            ->setTax(2)
            ->setSubtotal(15);

        $amount = new Amount();
        $amount->setCurrency('USD')
                ->setTotal(20)
                ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription('Test payment')
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
                return 'Success';
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

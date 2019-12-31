<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Logo;
use App\Manufacturer;
use App\Brand;
use App\Size;
use App\Color;
use App\Department;
use App\Part;
use App\ProductStat;
use App\Comment;
use App\Like;
use Auth;
use DB;

class HomeController extends Controller
{
    public function index()
    {  
        $company_id = request()->query('company_id', '');
		$products = Product::all();
        $manu = Manufacturer::all();
        $brand = Brand::all();
        $size = Size::all();
        $color = color::all();
        $title = request()->query('title', '');
    	return view('site.index', [
            'products' => $products,
            'manu' => $manu,
            'brand'=>$brand,
            'size' => $size,
            'color' =>$color,
            'title'=> $title,
            'company_id'=>$company_id,
            'logo' => Logo::first()->logo,
    	]);
    }

    public function view($id)
    {
		$product = Product::all()->find($id);
        $likeProduct=Product::find($id);
		
    	if (!$product) {
    		abort(404);
    	}
     $stat= ProductStat::updateOrCreate([
				'product_id' => $product->id,
			],[
				 'views' => DB::raw('views + 1'),
			]);


			//return $stat->post;


    	return view('site.view', [
            'product' => $product,
            'logo' => Logo::first()->logo,
    	]);
    }
    
    public function like($id){
        $product = Product::all()->find($id);
        $loggedin_user=Auth::user()->id;
        $like_user=Like::where(['user_id'=>$loggedin_user , 'product_id'=>$id])->first();
        if(empty($like_user ->user_id)){
            $user_id=Auth::user()->id;
            $email=Auth::user()->email;
            $product_id=$id;
            $like=new Like;
            $like->user_id=$user_id;
            $like->email=$email;
            $like->product_id=$product_id;
            $like->save();
            return view('site.view', [
            'product' => $product,
            'logo' => Logo::first()->logo,
    	]);
        }
        else{
            return view('site.view', [
            'product' => $product,
            'logo' => Logo::first()->logo,
    	]);
        }
        
        
    }
    
    
    public function comment(Request $request , $id){
        $this->validate($request,[
            'comment'=>'required'
        ]);
        $product = Product::all()->find($id);
        $comment= new Comment;
        $comment->comment =$request ->input('comment');
        $comment->user_id=Auth::user()->id;
        $comment->product_id=$id;
        $comment->name=Auth::user()->username;
        $comment->email=Auth::user()->email;
        $comment->approved = 0;
        $comment->save();
          return view('site.view', [
            'product' => $product,
            'logo' => Logo::first()->logo,
    	]);
    }


    public function brand($id)
        {
         $brand= Brand::findOrFail($id);
            $brandname=$brand->name;
            $products =$brand->product;
            return view('site.brand')->with([
			'products'=>$products,
            'brandname' => $brandname,
            'logo' => Logo::first()->logo,
        ]);
        
        }

        public function department($id)
        {
         $department= Department::findOrFail($id);
            $departmentname=$department->name;
            $products =$department->product;
            return view('site.department')->with([
			'products'=>$products,
            'departmentname' => $departmentname,
            'logo' => Logo::first()->logo,
        ]);
        
        }

        public function part($id)
        {
         $part= Part::findOrFail($id);
            $partname=$part->name;
            $products =$part->product;
            return view('site.part')->with([
			'products'=>$products,
            'partname' => $partname,
            'logo' => Logo::first()->logo,
        ]);
        
        }

        public function cart()
        {
            return view('site.cart', [
                'logo' => Logo::first()->logo,
            ]);
        }
}

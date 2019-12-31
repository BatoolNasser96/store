<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Logo;
use App\Manufacturer;
use App\Brand;
use App\Size;
use App\Color;
use App\Department;

class ProductsController extends Controller
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
    	return view('Admin.products.index', [
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

    public function search(){
        $company_id = request()->query('company_id', '');
        $title = request()->query('title', '');
        $products = Product::when($title, function($query, $title) {
            return $query->where('title', 'LIKE', '%' . $title . '%');})
            ->when($company_id, function($query, $company_id) {
            return $query->where('company_id', '=', $company_id);})
            ->orderBy('created_at', 'DESC')
            ->paginate();
        return view('Admin.products.index', [
        'title'=>$title,
        'products'=>$products,
        'company_id' =>$company_id,
        'logo' => Logo::first()->logo,
        ]);
    }
    public function create()
    {
    
        $manu = Manufacturer::all();
        $brand =Brand::all();
        $department=Department::all();
        if(is_null($manu)){
            return redirect()->route('admin.manufacturers.create') ;
           
        }else{
        return view('Admin.products.create')->with('logo' , Logo::first()->logo)
                                            ->with('manu' , $manu)
                                            ->with('brand' , $brand)
                                            ->with('department' , $department);
        }
    }

    
    public function store(Request $request)
    {
        
        	$request->validate([
            'title' => 'required|max:255|min:3',
    		'price' => 'required|max:255|min:1',
            'quantity' => 'required|max:3|min:0',
            'img' => 'required|image',
            'department_id'=> 'required|int',
            'part_id'=> 'required|int',
            'company_id'=> 'required|int',
            'state_id'=> 'required|int',
            'manfacturer_id'=> 'required|int',
            'brand_id'=> 'required|int',
            'size'=> 'required|int',
            'color'=> 'required',
        ]);
        $img = $request->file('img');
        $path = $img->store('images', 'public'); 

        $product = new Product();
       
    	$product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->img = $path;
        $product->department_id = $request->input('department_id');
        $product->part_id = $request->input('part_id');
        $product->company_id = $request->input('company_id');
        $product->state_id = $request->input('state_id');
        $product->manfacturer_id = $request->input('manfacturer_id');
        $product->brand_id = $request->input('brand_id');

        $product->save();
        
		$sizes = $request->post('size');
        $product->sizes()->sync($sizes);

        $colors = $request->post('color');
        $product->colors()->sync($colors);

    	return redirect( route('admin.products') )
                            ->with('message', sprintf('product "%s" created!', $product->title));
    }

    
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $sizes = $product->sizes->pluck('id')->toArray();
        $colors = $product->colors->pluck('id')->toArray();
    	return view('Admin.products.edit', [
			'product' => $product,
            'id'=>$id,
            'sizes'=>$sizes,
            'colors'=>$colors,
            'logo' => Logo::first()->logo,
    	]);
    }

   
    public function update(Request $request, $id)
    {
    	$request->validate([
    		'title' => 'required|max:255|min:3',
    		'price' => 'required|max:255|min:1',
            'quantity' => 'required|max:2|min:0',
            'img' => 'image',
            'department_id'=> 'required',
            'company_id'=> 'required',
            'state_id'=> 'required',
            'manfacturer_id'=> 'required',
            'brand_id'=> 'required',
            'size'=>'required',
            'color'=>'required',

        ]);
    	$product =  Product::findOrFail($id);
    	$product->title = $request->input('title');
        $product->price = $request->input('price');

        if ($request->hasFile('img')){
            $img = $request->file('img');
            $path = $img->store('images' , 'public'); 
            $product->img =  $path;
            }

        $product->quantity = $request->input('quantity');
        $product->department_id = $request->input('department_id');
        $product->company_id = $request->input('company_id');
        $product->state_id = $request->input('state_id');
        $product->manfacturer_id = $request->input('manfacturer_id');
        $product->brand_id = $request->input('brand_id');

		$product->save();
        $sizes = $request->post('size');
        $product->sizes()->sync($sizes);

        $colors = $request->post('color');
        $product->colors()->sync($colors);

    	return redirect( route('admin.products') )
    						->with('message', sprintf('product "%s" updated!', $product->title));
    }

    
    public function delete($id)
    {
     $product = Product::findOrFail($id);
    	$product->delete();

    	return redirect( route('admin.products') )
    						->with('message', sprintf('product "%s" deleted!', $product->title));
    						
    }
}

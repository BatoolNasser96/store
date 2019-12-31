<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manufacturer;
use App\Logo;
use App\Brand;
class BrandsController extends Controller
{

    public function search(){
        $name = request()->query('name', '');
        $brands = Brand::when($name, function($query, $name) {
            return $query->where('name', 'LIKE', '%' . $name . '%');})
            ->orderBy('created_at', 'DESC')
            ->paginate();
        return view('Admin.brands.index', [
        'name'=>$name,
        'brands'=>$brands,
        'logo' => Logo::first()->logo,
        ]);
    }

    
    public function index()
    {
        $name = request()->query('name', '');
         $manufacturer_id = request()->query('manufacturer_id', '');
		$brands = Brand::all();

    	return view('Admin.brands.index', [
            'manufacturer_id'=>$manufacturer_id,
            'name'=>$name,
            'brands' => $brands,
            'logo' => Logo::first()->logo,
    	]);
    }

    public function create()
    {
        return view('Admin.brands.create')->with('logo' , Logo::first()->logo);
    }

    public function store(Request $request)
    {
        	$request->validate([
            'name' => 'required|max:255|min:5',
            'img' => 'required|image',
            'manufacturer_id'=>'required|int',
        ]);
        $img = $request->file('img');
        $path = $img->store('images', 'public');
        
    	$brand = new Brand();
        $brand->name = $request->input('name');
        $brand->manufacturer_id = $request->input('manufacturer_id');
        $brand->img = $path;

		$brand->save();

    	return redirect( route('admin.brands.index') )
    						->with('message', sprintf('brand "%s" created!', $brand->name));
    }

    public function edit($id)
    {
        
        $brand = Brand::findOrFail($id);
    	return view('Admin.brands.edit', [
			'brand' => $brand,
            'id'=>$id,
            'logo' => Logo::first()->logo,
    	]);
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
            'name' => 'required|max:255|min:5',
            'img' => 'image',
            'manufacturer_id' => 'required|int',
            
    	]);
        $brand = Brand::findOrFail($id);
        if ($request->hasFile('img')){
            $img = $request->file('img');
            $path = $img->store('images' , 'public'); 
            $brand->img =  $path;
        }
      
    	$brand->name = $request->input('name');
        $brand->manufacturer_id = $request->input('manufacturer_id');
		$brand->save();
        
    	return redirect( route('admin.brands.index') )
    						->with('message', sprintf('brand "%s" updated!', $brand->name));
    }

   
    public function delete($id)
    {
     $brand = Brand::findOrFail($id);
     $brand->delete();

    	return redirect( route('admin.brands.index') )
    						->with('message', sprintf('brand "%s" deleted!', $brand->name));
    						
    }
}

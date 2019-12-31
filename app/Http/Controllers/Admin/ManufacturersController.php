<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manufacturer;
use App\Brand;
use App\Logo;
class ManufacturersController extends Controller
{
    public function search(){
        $name = request()->query('name', '');
        $manufacturers = Manufacturer::when($name, function($query, $name) {
            return $query->where('name', 'LIKE', '%' . $name . '%');})
            ->orderBy('created_at', 'DESC')
            ->paginate();
        return view('Admin.manufacturers.index', [
        'name'=>$name,
        'manufacturers'=>$manufacturers,
        'logo' => Logo::first()->logo,
        ]);
    }
    public function brands($manfacturerId)
  {
      return Brand::where('manufacturer_id', $manfacturerId)->get();
  }



    public function index()
    {
        $manufacturers = Manufacturer::all();
        $name = request()->query('name', '');
        $email = request()->query('email', '');
    	return view('Admin.manufacturers.index', [
            'manufacturers' => $manufacturers,
            'email'=>$email,
            'name'=>$name,
            'logo' => Logo::first()->logo,
    	]);
    }

    public function create()
    {
        return view('Admin.manufacturers.create')->with('logo' , Logo::first()->logo);
    }

   
    public function store(Request $request)
    {
        	$request->validate([
            'name' => 'required|max:255|min:5',
            'email' => 'required|email',
        ]);

    	$manufacturer = new Manufacturer();
        $manufacturer->name = $request->input('name');
        $manufacturer->email = $request->input('email');

		$manufacturer->save();

    	return redirect( route('admin.manufacturers.index') )
    						->with('message', sprintf('Manufacturer "%s" created!', $manufacturer->name));
    }

    

    public function edit($id)
    {
        
        $manufacturer = Manufacturer::findOrFail($id);
    	return view('Admin.manufacturers.edit', [
			'manufacturer' => $manufacturer,
            'id'=>$id,
            'logo' => Logo::first()->logo,
    	]);
    }
    public function update(Request $request, $id)
    {
    	$request->validate([
    		'name' => 'required|max:255|min:5',
            'email' => 'required|email',
    	]);
        $manufacturer = Manufacturer::findOrFail($id);
      
    	$manufacturer->name = $request->input('name');
        $manufacturer->email = $request->input('email');
		$manufacturer->save();

    	return redirect( route('admin.manufacturers.index') )
    						->with('message', sprintf('manufacturer "%s" updated!', $manufacturer->name));
    }

   
    public function delete($id)
    {
     $manufacturer = Manufacturer::findOrFail($id);
     $manufacturer->delete();

    	return redirect( route('admin.manufacturers.index') )
    						->with('message', sprintf('manufacturer "%s" deleted!', $manufacturer->name));
    						
    }
}

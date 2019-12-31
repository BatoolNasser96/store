<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use App\Company;
use App\Logo;
use App\Manufacturer;
class ChangeCompaniesController extends Controller
{
	//
	public function manufacturers($companyId)
    {
        $company=Company::findOrFail($companyId);
        return $company->manufacturers;

        
	}
	
    public function index()
    {
		$name = request()->query('name', '');
		$country_id = request()->query('country_id', '');
		$city_id = request()->query('city_id', '');
        $detail_addres = request()->query('detail_addres', '');
		$manufacturers =Manufacturer::all();
		 $company = Company::all();
		
         
    	return view('Admin.changecompany.index', [
            'country_id' =>$country_id,
        'company'=>$company,
		'city_id' =>$city_id,
			'name' => $name,
			'manufacturers'=>$manufacturers,
			'detail_addres' => $detail_addres,
			'logo' => Logo::first()->logo,
    	]);

      
	}
	public function search(){
		$country_id = request()->query('country_id', '');
		$city_id = request()->query('city_id', '');
        $name = request()->query('name', '');
        $company = Company::when($name, function($query, $name) {
            return $query->where('name', 'LIKE', '%' . $name . '%');})
            ->when($country_id, function($query, $country_id) {
			return $query->where('country_id', '=', $country_id);})
			->when($city_id, function($query, $city_id) {
				return $query->where('city_id', '=', $city_id);})
            ->orderBy('created_at', 'DESC')
            ->paginate();
        return view('Admin.changecompany.index', [
		'name'=>$name,
		'country_id' =>$country_id,
        'company'=>$company,
		'city_id' =>$city_id,
		
        'logo' => Logo::first()->logo,
        ]);
    }

    public function create()
    {
        //
     
        return view('Admin.changecompany.create')->with('logo' , Logo::first()->logo);
    }

    public function store(Request $request)
    {
        //
        	$request->validate([
    		'name' => 'required|max:255|min:2',
    		// 'detail_addres' => 'required',
    		'img' => 'required|image',
    		'country_id' => 'required|int',
			'city_id' => 'required|int',
			'detail_addres'=>'max:20',
    	]);
    	$img = $request->file('img');
    	$path = $img->store('images', 'public'); // ->storeAs('images', 'image.jpg')

    	$company = new Company();
    	$company->name = $request->input('name');
    	$company->detail_addres = $request->input('detail_addres');
    	$company->img = $path;
    	$company->country_id = $request->input('country_id');
        $company->city_id = $request->input('city_id');
		$company->save();

		$manufacturers = $request->post('manufacturer');
		$company->manufacturers()->sync($manufacturers);
		
        return  redirect (route('admin.changecompany.index')) ;
    }

    public function edit($id)
    {
        //
		$company = Company::findOrFail($id);
		$manufacturers = $company->manufacturers->pluck('id')->toArray();
    	return view('Admin.changecompany.edit', [
			'company' => $company,
			'id'=>$id,
			'manufacturers'=>$manufacturers,
			'logo' => Logo::first()->logo,
    	]);
    }


    public function update(Request $request, $id)
    {
    	$request->validate([
    		'name' => 'required|max:255|min:2',
    		'img' => 'image',
    		'country_id' => 'required|int',
			'city_id' => 'required|int',
			'detail_addres'=>'max:20',
			'manufacturer'=>'required',
    	]);
		$company = Company::findOrFail($id);
		if ($request->hasFile('img')){
            $img = $request->file('img');
            $path = $img->store('images' , 'public'); 
            $company->img =  $path;
        }
    	$company->name = $request->input('name');
    	$company->detail_addres = $request->input('detail-addres');
    	$company->country_id = $request->input('country_id');
        $company->city_id = $request->input('city_id');
		$company->save();

		$manufacturers = $request->post('manufacturer');
        $company->manufacturers()->sync($manufacturers);

    	return redirect( route('admin.changecompany.index') )
    						->with('message', sprintf('company "%s" updated!', $company->name));
    }

    public function delete($id)
    {
     $company = Company::findOrFail($id);
    	$company->delete();

    	return redirect( route('admin.changecompany.index') )
    						->with('message', sprintf('company "%s" deleted!', $company->name));
    						
    }


}

<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Company;
use App\Logo;
class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
//    public function __construct()
//    {
//        $this->middleware('guest:admin')->except('logout');
//    }

    
    public function index($id)
    {
         $company = Company::findOrFail($id);
         
    	return view('Admin.company.index', [
            'company' => $company,
            'logo' => Logo::first()->logo,
    	]);

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     
        return view('admin.company.create')->with('logo' , Logo::first()->logo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        	$request->validate([
    		'name' => 'required|max:255|min:2',
    		'detail_addres' => 'required',
    		'img' => 'required|image',
    		'country_id' => 'required|int',
            'city_id' => 'required|int',
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
		
        return route()->back()/* view('admin.company.index') */;
    }

 
    public function edit($id)
    {
        //
        $company = Company::findOrFail($id);
    	return view('Admin.company.edit', [
			'company' => $company,
            'id'=>$id,
            'logo' => Logo::first()->logo,
    	]);
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
    		'name' => 'required|max:255|min:2',
    		'detail_addres' => 'required',
    		'img' => 'image',
    		'country_id' => 'required|int',
            'city_id' => 'required|int',
    	]);$logo = Logo;
        $company = Company::findOrFail($id);
        if ($request->hasFile('img')){
            $img = $request->file('img');
            $path = $img->store('images' , 'public'); 
            $company->img =  $path;
        }
    	$company->name = $request->input('name');
    	$company->detail_addres = $request->input('detail-addres');
    	$company->img = $path;
    	$company->country_id = $request->input('country_id');
        $company->city_id = $request->input('city_id');
		$company->save();

    	return redirect( route('Admin.company') )
    						->with('message', sprintf('company "%s" updated!', $company->name));
    }

    public function destroy($id)
    {
     $company = Company::findOrFail($id);
    	$admin->delete();

    	return redirect( route('Admin.company') )
    						->with('message', sprintf('company "%s" deleted!', $company->name));
    						
    }
}

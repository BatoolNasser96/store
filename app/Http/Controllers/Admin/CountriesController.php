<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\City;
use App\Logo;

class CountriesController extends Controller
{
    public function search(){
        $name = request()->query('name', '');
        $countries = Country::when($name, function($query, $name) {
            return $query->where('name', 'LIKE', '%' . $name . '%');})
            ->orderBy('created_at', 'DESC')
            ->paginate();
        return view('Admin.countries.index', [
        'name'=>$name,
        'countries'=>$countries,
        'logo' => Logo::first()->logo,
        ]);
    }
 public function index()
 {
     //
     $name = request()->query('name', '');
     $countries = Country::paginate();

     return view('Admin.countries.index', [
         'countries' => $countries,
         'name' => $name,
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
     return view('Admin.countries.create')->with('logo' , Logo::first()->logo);
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
         'name' => 'required',
     ]);
     $country = new Country();
     $country->name = $request->input('name');

     $country->save();

     return redirect( route('admin.countries') )
                         ->with('message', sprintf('country "%s" created!', $country->name));
 }

 

 /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Admin  $admin
  * @return \Illuminate\Http\Response
  */
  
  public function cities($countryId)
  {
      //

      return City::where('country_id', $countryId)->get();
  }

  

 public function edit($id)
 {
     //
     $country = Country::findOrFail($id);
     return view('Admin.countries.edit', [
         'country' => $country,
         'id'=>$id,
         'logo' => Logo::first()->logo,
     ]);
 }

 /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Admin  $admin
  * @return \Illuminate\Http\Response
  */
 public function update(Request $request, $id)
 {
     $request->validate([
         'name' => 'required',
     ]);

     $country = Country::findOrFail($id);
     $country->name = $request->input('name');
     $country->save();

     return redirect( route('admin.countries') )
                         ->with('message', sprintf('country "%s" updated!', $country->name));
 }

 /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Admin  $admin
  * @return \Illuminate\Http\Response
  */
 public function delete($id)
 {
  $country = Country::findOrFail($id);
     $country->delete();

     return redirect( route('admin.countries') )
                         ->with('message', sprintf('country "%s" deleted!', $country->name));
                         
 }
}

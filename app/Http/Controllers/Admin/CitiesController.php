<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Logo;
class CitiesController extends Controller
{
    
    public function search(){
        $name = request()->query('name', '');
        $country_id = request()->query('country_id', '');
        $cities = City::when($name, function($query, $name) {
            return $query->where('name', 'LIKE', '%' . $name . '%');})
            ->when($country_id, function($query, $country_id) {
            return $query->where('country_id', '=', $country_id);})
            ->orderBy('created_at', 'DESC')
            ->paginate();
        return view('Admin.cities.index', [
        'name'=>$name,
        'cities'=>$cities,
        'country_id'=>$country_id,
        'logo' => Logo::first()->logo,
        ]);
    }
     public function index()
     {
         //
         $name = request()->query('name', '');
         $country_id = request()->query('country_id', '');
         $cities = City::paginate();
 
         return view('Admin.cities.index', [
             'cities' => $cities,
             'country_id' =>$country_id,
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
         return view('Admin.cities.create')->with('logo' , Logo::first()->logo);
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
             'country_id'=> 'required',
         ]);
         $city = new City();
         $city->name = $request->input('name');
         $city->country_id = $request->input('country_id');
         $city->save();
 
         return redirect( route('admin.cities') )
                             ->with('message', sprintf('City "%s" created!', $city->name));
     }
 
     
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Admin  $admin
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         //
         $city = City::findOrFail($id);
         return view('Admin.cities.edit', [
             'city' => $city,
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
 
         $city = City::findOrFail($id);
         $city->name = $request->input('name');
         $city->country_id = $request->inputy('country_id', '');
         $city->save();
 
         return redirect( route('admin.cities') )
                             ->with('message', sprintf('City "%s" updated!', $city->name));
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Admin  $admin
      * @return \Illuminate\Http\Response
      */
     public function delete($id)
     {
      $city = City::findOrFail($id);
         $city->delete();
 
         return redirect( route('admin.cities') )
                             ->with('message', sprintf('City "%s" deleted!', $city->name));
                             
     }
 
}

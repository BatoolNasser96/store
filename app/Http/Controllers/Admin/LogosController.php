<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Logo;

class LogosController extends Controller
{
    //
    public function index()
    {
		$logos = Logo::first();
    	return view('Admin.logos.index', [
            'logos' => $logos,
            'logo' => Logo::first()->logo,
        ]);
    }
    public function create()
    {
        //
        return view('Admin.logos.create')->with('logo' , Logo::first()->logo);
    }

    public function store(Request $request)
    {
        //
        	$request->validate([
                'logo' => 'required|image',
                'name' => 'required|max:255|min:5',
                'email' => 'required|email',
                'phone' => 'required|max:10|min:10',
                'Tfax' => 'required|max:14|min:14',
                'description' => 'required|max:255|min:5',
                'currency' => 'required|max:255|min:5',
        ]);
        
        $logo = $request->file('logo');
        $path = $logo->store('images', 'public');
        $logo = new Logo();
        $logo->logo = $path;
        $logo->name = $request->input('name');
        $logo->email = $request->input('email');
        $logo->phone = $request->input('phone');
        $logo->Tfax = $request->input('Tfax');
        $logo->description = $request->input('description');
        $logo->currency = $request->input('currency');
		$logo->save();
    	return redirect( route('admin.logos') )
    						->with('message', 'logo created!');
    }

    public function edit($id)
    {
        //
        $logos = Logo::findOrFail($id);
    	return view('Admin.logos.edit', [
			'logos' => $logos,
            'id'=>$id,
            'logo' => Logo::first()->logo,
    	]);
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
            'logo' => 'required|image',
            'name' => 'required|max:255|min:5',
            'email' => 'required|email',
            'phone' => 'required|max:10|min:10',
            'Tfax' => 'required|max:14|min:14',
            'description' => 'required|max:255|min:5',
            'currency' => 'required|max:255|min:5',
    	]);

    	$logo = $request->file('logo');
        $path = $logo->store('images', 'public');
        $logo = Logo::findOrFail($id);
        $logo->logo = $path;
        $logo->name = $request->input('name');
        $logo->email = $request->input('email');
        $logo->phone = $request->input('phone');
        $logo->Tfax = $request->input('Tfax');
        $logo->description = $request->input('description');
        $logo->currency = $request->input('currency');
		$logo->save();
    	return redirect( route('admin.logos') )
                                              ->with('message', 'logo update!');
    }

    public function delete($id)
    {
     $logo = Logo::findOrFail($id);
    	$logo->delete();

    	return redirect( route('admin.logos') )
                                      ->with('message', 'logo delete!');
    						
    }

}

  


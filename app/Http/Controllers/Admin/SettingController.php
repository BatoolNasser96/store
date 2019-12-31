<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Setting;
use App\Logo;
class SettingController extends Controller
{
    //
   
    
    public function index()
    {
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'))->with('logo' , Logo::first()->logo);
    }

    public function create()
    {
        return view('admin.settings.new')->with('logo' , Logo::first()->logo);
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        
        $settings = [
            'option.required' => 'Please fill setting name.',
            'slug.required' => 'Please fill setting slug.',
            'value.required' => 'Please fill setting value.',
        ];

        $this->validate($request,[
            'option' => 'required|max:255',
            'slug' => 'required|max:255',
            'value' => 'required',
        ], $settings);
        
        Setting::create($input)->id;

        /* Important ********** */
        //$cache->forget('settings');
        /* //Important ********** */
        
        $request->session()->flash('alert-success', 'Setting added successfully!');
        
        return redirect('/settings');
    }

    public function edit($id)
    {
        $setting   = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('setting'))->with('logo' , Logo::first()->logo);
    }

    public function update(Request $request, $id)
    {

        $input = $request->all();

        $messages = [
            'option.required' => 'Please fill setting name.',
            'slug.required' => 'Please fill setting slug.',
            'value.required' => 'Please fill setting value.',
        ];

        $this->validate($request,[
            'option' => 'required|max:255',
            'slug' => 'required|max:255',
            'value' => 'required',
        ], $messages);
        
        $data = Setting::findOrFail($id);
        $data->fill($input)->save();

        /* Important ********** */
       // $cache->forget('settings');
        /* //Important ********** */

        $request->session()->flash('alert-success', 'Setting updated successfully!');
        return redirect('/settings');
    }

    public function show($id)
    {
        $setting = Setting::findOrFail($id);
        return view('admin.settings.show', compact('setting'));
    }

    public function destroy($id, Request $request)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();
        $request->session()->flash('alert-success', 'Setting deleted successfully!');
        return redirect('/settings');
    }
}

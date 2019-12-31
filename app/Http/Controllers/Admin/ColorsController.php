<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Color;
use App\Logo;
use App\Part;
use App\PartColor;
class ColorsController extends Controller
{
    public function search(){
        $name = request()->query('name', '');
        $colors = Color::when($name, function($query, $name) {
            return $query->where('name', 'LIKE', '%' . $name . '%');})
            ->orderBy('created_at', 'DESC')
            ->paginate();
        return view('Admin.colors.index', [
        'name'=>$name,
        'colors'=>$colors,
        'logo' => Logo::first()->logo,
        ]);
    }
    public function index()
    {
        //
        $name = request()->query('name', '');
		$colors = Color::paginate();
        $parts = Part::all();
    	return view('Admin.colors.index', [
            'colors' => $colors,
            'name' => $name,
            'parts'=>$parts,
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
        return view('Admin.colors.create')->with('logo' , Logo::first()->logo);
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
    	$color = new Color();
    	$color->name = $request->input('name');

		$color->save();

    	return redirect( route('admin.colors') )
    						->with('message', sprintf('Color "%s" created!', $color->name));
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Color  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $color = Color::findOrFail($id);
        $parts = PartColor::where('color_id', $color->id)->pluck('part_id')->toArray();
    	
    	return view('Admin.colors.edit', [
			'color' => $color,
            'id'=>$id,
            'parts'=>$parts,
            'logo' => Logo::first()->logo,
    	]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$request->validate([
    		'name' => 'required',
    	]);

    	$color = Color::findOrFail($id);
    	$color->name = $request->input('name');
        $color->save();
        $parts=$request->post('part');
		
		$color->parts()->sync($parts);
    	return redirect( route('admin.colors') )
    						->with('message', sprintf('color "%s" updated!', $color->name));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
     $color = Color::findOrFail($id);
    	$color->delete();

    	return redirect( route('admin.colors') )
    						->with('message', sprintf('color "%s" deleted!', $color->name));
    						
    }
}

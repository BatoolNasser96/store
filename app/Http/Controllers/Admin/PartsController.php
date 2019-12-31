<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Part;
use App\Department;
use App\Logo;
use App\DepartmentPart;
class PartsController extends Controller
{
      public function show( $id)
    {     
        // $part = Part::findOrFail($id);
        // return view('Admin.part', compact('part'));
      
    }

    public function colors($partId)
    {
        $part=Part::findOrFail($partId);
        return $part->colors;

        
    }

    public function sizes($partId)
    {
        
        $part=Part::findOrFail($partId);
        
        return $part->sizes;

        
    }
    public function create()
    {
        //
        return view('Admin.part.create')->with('logo' , Logo::first()->logo);
    }
    public function store(Request $request)
    {
        //
        	$request->validate([
            'name' => 'required',
    	]);
    	$part = new Part();
        $part->name = $request->input('name');
        $part->save();

        $part2 = new DepartmentPart();
        $part2->part_id = $part->id;
        $part2->department_id = $request->input('modal_dep');
        $part2->save();

    	return redirect()->back()
    						->with('message', sprintf('Part "%s" created!', $part->name));
    }
    public function edit($id)
    {
        //
        
        $part = Part::findOrFail($id);
    	return view('Admin.colors.edit', [
			'part' => $part,
            'id'=>$id,
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

    	$part = Part::findOrFail($id);
    	$part->name = $request->input('name');
        $part->save();

        
    	return redirect()->back()
    						->with('message', sprintf('part "%s" updated!', $part->name));
    }
    public function delete($id)
    {
     $part = Part::findOrFail($id);
     $part->delete();

    	return redirect()->back()
    						->with('message', sprintf('part "%s" deleted!', $part->name));
    						
    }
}

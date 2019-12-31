<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Size;
use App\Logo;
use App\Part;
use App\PartSize;
class SizesController extends Controller
{
    public function search(){
        $name = request()->query('name', '');
        $sizes = Size::when($name, function($query, $name) {
            return $query->where('name', 'LIKE', '%' . $name . '%');})
            ->orderBy('created_at', 'DESC')
            ->paginate();
        return view('Admin.sizes.index', [
        'name'=>$name,
        'sizes'=>$sizes,
        'logo' => Logo::first()->logo,
        ]);
    }
    public function index()
    {
        //
        $name = request()->query('name', '');
		$sizes = Size::paginate();

    	return view('Admin.sizes.index', [
            'sizes' => $sizes,
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
        return view('Admin.sizes.create')->with('logo' , Logo::first()->logo);
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
    	$size = new Size();
    	$size->name = $request->input('name');

        $size->save();
 
        $parts = $request->post('part');
        $size->parts()->sync($parts);

    	return redirect( route('admin.sizes') )
    						->with('message', sprintf('Size "%s" created!', $size->name));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $size = Size::findOrFail($id);
        $parts = PartSize::where('size_id', $size->id)->pluck('part_id')->toArray();
    	return view('Admin.sizes.edit', [
			'size' => $size,
            'id'=>$id,
            'parts'=>$parts,
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

    	$size = Size::findOrFail($id);
    	$size->name = $request->input('name');
        $size->save();
        
		$parts=$request->post('part');
		
		$size->parts()->sync($parts);
       
        
    	return redirect( route('admin.sizes') )
    						->with('message', sprintf('size "%s" updated!', $size->name));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
     $size = Size::findOrFail($id);
    	$size->delete();

    	return redirect( route('admin.sizes') )
    						->with('message', sprintf('size "%s" deleted!', $size->name));
    						
    }
}

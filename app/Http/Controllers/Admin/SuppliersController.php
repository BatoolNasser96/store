<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;
use Hash;
use App\Logo;
class SuppliersController extends Controller
{
    //

    public function index()
    {
        $company_id = request()->query('company_id', '');
        $username = request()->query('username', '');
        $email = request()->query('email', '');
		$suppliers = Supplier::paginate();

    	return view('Admin.suppliers.index', [
            //'posts' => DB::table('admins')->get(),
            'company_id'=> $company_id,
            'suppliers' => $suppliers,
            'username' => $username,
            'email' => $email,
            'logo' => Logo::first()->logo,
    	]);
    }

    public function search(){
        $company_id = request()->query('company_id', '');
        $username = request()->query('username', '');
        $suppliers = Supplier::when($username, function($query, $username) {
            return $query->where('username', 'LIKE', '%' . $username . '%');})
            ->when($company_id, function($query, $company_id) {
            return $query->where('company_id', '=', $company_id);})
            ->orderBy('created_at', 'DESC')
            ->paginate();
        return view('Admin.suppliers.index', [
        'username'=>$username,
        'suppliers'=>$suppliers,
        'company_id' =>$company_id,
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
        return view('Admin.suppliers.create')->with('logo' , Logo::first()->logo);
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
            'company_id' => 'required',
    		'username' => 'required|max:255|min:5',
            'email' => 'required|email',
            'img' => 'required|image',
			//'password' => Hash::make($data['password']),
			'password' => 'required|string|max:4|min:4',
        ]);
        
        $img = $request->file('img');
        $path = $img->store('images', 'public'); 
        
        $pass=Hash::make( $request->input('password'));
        $supplier = new Supplier();
        $supplier->company_id = $request->input('company_id');
        $supplier->username = $request->input('username');
        $supplier->img = $path;
		$supplier->email = $request->input('email');
		$supplier->password = $pass;

		$supplier->save();

    	return redirect( route('admin.supplier') )
    						->with('message', sprintf('supplier "%s" created!', $supplier->username));
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
        $supplier = Supplier::findOrFail($id);
    	return view('Admin.suppliers.edit', [
			'supplier' => $supplier,
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
    		'username' => 'required|max:255|min:5',
            'email' => 'required|email',
            'img' => 'image',
        ]);
        $supplier = Supplier::findOrFail($id);
        if ($request->hasFile('img')){
            $img = $request->file('img');
            $path = $img->store('images' , 'public'); 
            $supplier->img =  $path;
        }
        $supplier->username = $request->input('username');
		$supplier->email = $request->input('email');
		$supplier->save();
		

    	return redirect( route('admin.supplier') )
    						->with('message', sprintf('supplier "%s" updated!', $supplier->username));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
     $supplier = Supplier::findOrFail($id);
    	$supplier->delete();
    	return redirect( route('admin.supplier') )
    						->with('message', sprintf('supplier "%s" deleted!', $supplier->username));
    						
    }
}

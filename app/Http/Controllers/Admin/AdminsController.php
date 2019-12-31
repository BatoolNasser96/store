<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Http\Request;
use App\AdminPerm;
use App\Logo;
use App\Size;
use Hash;
class AdminsController extends Controller
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

    
    public function index()
    {
        
        $username = request()->query('username', '');
		$email = request()->query('email', '');
		$admins = Admin::paginate();

    	return view('Admin.admins.index', [
            'admins' => $admins,
            'username' => $username,
            'email' => $email,
            'logo' => Logo::first()->logo,
    	]);
    }
    public function search(){
        $username = request()->query('username', '');
        $admins = Admin::when($username, function($query, $username) {
            return $query->where('username', 'LIKE', '%' . $username . '%');})
            ->orderBy('created_at', 'DESC')
            ->paginate();
        return view('Admin.admins.index', [
        'username'=>$username,
        'admins'=>$admins,
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
        return view('Admin.admins.create')->with('logo' , Logo::first()->logo);
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
            'name' => 'required|max:255|min:3',
    		'username' => 'required|max:255|min:5',
            'email' => 'required|email',
            'img' => 'required|image',
            'phone' => 'required|unique:admins|max:10|min:10',
			//'password' => Hash::make($data['password']),
			'password' => 'required|string|max:4|min:4',
        ]);
        
        $img = $request->file('img');
        $path = $img->store('images', 'public'); 

        $pass=Hash::make( $request->input('password'));
    	$admin = new Admin();
    	$admin->name = $request->input('name');
        $admin->username = $request->input('username');
        $admin->img = $path;
		$admin->email = $request->input('email');
        $admin->password = $pass;
        $admin->phone=$request->input('phone');
		$admin->save();
		$perms = $request->post('perm');
        $admin->perms()->sync($perms);

    	return redirect( route('admin.admins') )
                            ->with('message', sprintf('Admin "%s" created!', $admin->name));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
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
        $admin = Admin::findOrFail($id);
		$perms = $admin->perms->pluck('id')->toArray();
    	return view('Admin.admins.edit', [
			'admin' => $admin,
			'id'=>$id,
            'perms'=>$perms,
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
            
    		'name' => 'required|max:255|min:3',
            'username' => 'required|max:255|min:5',
            'img' => 'image',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        
        $admin = Admin::findOrFail($id);
        if ($request->hasFile('img')){
            $img = $request->file('img');
            $path = $img->store('images' , 'public'); 
            $admin->img =  $path;
        }
    	$admin->name = $request->input('name');
        $admin->username = $request->input('username');
        $admin->email = $request->input('email');
        $admin->phone=$request->input('phone');
		$admin->save();
		
		$perms=$request->post('perm');
		$admin->perms()->sync($perms);

    	return redirect( route('admin.admins') )
    						->with('message', sprintf('admin "%s" updated!', $admin->name));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
     $admin = Admin::findOrFail($id);
    	$admin->delete();

    	return redirect( route('admin.admins') )
    						->with('message', sprintf('admin "%s" deleted!', $admin->name));
    						
    }
}

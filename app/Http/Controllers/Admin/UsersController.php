<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;
use App\Department;
use Session;

use Illuminate\Http\Request;
use Hash;
use App\Logo;

class UsersController extends Controller
{
  
    // public function parent()
    // {     
    //    $departments = Department::where('parent',null)->get();
    //    return view('layouts.admin')->with('departments',$departments);
      
    // }

    public function index()
    {
        /* Session::forget('key');
        $parent_department = Department::where('parent',null)->get();
     Session::push('key', $parent_department);

     $child_department = Department::where('parent',1)->get();
     Session::push('key1', $child_department); */
        //$parent_department = Department::where('parent',null)->get();
       // Session::push('key', $parent_department);
       //Session::forget('key');
       /* Session::forget('key');
       Session::forget('key1'); */
       /* $abc1= collect(Session::get('key1'))->get(0);
       return $abc1; */
        // return Session::all();
        $username = request()->query('username', '');
        $email = request()->query('email', '');
		$users = User::paginate();

    	return view('Admin.users.index', [
    		//'posts' => DB::table('admins')->get(),
            'users' => $users,
            'username' => $username,
            'email' => $email,
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
        return view('Admin.users.create')->with('logo' , Logo::first()->logo);
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
    		'username' => 'required|max:255|min:5',
            'email' => 'required|email',
            'img' => 'required|image',
			//'password' => Hash::make($data['password']),
			'password' => 'required|string|max:4|min:4',
        ]);
        $img = $request->file('img');
        $path = $img->store('images', 'public'); 

        $pass=Hash::make( $request->input('password'));
    	$user = new User();
    	$user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->img = $path;
		$user->password = $pass;

		$user->save();

    	return redirect( route('admin.users') )
    						->with('message', sprintf('user "%s" created!', $user->username));
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
        $user = User::findOrFail($id);
    	return view('Admin.users.edit', [
			'user' => $user,
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
        if ($request->hasFile('img')){
            $img = $request->file('img');
            $path = $img->store('images' , 'public'); 
            $user->img =  $path;
        }
    	$user = User::findOrFail($id);
        $user->username = $request->input('username');
		$user->email = $request->input('email');
		$user->save();
		

    	return redirect( route('admin.users') )
    						->with('message', sprintf('user "%s" updated!', $user->username));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
     $user = User::findOrFail($id);
    	$user->delete();
    	return redirect( route('admin.users') )
    						->with('message', sprintf('user "%s" deleted!', $user->username));
    						
    }
}


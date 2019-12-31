<?php

namespace App\Http\Controllers\Admin\Auth;
//use Illuminate\
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
class LoginController extends Controller
{

    use AuthenticatesUsers;
    protected $maxAttempts = 3;
    protected $decayMinutes=2;
    protected $redirectTo = '/admin/Admin';
    
//   
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }

    public function showLoginForm(){
        return view ('Admin.auth.login');
    }
   
   

    protected function validateLogin(Request $request){
        $request->validate([
            $this->username()=>'required|string',
            'password'=>'required|string',
        ]);
    }
    
     public function dologin(Request $request){
         $c = $request->only('email','password');
         if(auth()->guard('admin')->attempt($c)){
             return redirect('admin/Admin');
             
         }else {
             return "failed";
         }
         
        
    }
    
    protected function guard(){
        return Auth::guard('admin');
    }

    public function username(){
        return  ('email');
    } 


    public function logout(){
        $this->guard()->logout();
            return redirect('/admin/login');
    }

    
}




    // use AuthenticatesUsers;

    // /**
    //  * Where to redirect users after login.
    //  *
    //  * @var string
    //  */
    // protected $redirectTo = '/home';

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }


    // /*
    // public function username()
    // {
    //     $login = request()->input('login');
    //     $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    //     request()->merge([$field => $login]);// replace in collection
    //     return $field;
    // } */
    // public function login(Request $request)
    // {
    //     $this->validate($request, [
    //             'email'    => 'required',
    //             'password' => 'required',
    //         ]);

    //     //Store Email field Value
    //     $loginValue = $request->input('email');

    //     //Get Login Type
    //     $login_type = $this->getLoginType( $loginValue);

    //     //Change request type based on user input
    //     $request->merge([
    //         $login_type => $loginValue
    //     ]);

    //     //Check Credentials and redirect
    //     if (Auth::attempt($request->only($login_type, 'password'), $request->get('remember'))) {
    //         return redirect()->intended($this->redirectPath());
    //     }
    //      return redirect()->back()->withInput()->withErrors([ 'email' => __("These credentials do not match our records.") ]);
    // }

    // //Check user input type
    // public function getLoginType($loginValue) {
    //     return filter_var($loginValue, FILTER_VALIDATE_EMAIL ) ? 'email' : ( (preg_match('%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i', $loginValue)) ? 'mobile' : 'username' );
    // }
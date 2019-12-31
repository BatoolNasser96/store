<?php

namespace App\Http\Controllers\Company\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    protected $maxAttempts = 3;
    protected $decayMinutes=2;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/e-commerce';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:company')->except('logout');
    }

    protected function validateLogin(Request $request){
        $request->validate([
            $this->username()=>'required|string',
            'password'=>'required|string',
        ]);
    }
    
     public function dologin(Request $request){
         $c = $request->only('username','password');
         if(auth()->guard('company')->attempt($c)){
             return redirect(route('company.index'));
             
         }else {
             return "failed";
         }
         
        
    }
    
    public function username()
    {
        return 'username';
    }

    protected function guard(){
        return Auth::guard('company');
    }


    public function showLoginForm(){
        return view ('company.auth.login');
    }

    
    public function logout(){
        $this->guard()->logout();
            return redirect('/company/login');
    }
}

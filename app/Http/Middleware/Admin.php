<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $guard=null)
    {
     if(Auth::guard($guard)->check()){
        return $next($request); 
     }else{
        return redirect('admin/login');  
     }
        

    //after middelware
    // $response=$next($request);
    // return response(strtoupper(
    //     (string) $response));
      
    }
}

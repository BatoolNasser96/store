<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Company 
{
    
    public function handle($request, Closure $next)
    {
     if(Auth::guard('company')->check()){
        return $next($request); 
     }
        return redirect('company/login');  
        
      
    }
}

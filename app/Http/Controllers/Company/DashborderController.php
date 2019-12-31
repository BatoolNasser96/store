<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Company;

class DashborderController extends Controller
{
    public function index()
    {
        $user = Auth::guard('company')->user();
        $company = $user->company;
        
        return $company->product;
    	
    }

    
}

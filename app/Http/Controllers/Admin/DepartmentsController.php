<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use compact;
use App\Logo;
use App\Part;

class DepartmentsController extends Controller
{
  
    public function index($id){
       $departments=Department::findOrFail($id);
       return view('Admin.department.index', [
			'departments' => $departments,
			'id'=>$id,
         'logo' => Logo::first()->logo,
    	]);
    }

    public function parts($departmentId)
    {
        $department=Department::findOrFail($departmentId);
        return $department->parts;

        
    }
}

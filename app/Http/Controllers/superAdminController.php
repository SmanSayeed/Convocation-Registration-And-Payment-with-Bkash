<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Support\Facades\Redirect;
session_start();

class superAdminController extends Controller
{
         public function __construct()
     {
     	 
     }

     public function adminAuthCheck(){
    	$admin_id = session::get('id');

    	if($admin_id!=null){
    		return view('admin.admin_master');
    	}else{
    		return redirect()->route('admin-login');
    	}
    }

	public function getdashboard()
    {
		
	 return $this->adminAuthCheck();
     
     // return view('admin.dashboard');
    }




     public function logout(){

        Session::flush();
       
        return redirect()->route('admin-login');
    }

}

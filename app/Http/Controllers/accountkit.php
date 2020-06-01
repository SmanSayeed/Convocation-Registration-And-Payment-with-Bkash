<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class accountkit extends Controller
{
    private $appId = '714424095692897';
    private $csrf = '0deea642deef3181945ac208aa88fe9f';
    private $version = 'v4.0';

    public function index(Request $request){
    	return view('/register',['appId'=>$this->appId,'csrf'=>$this->csrf,'version'=>$this->version]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class Dashboard extends Controller
{

	public function index()
	{
		
		if (!Session::has('admin')) {
    		return redirect()->route('admin_login');
    	}
    	
		return view('admin/dashboard');
	}
}
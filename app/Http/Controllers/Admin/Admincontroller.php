<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class Admincontroller extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}

    function get_admin_home(){
    	return view('admin/index');
    }
}

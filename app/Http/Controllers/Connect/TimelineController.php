<?php

namespace App\Http\Controllers\Connect;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
	function __construct(){
		$this->middleware(['auth','roles','subscription']);
	}

    function index(){
    	return view('connect.timeline.index');
    }
}

<?php

namespace App\Http\Controllers\Knitter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\UserMeasurements;
use Auth;
use App\Models\Subscription;

class KnitterController extends Controller
{
	function __construct(){
		$this->middleware('auth');
	}
	
    function index(User $user){
    	$measurements = User::find(Auth::user()->id)->measurements;
    	return view('knitter.dashboard',compact('measurements'));
    }
}

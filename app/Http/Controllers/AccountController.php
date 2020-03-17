<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Models\Orders;
use App\Models\Booking_process;

class AccountController extends Controller
{
    function __construct(){
    	$this->middleware('auth');
    }

    function my_account(){
    	$page = '';
    	$perPage = '';
    	return view('myaccount.account',compact('page','perPage'));
    }

    function my_address(){
    	$page = '';
    	$perPage = '';
    	return view('myaccount.address',compact('page','perPage'));
    }

    function myorders(){
    	$page = '';
    	$perPage = '';
    	$orders = Auth::user()->orders()->leftJoin('booking_process','booking_process.order_id','orders.id')->select('orders.order_number','orders.booking_datebooked','orders.total','booking_process.product_name','booking_process.product_id')->where('orders.order_status','Success')->paginate(10);

    	return view('myaccount.myorders',compact('page','perPage','orders'));
    }
}

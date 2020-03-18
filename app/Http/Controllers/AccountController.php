<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Models\Orders;
use App\Models\Booking_process;
use App\Models\UserAddress;

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
    	$address = UserAddress::where('user_id',Auth::user()->id)->paginate(5);
    	return view('myaccount.address',compact('page','perPage','address'));
    }

    function myorders(){
    	$page = '';
    	$perPage = '';
    	$orders = Auth::user()->orders()->leftJoin('booking_process','booking_process.order_id','orders.id')->select('orders.order_number','orders.booking_datebooked','orders.total','booking_process.product_name','booking_process.product_id')->where('orders.order_status','Success')->paginate(10);

    	return view('myaccount.myorders',compact('page','perPage','orders'));
    }

    function add_address(){
    	$page = '';
    	$perPage = '';
    	return view('myaccount.add-address',compact('page','perPage'));
    }

    function add_my_address(Request $request){

    	$validate = $request->validate([
    		'first_name' => 'required|alpha|min:3|max:20',
    		'last_name' => 'required|alpha|min:3|max:20',
    		'email' => 'required|email',
    		'mobile' => 'required|numaric',
    		'address' => 'required|string',
    		'city' => 'required',
    		'state' => 'required',
    		'country' => 'required',
    		'zipcode' => 'required|numaric'
    	]);

    		$add = new UserAddress;
	    	$add->user_id = Auth::user()->id;
	    	$add->type = 'billing';
	    	$add->first_name = $request->first_name;
	    	$add->last_name = $request->last_name;
	    	$add->email = $request->email;
	    	$add->mobile = $request->mobile;
	    	$add->address = $request->address;
	    	$add->city = $request->city;
	    	$add->state = $request->state;
	    	$add->country = $request->country;
	    	$add->zipcode = $request->zipcode;
	    	$add->is_default = 0;
	    	$add->status = 1;
	    	$add->created_at = Carbon::now();
	    	$save = $add->save();

	    	if($save){
	    		return redirect('my-address');
	    	}else{
	    		return redirect()->back();
	    	}
    }
}

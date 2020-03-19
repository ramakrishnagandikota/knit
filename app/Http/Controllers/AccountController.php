<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Models\Orders;
use App\Models\Booking_process;
use App\Models\UserAddress;
use Carbon\Carbon;
use Session;
use App\Mail\NewsletterMail;
use DB;

class AccountController extends Controller
{
    function __construct(){
    	$this->middleware('auth');
    }

    function my_account(){
    	$page = '';
    	$perPage = '';
    	$newsletters = DB::table('subscription')->where('user_id',Auth::user()->id)->first();
    return view('myaccount.account',compact('page','perPage','newsletters'));
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
    		'mobile' => 'required|integer',
    		'address' => 'required|string',
    		'city' => 'required',
    		'state' => 'required',
    		'country' => 'required',
    		'zipcode' => 'required|integer'
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
	    		Session::flash('success','Address added successfully');
	    		return redirect('my-address');
	    	}else{
	    		Session::flash('error','Unable to add address,Please check the data.');
	    		return redirect()->back();
	    	}
    }

    function edit_address(Request $request){
    	$page = '';
    	$perPage = '';
    	$id = base64_decode($request->id);
    	$add = UserAddress::where('id',$id)->first();
    	return view('myaccount.edit-address',compact('add','page','perPage'));
    }

    function update_my_address(Request $request){

    	$validate = $request->validate([
    		'first_name' => 'required|alpha|min:3|max:20',
    		'last_name' => 'required|alpha|min:3|max:20',
    		'email' => 'required|email',
    		'mobile' => 'required|numeric',
    		'address' => 'required|string',
    		'city' => 'required',
    		'state' => 'required',
    		'country' => 'required',
    		'zipcode' => 'required|integer'
    	]);

    	$id = base64_decode($request->id);

    		$add = UserAddress::find($id);
	    	//$add->user_id = Auth::user()->id;
	    	//$add->type = 'billing';
	    	$add->first_name = $request->first_name;
	    	$add->last_name = $request->last_name;
	    	$add->email = $request->email;
	    	$add->mobile = $request->mobile;
	    	$add->address = $request->address;
	    	$add->city = $request->city;
	    	$add->state = $request->state;
	    	$add->country = $request->country;
	    	$add->zipcode = $request->zipcode;
	    	//$add->is_default = 0;
	    	$add->status = 1;
	    	$add->updated_at = Carbon::now();
	    	$save = $add->save();

	    	if($save){
	    		Session::flash('success','Address updated successfully');
	    		return redirect('my-address');
	    	}else{
	    		Session::flash('error','Unable to update address,Please check the data.');
	    		return redirect()->back();
	    	}
    }

    function delete_address(Request $request){
    	$id = base64_decode($request->id);
    	$add = UserAddress::find($id);
    	$save = $add->delete();
    	if($save){
    		Session::flash('success','Address deleted successfully');
    	}else{
    		Session::flash('error','Unable to delete address,Please check the data.');
    	}
    	return redirect()->back();
    }

    function set_default_address(Request $request){
    	$id = base64_decode($request->id);

    	$array = array('is_default' => 0);
    	$ins = UserAddress::where('user_id',Auth::user()->id)->update($array);

    	$add = UserAddress::find($id);
    	$add->is_default = 1;
    	$save = $add->save();
    	if($save){
    		Session::flash('success','Selected address has set to default.');
    	}else{
    		Session::flash('error','Unable to set address default,Please try again after sometime.');
    	}
    	return redirect()->back();
    }

    function subscribe_newsletters(Request $request){
    	$count = DB::table('subscription')->count();

    	$array = array('user_id' => Auth::user()->id,'token' => md5($count),'subscription_type' => 'newsletters','email' => Auth::user()->email,'ipaddress' => $_SERVER['REMOTE_ADDR']);
    	$ins = DB::table('subscription')->insertGetId($array);
    	$details = [
		    'detail'=>'detail',
		    'name'  => ucwords(ucwords(Auth::user()->username)),
		    'email' =>Auth::user()->email,
			'token' => md5($count)
		];

            \Mail::to(Auth::user()->email)->send(new NewsletterMail($details));
            return redirect()->back();
    }

    function newsletter_unscbscribe(Request $request){
    	$token = $request->token;
    	$ins = DB::table('subscription')->where('token',$token)->delete();
    	return redirect()->back();
    }
}

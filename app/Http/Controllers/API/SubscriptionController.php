<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Subscription;
use App\Models\SubscriptionProperties;

class SubscriptionController extends Controller
{

	function sendJsonData($data){
		return response()->json(['data' => $data]);
	}
    
    function index(){
    	$jsonArray = array();
    	$subscription = Subscription::select('id','name','price_month','price_year')->where('status',1)->get();

    	for ($i=0; $i < count($subscription); $i++) { 
    		$jsonArray[$i]['id'] = $subscription[$i]->id;
    		$jsonArray[$i]['name'] = $subscription[$i]->name;
    		$jsonArray[$i]['price_month'] = $subscription[$i]->price_month;
    		$jsonArray[$i]['price_year'] = $subscription[$i]->price_year;
    		$jsonArray[$i]['details'] = SubscriptionProperties::where('subscriptions_id',$subscription[$i]->id)->select('property_name','property_limit')->get();
    	}

    	$array = array('subscription' => $jsonArray);
    	return $this->sendJsonData($array);
    }


}

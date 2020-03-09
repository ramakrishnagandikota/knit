<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Products;
use App\Models\Projectimages;
use App\Models\ProductComments;
use App\Models\Product_images;
use DB;
use Illuminate\Support\Str;

class ShoppingController extends Controller
{
	function __construct(){
		$this->middleware('auth');
	}

    function index(Request $request){

    	/* for ($i=1; $i <= 151; $i++) { 
    		$prod = Products::where('id',$i)->first();
    		$array = array('pid' => md5($prod->id));
    		$ins = DB::table('products')->where('id',$i)->update($array);
    	}

    	exit;
		*/

    	$perPage = ($request->get('perPage')) ? $request->get('perPage') : 25;
    	$page = ($request->get('page')) ? $request->get('page') : 1;
    	$orderBy = ($request->get('orderBy')) ? $request->get('orderBy') : 'Newest_first';

    	if($orderBy == '_Newest_first'){
    		$products = Products::orderBy('id','DESC')->paginate($perPage);
    	}else if($orderBy == 'Low_to_high'){
    		$products = Products::orderBy('price','ASC')->paginate($perPage);
    	}else if($orderBy == 'High_to_low'){
    		$products = Products::orderBy('price','DESC')->paginate($perPage);
    	}else if($orderBy == 'Popular'){
    		$products = DB::table("products")
	    ->select('products.*',DB::raw("SUM(product_comments.rating)/COUNT(product_comments.rating) as rate"))
	    ->leftjoin("product_comments","product_comments.product_id","=","products.id")->orderBy('rate','DESC')
	    ->groupBy("products.id")
	    ->paginate($perPage);
    	}else{
    		$products = Products::orderBy('id','ASC')->paginate($perPage);
    	}
    
    	return view('shopping.shop-patterns',compact('products','page','perPage','orderBy')); 	 	
    }

    function product_full_view(Request $request){
    	$page = '';
    	$perPage = '';
    	$pid = $request->pid;
    	$product = Products::where('pid',$pid)->first();
    	$product_images = Product_images::where('product_id',$product->id)->get();
    	$product_comments = ProductComments::where('product_id',$product->id)->get();
    	return view('shopping.product-fullview',compact('page','perPage','product','product_images','product_comments'));
    }

    function pattern_popup(Request $request){
    	$pid = $request->pid;
    	$product = Products::where('pid',$pid)->first();
    }
}

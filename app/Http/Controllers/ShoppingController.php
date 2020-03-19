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
use App\Models\GarmentConstruction;
use App\Models\GarmentType;
use App\Models\MasterList;
use App\Cart;
use Session;
use Carbon\Carbon;
use App\Models\ProductWishlist;

class ShoppingController extends Controller
{

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

        $garmentType = MasterList::where('type','garment_type')->get();
        $garmentConstruction = MasterList::where('type','garment_construction')->get();
        $designElements = MasterList::where('type','design_elements')->get();
        $shoulderConstruction = MasterList::where('type','shoulder_construction')->get();
    
    	return view('shopping.shop-patterns',compact('products','page','perPage','orderBy','garmentType','garmentConstruction','designElements','shoulderConstruction')); 	 	
    }

    function product_full_view(Request $request){
    	$page = '';
    	$perPage = '';
    	$pid = $request->pid;
    	$product = Products::where('pid',$pid)->first();
        if(!$product){
            return redirect()->back();
        }
    	$product_images = Product_images::where('product_id',$product->id)->get();
    	$wishlist = ProductWishlist::where('product_id',$product->id)->first();
    	return view('shopping.product-fullview',compact('page','perPage','product','product_images','wishlist'));
    }

    function pattern_popup(Request $request){
    	$pid = $request->pid;
    	$product = Products::where('pid',$pid)->first();
        return view('shopping.pattern-popup',compact('product'));
    }

    function add_comments(Request $request){
        
        if(!Auth::check()){
            return response()->json(['fail' => 'Please login to comment.']);
        }

        $comm = new ProductComments;
        $comm->user_id = Auth::user()->id;
        $comm->name = Auth::user()->first_name.' '.Auth::user()->last_name; 
        $comm->email = Auth::user()->email; 
        $comm->product_id = base64_decode($request->id);
        $comm->rating = $request->rating;
        $comm->comment = $request->comment;
        $comm->status = 1;
        $comm->created_at = Carbon::now();
        $save = $comm->save(); 
        if($save){
            return response()->json(['success' => 'Comment added successfully. Comment is sent for monitering & will be displayed soon.']);
        }else{
            return response()->json(['fail' => 'Unable to add comment, Try again sfter some time.']);
        }
    }


    function getproduct_comments(Request $request)
    {   
        $id = $request->id;
      // $comments = ProductComments::where('product_id',$id)->paginate(2);
      $comments = ProductComments::leftJoin('users','users.id','product_comments.user_id')
        ->select('users.picture','product_comments.id','product_comments.user_id','product_comments.name','product_comments.comment','product_comments.created_at','product_comments.rating')
        ->where('product_comments.status',1)
        ->where('product_comments.product_id',$id)->orderBy('product_comments.id','DESC')->paginate(2);
       if ($request->ajax()) {
            return view('shopping.product-comments', ['comments' => $comments])->render();  
        }
       return view('shopping.product-comments',compact('comments'));
    }

    function wishlist(Request $request){
        if($request->wishlist == 'add'){
            $wish = new ProductWishlist;
            $wish->user_id = Auth::user()->id;
            $wish->product_id = $request->product_id;
            $wish->ipaddress = $_SERVER['REMOTE_ADDR'];
            $wish->created_at = Carbon::now();
            $save = $wish->save();

if($save){
    return response()->json(['success' => 'Product added to wishlist.']);
}else{
    return response()->json(['fail' => 'Unable to add product to wishlist.']);
}

        }else{
            $del = ProductWishlist::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->delete();
if($del){
    return response()->json(['success' => 'Product removed from wishlist.']);
}else{
    return response()->json(['fail' => 'Unable to remove product from wishlist.']);
}
        }


    }


    function my_wishlist(){
        $page = '';
        $perPage = '';
        $wishlist = ProductWishlist::leftJoin('products','products.id','product_wishlist.product_id')
        ->leftJoin('users','users.id','product_wishlist.user_id')
        ->select('product_wishlist.id','products.id as proid','products.pid','products.product_name','products.slug','products.price','products.sale_price')
        ->where('product_wishlist.user_id',Auth::user()->id)->get();
        return view('shopping.wishlist',compact('wishlist','page','perPage'));
    }

    function remove_wishlist(Request $request){
        $id = $request->id;
        $del = ProductWishlist::where('id',$id)->delete();
        if($del){
            Session::flash('success','Product removed from wishlist.');
        }else{
            Session::flash('fail','Unable to remove product from wishlist.');
        }
        return redirect()->back();
    }

    function delete_comment(Request $request){
        $id = $request->product_id;
        $pro = ProductComments::find($id);
        $del = $pro->delete();
        if($del){
            return response()->json(['success' => 'Comment deleted successfully.']);
        }else{
            return response()->json(['fail' => 'Unable to delete comment, Try again after sometime.']);
        }
    }
}

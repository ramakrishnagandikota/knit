<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Products;
use App\Models\ProductComments;
use App\Models\Product_images;
use App\Models\MasterList;
use App\Models\NeedleSizes;
use App\Models\GaugeConversion;
use App\Models\ProductDesignerMeasurements;
use Carbon\Carbon;
use App\Models\ProductWishlist;
use DB;
use App\Http\Resources\ProductResource;

class ProductsController extends Controller
{

	public function sendResponse($result, $message)
    {
    	$response = [
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }

    function get_all_filters(){
    	$garmentType = MasterList::where('type','garment_type')->get();
        $garmentConstruction = MasterList::where('type','garment_construction')->get();
        $designElements = MasterList::where('type','design_elements')->get();
        $shoulderConstruction = MasterList::where('type','shoulder_construction')->get();

        $jsonArray['garmentType'] = array();
        $jsonArray['garmentConstruction'] = array();
        $jsonArray['designElements'] = array();
        $jsonArray['shoulderConstruction'] = array();
        $jsonArray['designer'] = array();
        $jsonArray['patternType'] = array();

        for ($i=0; $i < count($garmentType); $i++) { 
        	$jsonArray['garmentType'][$i]['name'] = $garmentType[$i]->name;
        	$jsonArray['garmentType'][$i]['slug'] = $garmentType[$i]->slug;
        }

        for ($j=0; $j < count($garmentConstruction); $j++) { 
        	$jsonArray['garmentConstruction'][$j]['name'] = $garmentConstruction[$j]->name;
        	$jsonArray['garmentConstruction'][$j]['slug'] = $garmentConstruction[$j]->slug;
        }

        for ($k=0; $k < count($designElements); $k++) { 
        	$jsonArray['designElements'][$k]['name'] = $designElements[$k]->name;
        	$jsonArray['designElements'][$k]['slug'] = $designElements[$k]->slug;
        }

        for ($l=0; $l < count($shoulderConstruction); $l++) { 
        	$jsonArray['shoulderConstruction'][$l]['name'] = $shoulderConstruction[$l]->name;
        	$jsonArray['shoulderConstruction'][$l]['slug'] = $shoulderConstruction[$l]->slug;
        }

        $jsonArray['designer'][0]['name'] = 'Knit Fit Couture';
        $jsonArray['designer'][0]['slug'] = 'knit-fit-couture';

        $jsonArray['patternType'][0]['name'] = 'Custom';
        $jsonArray['patternType'][0]['slug'] = 'custom';

        $jsonArray['patternType'][1]['name'] = 'Non Custom';
        $jsonArray['patternType'][1]['slug'] = 'non-custom';

        return $this->sendResponse($jsonArray, '');
    }


    function get_products_data(){
    	$jsonArray = array();
    	$products = Products::where('status',1)->get();

    	for ($i=0; $i < count($products); $i++) { 
    		$jsonArray[$i]['id'] = $products[$i]['id'];
    		$jsonArray[$i]['product_name'] = $products[$i]['product_name'];
    		$jsonArray[$i]['is_custom'] = ($products[$i]['is_custom'] == 1) ? 'custom' : 'non-custom';
    		if($products[$i]['sale_price_start_date'] <= date('Y-m-d') && $products[$i]['sale_price_end_date'] >= date('Y-m-d')){
    			$jsonArray[$i]['price'] = $products[$i]['price'];
    			$jsonArray[$i]['sale_price'] = $products[$i]['sale_price'];
    		}else{
    			$jsonArray[$i]['price'] = $products[$i]['price'];
    			$jsonArray[$i]['sale_price'] = '';
    		}
    		
    		$jsonArray[$i]['garment_type'] = $products[$i]['garment_type'];
    		$jsonArray[$i]['garment_construction'] = $products[$i]['garment_construction'];
    		$jsonArray[$i]['design_elements'] = $products[$i]['design_elements'];
    		$jsonArray[$i]['shoulder_construction'] = $products[$i]['shoulder_construction'];

    		$jsonArray[$i]['image'] = Product_images::where('product_id',$products[$i]['id'])->select('image_small')->first(); 

    		$rate = DB::table("products")
	    ->select(DB::raw("SUM(product_comments.rating)/COUNT(product_comments.rating) as rate"))
	    ->leftjoin("product_comments","product_comments.product_id","=","products.id")->where('products.id',$products[$i]['id'])->orderBy('rate','DESC')
	    ->groupBy("products.id")->first();

	    $jsonArray[$i]['rating'] = (int) $rate->rate;
    	}

    	return $this->sendResponse($jsonArray, '');
    }

    function show(Products $product){
    	return new ProductResource($product);
    }
}

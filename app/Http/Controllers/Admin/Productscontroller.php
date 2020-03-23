<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\Products;
use Illuminate\Http\Response;
use DB;
use App\Models\Category;
use App\Models\Subcategory;
use Paginate;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Validator;
use File;
use Schema;
use App\Models\Country;
use App\Models\Filters;
use App\Models\Product_attribute;
use App\Models\Product_images;
use Session;
use Image;
use Illuminate\Support\Str;
use App\Models\GarmentType;
use App\Models\GarmentConstruction;
use App\Models\NeedleSizes;
use App\Models\GaugeConversion;
use App\Models\ProductDesignerMeasurements;
use Carbon\Carbon;
use App\Models\ProductPdf;
use App\Models\MasterList;

class Productscontroller extends Controller
{
    public function __construct(){
		$this->middleware('auth');
	}

	function my_products(Request $request){
        $type = $request->type;
        if($type == 'all'){
            $products = Products::get();
        }else if($type == 'active'){
            $products = Products::where('status',1)->get();
        }else if($type == 'inactive'){
            $products = Products::where('status','!=',1)->get();
        }else{
            $products = Products::get();
        }
    	return view('admin.products.index',compact('products'));
    }

    function add_new_pattern(){
        $pcount = DB::table('products')->count();
        $subcategory = Subcategory::where('category_id',1)->get();
        $garmentType = MasterList::where('type','garment_type')->get();
        $garmentConstruction = MasterList::where('type','garment_construction')->get();
        $designElements = MasterList::where('type','design_elements')->get();
        $shoulderConstruction = MasterList::where('type','shoulder_construction')->get();
        $needlesizes = NeedleSizes::all();
        $gaugeconversion = GaugeConversion::all();
        return view('admin.products.add-product',compact('pcount','subcategory','garmentType','garmentConstruction','needlesizes','gaugeconversion','designElements','shoulderConstruction'));
    }

    function upload_image(Request $request){
        $image = $request->file('file');
            $filename = time().'-'.$image->getClientOriginalName();
            $ext = $image->getClientOriginalExtension();

         $s3 = \Storage::disk('s3');
        //exit;
        $filepath = 'knitfit/'.$filename;

        
        $ext = 'jpg';
        $img = Image::make($image);
        $height = Image::make($image)->height();
        $width = Image::make($image)->width();
        $img->orientate();
        $img->resize($width, $height, function ($constraint) {
            //$constraint->aspectRatio();
        });
        $img->encode('jpg');
        $pu = $s3->put('/'.$filepath, $img->__toString(), 'public');
    	

       if($pu){
         return response()->json(['path1' => $filepath, 'path' => 'https://s3.us-east-2.amazonaws.com/knitfitcoall/'.$filepath,'ext' => $ext]);
     }else{
        echo 'error';
     }
        
    }

    function product_images(Request $request){
    	$image = $request->file('file');
    	for ($i=0; $i < count($image); $i++) { 
            $filename = time().'-'.$image[$i]->getClientOriginalName();
            $ext = $image[$i]->getClientOriginalExtension();

         $s3 = \Storage::disk('s3');
        //exit;
        $filepath = 'knitfit/'.$filename;

        if($ext == 'pdf'){
        	$pu = $s3->put('/'.$filepath, file_get_contents($image[$i]),'public');
        }else{
        $ext = 'jpg';
        $img = Image::make($image[$i]);
        $height = Image::make($image[$i])->height();
        $width = Image::make($image[$i])->width();
        $img->orientate();
        $img->resize($width, $height, function ($constraint) {
            //$constraint->aspectRatio();
        });
        $img->encode('jpg');
        $pu = $s3->put('/'.$filepath, $img->__toString(), 'public');
    	}

       if($pu){
         return response()->json(['path1' => $filepath, 'path' => 'https://s3.us-east-2.amazonaws.com/knitfitcoall/'.$filepath,'ext' => $ext]);
     }else{
        echo 'error';
     }
        }
    }

    function upload_product(Request $request){
    	$pcount = Products::count() + 1;

        if($request->garment_type){
            $garmentType = implode(',',$request->garment_type);
        }else{
            $garmentType = '';
        }

        if($request->garment_construction){
            $garmentConstruction = implode(',',$request->garment_construction);
        }else{
            $garmentConstruction = '';
        }

        if($request->design_elements){
            $designElements = implode(',',$request->design_elements);
        }else{
            $designElements = '';
        }

        if($request->shoulder_construction){
        $shoulderConstruction = implode(',',$request->shoulder_construction);
        }else{
        $shoulderConstruction = '';
        }
    	
    	

    	$pro = new Products;
    	$pro->user_id = Auth::user()->id;
    	$pro->pid = md5($pcount);
    	$pro->product_name = $request->name;
    	$pro->slug = Str::slug($request->name);
    	$pro->short_description = $request->short_description;
    	$pro->product_description = $request->description;
    	$pro->additional_information = $request->additional_information;
    	$pro->skill_level = $request->skill_level;
    	$pro->category_id = 1;
    	$pro->sku = $request->sku;
    	$pro->is_custom = $request->is_custom;
    	$pro->design_type = $request->sub_category_name;
    	$pro->product_go_live_date = date('Y-m-d',strtotime($request->set_product_new_to_date));
    	$pro->status = $request->status;
    	$pro->price = $request->price;
    	$pro->sale_price = $request->special_price;
    	$pro->sale_price_start_date = date('Y-m-d',strtotime($request->special_price_start_date));
    	$pro->sale_price_end_date = date('Y-m-d',strtotime($request->special_price_end_date));
    	$pro->recommended_yarn = $request->recommended_yarn;
    	$pro->recommended_fiber_type = $request->recommended_fiber_type;
    	$pro->recommended_yarn_weight = $request->recommended_yarn_weight;
    	$pro->recommended_needle_size = $request->recommended_needle_size;
    	$pro->additional_tools = $request->additional_tools;
    	$pro->designer_recommended_uom = $request->designer_recommended_uom;
    	if($request->designer_recommended_uom == 'in'){
    		$pro->designer_recommended_ease_in = $request->designer_recommended_ease_in;
    		$pro->recommended_stitch_gauge_in = $request->recommended_stitch_gauge_in;
    		$pro->recommended_row_gauge_in = $request->recommended_row_gauge_in;
    	}else{
    		$pro->designer_recommended_ease_cm = $request->designer_recommended_ease_cm;
    		$pro->recommended_stitch_gauge_cm = $request->recommended_stitch_gauge_cm;
    		$pro->recommended_row_gauge_cm = $request->recommended_row_gauge_cm;
    	}
    	
    	
    	$pro->garment_type = $garmentType;
    	$pro->garment_construction = $garmentConstruction;
        $pro->design_elements = $designElements;
        $pro->shoulder_construction = $shoulderConstruction;
    	$pro->created_at = Carbon::now();
    	$pro->ipaddress = $_SERVER['REMOTE_ADDR'];
    	$save = $pro->save();

    	if($save){

	    	for ($i=0; $i < count($request->measurement_name); $i++) { 
	    		$name = $request->measurement_name[$i];
	    		$str_to_lower = strtolower($name);
	    		$underscore = str_replace(' ', '_', $str_to_lower);

	    		$measurements = new ProductDesignerMeasurements;
	    		$measurements->user_id = Auth::user()->id;
	    		$measurements->product_id = $pro->id;
	    		$measurements->measurement_name = $underscore;
	    		$measurements->measurement_value = '';
	    		$measurements->measurement_type = 'text';
	    		$measurements->measurement_description = $request->measurement_description[$i];
	    		$measurements->measurement_image = $request->measurement_image[$i];
	    		$measurements->status = 1;
	    		$measurements->created_at = Carbon::now();
	    		$measurements->ipaddress = $_SERVER['REMOTE_ADDR'];
	    		$measurements->save();
	    	}

            if($request->images){
	    	for ($j=0; $j < count($request->images); $j++) { 
	    		$image = new Product_images;
	    		$image->user_id = Auth::user()->id; 
	    		$image->product_id = $pro->id;
	    		$image->image_small = $request->images[$j];
	    		$image->image_medium = $request->images[$j];
	    		$image->image_large = $request->images[$j];
	    		if($j == 0){
	    			$image->main_photo = 1;
	    		}
	    		$image->status = 1;
	    		$image->save();
	    	}
        }

	    	return response()->json(['status' => 'Success']);

    	}else{
    		return response()->json(['status' => 'Fail']);
    	}
    }


    function update_product(Request $request){
        //echo '<pre>';
        //print_r($request->all());
        //echo '</pre>';
        //exit;
    	$pcount = Products::count() + 1;

    	if($request->garment_type){
            $garmentType = implode(',',$request->garment_type);
        }else{
            $garmentType = '';
        }

        if($request->garment_construction){
            $garmentConstruction = implode(',',$request->garment_construction);
        }else{
            $garmentConstruction = '';
        }

        if($request->design_elements){
            $designElements = implode(',',$request->design_elements);
        }else{
            $designElements = '';
        }

        if($request->shoulder_construction){
        $shoulderConstruction = implode(',',$request->shoulder_construction);
        }else{
        $shoulderConstruction = '';
        }


    	$pro = Products::find($request->id);
    	//$pro->user_id = Auth::user()->id;
    	//$pro->pid = md5($pcount);
    	$pro->product_name = $request->name;
    	$pro->slug = Str::slug($request->name);
    	$pro->short_description = $request->short_description;
    	$pro->product_description = $request->description;
    	$pro->additional_information = $request->additional_information;
    	$pro->skill_level = $request->skill_level;
    	$pro->category_id = 1;
    	$pro->sku = $request->sku;
    	$pro->is_custom = $request->is_custom;
    	$pro->design_type = $request->sub_category_name;
    	$pro->product_go_live_date = date('Y-m-d',strtotime($request->set_product_new_to_date));
    	$pro->status = $request->status;
    	$pro->price = $request->price;
    	$pro->sale_price = $request->special_price;
    	$pro->sale_price_start_date = date('Y-m-d',strtotime($request->special_price_start_date));
    	$pro->sale_price_end_date = date('Y-m-d',strtotime($request->special_price_end_date));
    	$pro->recommended_yarn = $request->recommended_yarn;
    	$pro->recommended_fiber_type = $request->recommended_fiber_type;
    	$pro->recommended_yarn_weight = $request->recommended_yarn_weight;
    	$pro->recommended_needle_size = $request->recommended_needle_size;
    	$pro->additional_tools = $request->additional_tools;
    	$pro->designer_recommended_uom = $request->designer_recommended_uom;
    	if($request->designer_recommended_uom == 'in'){
    		$pro->designer_recommended_ease_in = $request->designer_recommended_ease_in;
    		$pro->recommended_stitch_gauge_in = $request->recommended_stitch_gauge_in;
    		$pro->recommended_row_gauge_in = $request->recommended_row_gauge_in;
    	}else{
    		$pro->designer_recommended_ease_cm = $request->designer_recommended_ease_cm;
    		$pro->recommended_stitch_gauge_cm = $request->recommended_stitch_gauge_cm;
    		$pro->recommended_row_gauge_cm = $request->recommended_row_gauge_cm;
    	}
    	
    	
    	$pro->garment_type = $garmentType;
    	$pro->garment_construction = $garmentConstruction;
        $pro->design_elements = $designElements;
        $pro->shoulder_construction = $shoulderConstruction;
    	$pro->updated_at = Carbon::now();
    	$pro->ipaddress = $_SERVER['REMOTE_ADDR'];
    	$save = $pro->save();

    	if($save){

	    	for ($i=0; $i < count($request->measurement_name); $i++) { 
	    		$name = $request->measurement_name[$i];
	    		$str_to_lower = strtolower($name);
	    		$underscore = str_replace(' ', '_', $str_to_lower);

	    		if($request->measurement_id[$i] != 0){
	    		$measurements = ProductDesignerMeasurements::find($request->measurement_id[$i]);
	    		$measurements->measurement_name = $underscore;
	    		$measurements->measurement_description = $request->measurement_description[$i];
	    		if($request->measurement_image[$i] != ''){
	    			$measurements->measurement_image = $request->measurement_image[$i];
	    		}
	    		$measurements->updated_at = Carbon::now();
	    		$measurements->ipaddress = $_SERVER['REMOTE_ADDR'];
	    		$measurements->save();
	    		}else{
	    		$measurements = new ProductDesignerMeasurements;
	    		$measurements->user_id = Auth::user()->id;
	    		$measurements->product_id = $pro->id;
	    		$measurements->measurement_name = $underscore;
	    		$measurements->measurement_type = 'text';
	    		$measurements->measurement_description = $request->measurement_description[$i];
	    		
	    		$measurements->measurement_image = $request->measurement_image[$i];
	    		$measurements->status = 1;
	    		$measurements->created_at = Carbon::now();
	    		$measurements->ipaddress = $_SERVER['REMOTE_ADDR'];
	    		$measurements->save();
	    		}

	    		
	    	}

	    	if($request->images){
	    	for ($j=0; $j < count($request->images); $j++) { 
	    		$image = new Product_images;
	    		$image->user_id = Auth::user()->id; 
	    		$image->product_id = $pro->id;
	    		$image->image_small = $request->images[$j];
	    		$image->image_medium = $request->images[$j];
	    		$image->image_large = $request->images[$j];
	    		if($j == 0){
	    			$image->main_photo = 1;
	    		}
	    		$image->status = 1;
	    		$image->save();
	    	}
	    }

	    	return response()->json(['status' => 'Success']);

    	}else{
    		return response()->json(['status' => 'Fail']);
    	}
    }


    function edit_product(Request $request){
    	$pid = $request->pid;
    	$subcategory = Subcategory::where('category_id',1)->get();
        $garmentType = MasterList::where('type','garment_type')->get();
        $garmentConstruction = MasterList::where('type','garment_construction')->get();
        $designElements = MasterList::where('type','design_elements')->get();
        $shoulderConstruction = MasterList::where('type','shoulder_construction')->get();
        $needlesizes = NeedleSizes::all();
        $gaugeconversion = GaugeConversion::all();
    	$product = Products::where('pid',$pid)->first();
    	$measurements = ProductDesignerMeasurements::where('product_id',$product->id)->get();
    	$product_images = Product_images::where('product_id',$product->id)->get();
    	return view('admin.products.edit-product',compact('product','measurements','product_images','subcategory','garmentType','garmentConstruction','gaugeconversion','needlesizes','designElements','shoulderConstruction'));
    }

    function remove_product_image(Request $request){
    	$id = $request->id;
    	$product_images = Product_images::find($id);
    	$del = $product_images->delete();
    	if($del){
    		return response()->json(['status' => 'Success']);
    	}else{
    		return response()->json(['status' => 'Fail']);
    	}
    }

    function delete_measurement(Request $request){
    	$meas = ProductDesignerMeasurements::find($request->id);
    	$del = $meas->delete();
    	if($del){
    		return response()->json(['status' => 'Success']);
    	}else{
    		return response()->json(['status' => 'Fail']);
    	}
    }

    function delete_product(Request $request){
    	$pro = Products::find($request->id);
    	$pro->status = 0;
    	$save = $pro->save();
    	if($save){
    		return response()->json(['status' => 'Success']);
    	}else{
    		return response()->json(['status' => 'Fail']);
    	}
    }

    /* function create_pattern(Request $request){
    	$pid = $request->pid;
    	$product = Products::where('pid',$pid)->first();
    	$pdf = ProductPdf::where('product_id',$product->id)->first();
    	return view('admin.products.pattern-template',compact('pid','pdf','product'));
    }

    function add_pattern_instructions(Request $request){
    	if($request->id == 0){
    		$pdf = new ProductPdf;
    		$pdf->user_id = Auth::user()->id;
    		$pdf->product_id = $request->product_id;
    		$pdf->created_at = Carbon::now();
    		$pdf->ipaddress = $_SERVER['REMOTE_ADDR'];
    	}else{
    		$pdf = ProductPdf::find($request->id);
    		$pdf->updated_at = Carbon::now();
    		$pdf->ipaddress = $_SERVER['REMOTE_ADDR'];
    	}
    	$pdf->content = $request->content;
    	$save = $pdf->save();
    	if($save){
    		return response()->json(['status' => 'Success']);
    	}else{
    		return response()->json(['status' => 'Fail']);
    	}
    } */

    function create_pattern(Request $request){
        $product_id = $request->id;
        $data = DB::table('product_pdf')->where('product_id',$request->id)->first();
        return view('admin.products.pattern.index',compact('product_id','data'));
    }

    function create_pattern_pdf(Request $request){
        if($request->id == 0){
            $array = array('product_id'=>$request->product_id,'content' => $request->content,'e_content'=> $request->econtent);
            $ins = DB::table('product_pdf')->insert($array);
        }else{
            $array = array('content' => $request->content,'e_content'=> $request->econtent);
            $ins = DB::table('product_pdf')->where('id',$request->id)->update($array);
        }

        if($ins){
            return 0;
        }else{
            return 1;
        }
    }

    function get_images_for_pattern(Request $request){
        $images = DB::table('pattern_images')->get();
        return view('admin.products.pattern.get-images',compact('images'));
    }

    function upload_images_for_pattern(Request $request){
        $image = $request->file('nomefile');
        $filename = time().$image->getClientOriginalName();
        $name = basename($filename);

        $s3 = \Storage::disk('s3');
        $filepath = '/knitfit/products/'.$filename;
        $pu1 = $s3->put($filepath, file_get_contents($image), 'public');

      
        $array = array('title' => $name,'image_path' => "https://s3.us-east-2.amazonaws.com/".env('AWS_BUCKET').$filepath);
        $ins = DB::table('pattern_images')->insert($array);
         
    }
}

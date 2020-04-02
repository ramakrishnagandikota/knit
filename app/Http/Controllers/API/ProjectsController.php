<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProjectsResource;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use App\Models\User;
use App\Models\Project;
use DB;
use App\Models\UserMeasurements;
use Carbon\Carbon;
use Image;
use File;
use App\Models\Projectimages;
use App\Models\Projectneedle;
use App\Models\Projectyarn;
use App\Models\NeedleSizes;
use App\Models\GaugeConversion;
use Illuminate\Support\Str;
use App\Models\ProjectNotes;
use App\Models\Products;
use App\Models\Product_images;
use App\Models\ProductPdf;
use App\Models\ProductDesignerMeasurements;
use App\Models\ProjectsDesignerMeasurements;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\IReader;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\MeasurementResource;

class ProjectsController extends Controller
{

	function sendJsonData($data){
		return response()->json(['data' => $data]);
	}

	public function get_project_library(){

		$jsonArray = array();
		$jsonArray1 = array();
		$jsonArray2 = array();
		$jsonArray3 = array();

		$products = DB::table('booking_process')
		->leftJoin('products', 'booking_process.product_id', 'products.id')
		->select('booking_process.created_at','products.id','products.product_name')
		->where('booking_process.category_id', 1)
		->where('booking_process.user_id', Auth::user()->id)
		->get();

		for ($i=0; $i < count($products); $i++) { 
			$jsonArray[$i]['id'] = $products[$i]->id;
			$jsonArray[$i]['product_name'] = $products[$i]->product_name;
			$jsonArray[$i]['created_at'] = $products[$i]->created_at;
			$jsonArray[$i]['images'] = Product_images::where('product_id',$products[$i]->id)->select('image_medium')->take(1)->get();
		}

		$data = array();

		$jsonArray1 = $this->get_generated_patterns();
		$jsonArray2 = $this->get_workinprogress_patterns();
		$jsonArray3 = $this->get_completed_patterns();

		$array = array('new_patterns' => $jsonArray,'generated_patterns' => $jsonArray1,'work_in_progress' => $jsonArray2,'completed' => $jsonArray3);
		return $this->sendJsonData($array);
	}

	function get_project_library_archive(){
			$jsonArray = array();
		$jsonArray1 = array();
		$jsonArray2 = array();
		$jsonArray3 = array();

		$products = DB::table('booking_process')
		->leftJoin('products', 'booking_process.product_id', 'products.id')
		->select('booking_process.created_at','products.id','products.product_name')
		->where('booking_process.category_id', 1)
		->where('booking_process.user_id', Auth::user()->id)
		->get();

		for ($i=0; $i < count($products); $i++) { 
			$jsonArray[$i]['id'] = $products[$i]->id;
			$jsonArray[$i]['product_name'] = $products[$i]->product_name;
			$jsonArray[$i]['created_at'] = $products[$i]->created_at;
			$jsonArray[$i]['images'] = Product_images::where('product_id',$products[$i]->id)->select('image_medium')->take(1)->get();
		}

		$data = array();

		$jsonArray1 = $this->get_generated_patterns_archive();
		$jsonArray2 = $this->get_workinprogress_patterns_archive();
		$jsonArray3 = $this->get_completed_patterns_archive();

		$array = array('new_patterns' => $jsonArray,'generated_patterns' => $jsonArray1,'work_in_progress' => $jsonArray2,'completed' => $jsonArray3);
		return $this->sendJsonData($array);
	}


	function get_generated_patterns(){
		$jsonArray = array();

$jsonA = Auth::user()->projects()->where('status',1)->where('is_archive',0)->where('is_deleted',0)->select('id','name','pattern_type','created_at','updated_at')->get();
//$jq = $jsonArray1['generated_patterns'];
for ($i=0; $i < count($jsonA); $i++){
	$id = $jsonA[$i]->id;
	$jsonArray[$i]['id'] = $jsonA[$i]->id;
	$jsonArray[$i]['name'] = $jsonA[$i]->name;
	$jsonArray[$i]['pattern_type'] = $jsonA[$i]->pattern_type;
	$jsonArray[$i]['created_at'] = $jsonA[$i]->created_at;
	$jsonArray[$i]['updated_at'] = $jsonA[$i]->updated_at;
	$jsonArray[$i]['image'] = Projectimages::where('project_id',$id)->select('image_path')->take(1)->get();
}

if(count($jsonA) > 0){
		return $jsonArray;
		}else{
		return $jsonArray;	
		} 
		//return response()->json(['generated_patterns' => [$jsonArray]]);
	}

	function get_workinprogress_patterns(){
		$jsonArray = array();

		$winp = Auth::user()->projects()->where('status',2)->where('is_archive',0)->where('is_deleted',0)->select('id','name','pattern_type','created_at','updated_at')->get();

for ($j=0; $j < count($winp); $j++){
	$id = $winp[$j]->id;
	$jsonArray[$j]['id'] = $winp[$j]->id;
	$jsonArray[$j]['name'] = $winp[$j]->name;
	$jsonArray[$j]['pattern_type'] = $winp[$j]->pattern_type;
	$jsonArray[$j]['created_at'] = $winp[$j]->created_at;
	$jsonArray[$j]['updated_at'] = $winp[$j]->updated_at;
	$jsonArray[$j]['image'] = Projectimages::where('project_id',$id)->select('image_path')->take(1)->get();
}

if(count($winp) > 0){
		return $jsonArray;
		}else{
		return $jsonArray;	
		} 
		//return response()->json(['work_in_progress' => [$jsonArray]]);

	}

	function get_completed_patterns(){
		$jsonArray = array();

		$comp = Auth::user()->projects()->where('status',3)->where('is_archive',0)->where('is_deleted',0)->select('id','name','pattern_type','created_at','updated_at')->get();

		for ($k=0; $k < count($comp); $k++){
			$id = $comp[$k]->id;
			$jsonArray[$k]['id'] = $comp[$k]->id;
			$jsonArray[$k]['name'] = $comp[$k]->name;
			$jsonArray[$k]['pattern_type'] = $comp[$k]->pattern_type;
			$jsonArray[$k]['created_at'] = $comp[$k]->created_at;
			$jsonArray[$k]['updated_at'] = $comp[$k]->updated_at;
			$jsonArray[$k]['image'] = Projectimages::where('project_id',$id)->select('image_path')->take(1)->get();
		}
		if(count($comp) > 0){
		return $jsonArray;
		}else{
		return $jsonArray;	
		} 
	}

	function move_to_generated(Request $request){
		$jsonArray = array();

		$project = Project::find($request->id);
		$project->status = 1;
		$project->updated_at = Carbon::now();
		$save = $project->save();

		if($save){
			$gp = Auth::user()->projects()->where('status',1)->where('is_archive',0)->where('is_deleted',0)->where('id',$request->id)->select('id','name','pattern_type','created_at','updated_at')->get();
		for ($i=0; $i < count($gp); $i++){
	$id = $gp[$i]->id;
	$jsonArray['id'] = $gp[$i]->id;
	$jsonArray['name'] = $gp[$i]->name;
	$jsonArray['pattern_type'] = $gp[$i]->pattern_type;
	$jsonArray['created_at'] = $gp[$i]->created_at;
	$jsonArray['updated_at'] = $gp[$i]->updated_at;
	$jsonArray['image'] = Projectimages::where('project_id',$id)->select('image_path')->take(1)->get();
}
$array = array('generated_patterns' => [$jsonArray]);
return $this->sendJsonData($array);
			//return response()->json(['data' => $jsonArray]);
		}else{
			return response()->json(['error' => true,'message' => 'unable to load data']);
		}
	}

	function move_to_workinprogress(Request $request){
		$jsonArray = array();

		$project = Project::find($request->id);
		$project->status = 2;
		$project->updated_at = Carbon::now();
		$save = $project->save();
		


		if($save){
			$winp = Auth::user()->projects()->where('status',2)->where('is_archive',0)->where('is_deleted',0)->where('id',$request->id)->select('id','name','pattern_type','created_at','updated_at')->get();
		for ($j=0; $j < count($winp); $j++){
	$id = $winp[$j]->id;
	$jsonArray['id'] = $winp[$j]->id;
	$jsonArray['name'] = $winp[$j]->name;
	$jsonArray['pattern_type'] = $winp[$j]->pattern_type;
	$jsonArray['created_at'] = $winp[$j]->created_at;
	$jsonArray['updated_at'] = $winp[$j]->updated_at;
	$jsonArray['image'] = Projectimages::where('project_id',$id)->select('image_path')->take(1)->get();
}
			//return response()->json(['data' => [$jsonArray]]);
			$array = array('work_in_progress' => [$jsonArray]);
			return $this->sendJsonData($array);
		}else{
			return response()->json(['error' => true,'message' => 'unable to load data']);
		}
	}

	function move_to_completed(Request $request){
		$jsonArray = array();

		$project = Project::find($request->id);
		$project->status = 3;
		$project->updated_at = Carbon::now();
		$save = $project->save();

		if($save){
			$com = Auth::user()->projects()->where('status',3)->where('is_archive',0)->where('is_deleted',0)->where('id',$request->id)->select('id','name','pattern_type','created_at','updated_at')->get();
		for ($k=0; $k < count($com); $k++){
			$id = $com[$k]->id;
			$jsonArray['id'] = $com[$k]->id;
			$jsonArray['name'] = $com[$k]->name;
			$jsonArray['pattern_type'] = $com[$k]->pattern_type;
			$jsonArray['created_at'] = $com[$k]->created_at;
			$jsonArray['updated_at'] = $com[$k]->updated_at;
			$jsonArray['image'] = Projectimages::where('project_id',$id)->select('image_path')->take(1)->get();
		}
			$array = array('completed' => [$jsonArray]);
			return $this->sendJsonData($array);
		}else{
			return response()->json(['error' => true,'message' => 'unable to load data']);
		}
	}


	function move_to_archive(Request $request){
		$project = Project::find($request->id);
		$project->is_archive = 1;
		$project->updated_at = Carbon::now();
		$save = $project->save();
		if($save){
			return response()->json(['success' => true]);
		}else{
			return response()->json(['error' => true,'message' => 'unable to load data']);
		}
	}

	function move_to_project_library(Request $request){
		$project = Project::find($request->id);
		$project->is_archive = 0;
		$project->updated_at = Carbon::now();
		$save = $project->save();
		if($save){
			return response()->json(['success' => true]);
		}else{
			return response()->json(['error' => true,'message' => 'unable to load data']);
		}
	}


	function get_generated_patterns_archive(){
		$jsonArray = array();

$jsonA = Auth::user()->projects()->where('status',1)->where('is_archive',1)->where('is_deleted',0)->select('id','name','pattern_type','created_at','updated_at')->get();
//$jq = $jsonArray1['generated_patterns'];
for ($i=0; $i < count($jsonA); $i++){
	$id = $jsonA[$i]->id;
	$jsonArray[$i]['id'] = $jsonA[$i]->id;
	$jsonArray[$i]['name'] = $jsonA[$i]->name;
	$jsonArray[$i]['pattern_type'] = $jsonA[$i]->pattern_type;
	$jsonArray[$i]['created_at'] = $jsonA[$i]->created_at;
	$jsonArray[$i]['updated_at'] = $jsonA[$i]->updated_at;
	$jsonArray[$i]['image'] = Projectimages::where('project_id',$id)->select('image_path')->take(1)->get();
}

if(count($jsonA) > 0){
		return $jsonArray;
		}else{
		return $jsonArray;	
		} 
		//return response()->json(['generated_patterns' => [$jsonArray]]);
	}

	function get_workinprogress_patterns_archive(){
		$jsonArray = array();

		$winp = Auth::user()->projects()->where('status',2)->where('is_archive',1)->where('is_deleted',0)->select('id','name','pattern_type','created_at','updated_at')->get();

for ($j=0; $j < count($winp); $j++){
	$id = $winp[$j]->id;
	$jsonArray[$j]['id'] = $winp[$j]->id;
	$jsonArray[$j]['name'] = $winp[$j]->name;
	$jsonArray[$j]['pattern_type'] = $winp[$j]->pattern_type;
	$jsonArray[$j]['created_at'] = $winp[$j]->created_at;
	$jsonArray[$j]['updated_at'] = $winp[$j]->updated_at;
	$jsonArray[$j]['image'] = Projectimages::where('project_id',$id)->select('image_path')->take(1)->get();
}

if(count($winp) > 0){
		return $jsonArray;
		}else{
		return $jsonArray;	
		} 
		//return response()->json(['work_in_progress' => [$jsonArray]]);

	}

	function get_completed_patterns_archive(){
		$jsonArray = array();

		$comp = Auth::user()->projects()->where('status',3)->where('is_archive',1)->where('is_deleted',0)->select('id','name','pattern_type','created_at','updated_at')->get();

		for ($k=0; $k < count($comp); $k++){
			$id = $comp[$k]->id;
			$jsonArray[$k]['id'] = $comp[$k]->id;
			$jsonArray[$k]['name'] = $comp[$k]->name;
			$jsonArray[$k]['pattern_type'] = $comp[$k]->pattern_type;
			$jsonArray[$k]['created_at'] = $comp[$k]->created_at;
			$jsonArray[$k]['updated_at'] = $comp[$k]->updated_at;
			$jsonArray[$k]['image'] = Projectimages::where('project_id',$id)->select('image_path')->take(1)->get();
		}
		if(count($comp) > 0){
		return $jsonArray;
		}else{
		return $jsonArray;	
		} 
	}

	function project_delete(Request $request){
		$id = $request->id;
		$project = Project::where('id',$id)->where('user_id',Auth::user()->id)->count();
		if($project == 0){
			return response()->json(['error' => true,'message' => 'Unable to access this project']);
		}else{
			$project = Project::find($id);
			$project->is_deleted = 1;
			$save = $project->save();
			if($save){
				return response()->json(['success' => true]);
			}else{
				return response()->json(['error' => true,'message' => 'unable to delete project']);
			}
		}
	}


	/* create custom project */

	function available_products(Request $request){
		$jsonArray = array();
		if($request->type == 'custom'){
			$type = 1;
		}else{
			$type = 0;
		}



		$products = DB::table('booking_process')
		->leftJoin('products', 'booking_process.product_id', 'products.id')
		->select('booking_process.created_at','products.id','products.product_name')
		->where('booking_process.category_id', 1)
		->where('booking_process.user_id', Auth::user()->id)
		->where('products.is_custom',$type)
		->get();

		if($products){
		for ($i=0; $i < count($products); $i++) { 
			$jsonArray[$i]['id'] = $products[$i]->id;
			$jsonArray[$i]['product_name'] = $products[$i]->product_name;
		}
		}else{
			$jsonArray = array();
		}
		return $this->sendJsonData(['products' => $jsonArray]);
		
	}

	function get_products_data(Request $request){
		$jsonArray = array();
		$jsonArray1 = array();
		$jsonArray2 = array();
		$jsonArray3 = array();

		$id = $request->id;
		$products = Products::where('id',$id)->take(1)->get();
		$needlesizes = NeedleSizes::all();
        $gaugeconversion = GaugeConversion::all();
        $measurements = Auth::user()->measurements;
		
		for ($i=0; $i < count($products); $i++) { 
			$jsonArray[$i]['id'] = $products[$i]->id;
			$jsonArray[$i]['product_name'] = $products[$i]->product_name;
			$jsonArray[$i]['product_description'] = $products[$i]->product_description;
			$jsonArray[$i]['additional_information'] = $products[$i]->additional_information;
			$jsonArray[$i]['skill_level'] = $products[$i]->skill_level;
			$jsonArray[$i]['recommended_yarn'] = $products[$i]->recommended_yarn;
			$jsonArray[$i]['recommended_fiber_type'] = $products[$i]->recommended_fiber_type;
			$jsonArray[$i]['recommended_yarn_weight'] = $products[$i]->recommended_yarn_weight;
			$jsonArray[$i]['recommended_needle_size'] = $products[$i]->recommended_needle_size;
			$jsonArray[$i]['additional_tools'] = $products[$i]->additional_tools;
			$jsonArray[$i]['designer_recommended_uom'] = $products[$i]->designer_recommended_uom;
			$jsonArray[$i]['designer_recommended_ease_in'] = $products[$i]->designer_recommended_ease_in;
			$jsonArray[$i]['designer_recommended_ease_cm'] = $products[$i]->designer_recommended_ease_cm;
			$jsonArray[$i]['recommended_stitch_gauge_in'] = $products[$i]->recommended_stitch_gauge_in;
			$jsonArray[$i]['recommended_stitch_gauge_cm'] = $products[$i]->recommended_stitch_gauge_cm;
			$jsonArray[$i]['recommended_row_gauge_in'] = $products[$i]->recommended_row_gauge_in;
			$jsonArray[$i]['recommended_row_gauge_cm'] = $products[$i]->recommended_row_gauge_cm;
		}

		for ($j=0; $j < count($measurements); $j++) { 
			$jsonArray1[$j]['id'] = $measurements[$j]->id;
			$jsonArray1[$j]['m_title'] = $measurements[$j]->m_title;
		}

		for ($k=0; $k < count($needlesizes); $k++) { 
			$jsonArray2[$k]['us_size'] = $needlesizes[$k]->us_size;
			$jsonArray2[$k]['mm_size'] = $needlesizes[$k]->mm_size;
		}

		for ($l=0; $l < count($gaugeconversion); $l++) { 
			$jsonArray3[$l]['id'] = $needlesizes[$l]->id;
			$jsonArray3[$l]['stitch_gauge_inch'] = $needlesizes[$l]->stitch_gauge_inch;
			$jsonArray3[$l]['stitches_10_cm'] = $needlesizes[$l]->stitches_10_cm;
			$jsonArray3[$l]['row_gauge_inch'] = $needlesizes[$l]->row_gauge_inch;
			$jsonArray3[$l]['rows_10_cm'] = $needlesizes[$l]->rows_10_cm;
		}

		return $this->sendJsonData(['products' => $jsonArray,'measurements' => $jsonArray1,'needlesizes' => $jsonArray2,'gaugeconversion' => $gaugeconversion]);
	}

	function get_external_data(){
		$jsonArray1 = array();
		$jsonArray2 = array();
		$jsonArray3 = array();

		$needlesizes = NeedleSizes::all();
        $gaugeconversion = GaugeConversion::all();
        $measurements = Auth::user()->measurements;

        for ($j=0; $j < count($measurements); $j++) { 
			$jsonArray1[$j]['id'] = $measurements[$j]->id;
			$jsonArray1[$j]['m_title'] = $measurements[$j]->m_title;
		}

		for ($k=0; $k < count($needlesizes); $k++) { 
			$jsonArray2[$k]['us_size'] = $needlesizes[$k]->us_size;
			$jsonArray2[$k]['mm_size'] = $needlesizes[$k]->mm_size;
		}

		for ($l=0; $l < count($gaugeconversion); $l++) { 
			$jsonArray3[$l]['id'] = $needlesizes[$l]->id;
			$jsonArray3[$l]['stitch_gauge_inch'] = $needlesizes[$l]->stitch_gauge_inch;
			$jsonArray3[$l]['stitches_10_cm'] = $needlesizes[$l]->stitches_10_cm;
			$jsonArray3[$l]['row_gauge_inch'] = $needlesizes[$l]->row_gauge_inch;
			$jsonArray3[$l]['rows_10_cm'] = $needlesizes[$l]->rows_10_cm;
		}

		return $this->sendJsonData(['measurements' => $jsonArray1,'needlesizes' => $jsonArray2,'gaugeconversion' => $gaugeconversion]);
	}

	function create_custom_project(Request $request){
		$projectsCount = Project::count() +1;

		$product = Products::where('id',$request->product_id)->first();
		$product_images = Product_images::where('product_id',$request->product_id)->first();
		if($product_images){
			$image = $product_images->image_small;
		}else{
			$image = 'https://via.placeholder.com/200?text='.$product->product_name;
		}

		$project = new Project;
		$project->token_key = md5($projectsCount);
		$project->user_id = Auth::user()->id;
		$project->product_id = $request->product_id;
		$project->name = $product->product_name;
		$project->description = $product->product_description;
		$project->pattern_type = $request->pattern_type;
		$project->uom = $request->uom;
		$project->stitch_gauge = $request->stitch_gauge;
		$project->row_gauge = $request->row_gauge;
		$project->measurement_profile = $request->measurement_profile;
		$project->ease = $request->ease;
		$project->status = 1;
		$project->created_at = Carbon::now();
		$project->ipaddress = $_SERVER['REMOTE_ADDR'];
		$save = $project->save();

		if($save){

			for ($i=0; $i < count($request->yarn_used); $i++) { 
				$yarn = new Projectyarn;
				$yarn->user_id = Auth::user()->id;
				$yarn->project_id = $project->id;
				$yarn->yarn_used = $request->yarn_used[$i];
				$yarn->fiber_type = $request->fiber_type[$i];
				$yarn->yarn_weight = $request->yarn_weight[$i];
				$yarn->colourway = $request->colourway[$i];
				$yarn->dye_lot = $request->dye_lot[$i];
				$yarn->skeins = $request->skeins[$i];
				$yarn->created_at = Carbon::now();
				$yarn->ipaddress = $_SERVER['REMOTE_ADDR'];
				$yarn->save();
			}

			for ($j=0; $j < count($request->needle_size); $j++) { 
				$needle = new Projectneedle;
				$needle->user_id = Auth::user()->id;
				$needle->project_id = $project->id;
				$needle->needle_size = $request->needle_size[$j];
				$needle->created_at = Carbon::now();
				$needle->ipaddress = $_SERVER['REMOTE_ADDR'];
				$needle->save();
			}

			$projectimage =  new Projectimages;
			$projectimage->user_id = Auth::user()->id;
			$projectimage->project_id = $project->id;
			$projectimage->image_path = $image;
			$projectimage->created_at = Carbon::now();
			$projectimage->ipaddress = $_SERVER['REMOTE_ADDR'];
			$projectimage->save();

			for ($l=0; $l < count($request->m_name); $l++) {
                $mname = $request->m_name[$l];
                $pdm = new ProjectsDesignerMeasurements;
                $pdm->user_id = Auth::user()->id;
                $pdm->project_id = $project->id;
                $pdm->measurement_name = $request->m_name[$l];
                $pdm->measurement_value = $request->$mname;
                $pdm->created_at = Carbon::now();
                $pdm->ipaddress = $_SERVER['REMOTE_ADDR'];
                $pdm->save();
            }
            return response()->json(['status' => 'success']);
		}else{
			return response()->json(['status' => 'fail']);
		}
	}


	function create_non_custom_project(Request $request){
		$projectsCount = Project::count() +1;

		$product = Products::where('id',$request->product_id)->first();
		$product_images = Product_images::where('product_id',$request->product_id)->first();
		if($product_images){
			$image = $product_images->image_small;
		}else{
			$image = 'https://via.placeholder.com/200?text='.$product->product_name;
		}

		$project = new Project;
		$project->token_key = md5($projectsCount);
		$project->user_id = Auth::user()->id;
		$project->product_id = $request->product_id;
		$project->name = $product->product_name;
		$project->description = $product->product_description;
		$project->pattern_type = $request->pattern_type;
		$project->uom = $request->uom;
		$project->stitch_gauge = $request->stitch_gauge;
		$project->row_gauge = $request->row_gauge;
		$project->measurement_profile = $request->measurement_profile;
		$project->ease = $request->ease;
		$project->status = 1;
		$project->created_at = Carbon::now();
		$project->ipaddress = $_SERVER['REMOTE_ADDR'];
		$save = $project->save();

		if($save){

			for ($i=0; $i < count($request->yarn_used); $i++) { 
				$yarn = new Projectyarn;
				$yarn->user_id = Auth::user()->id;
				$yarn->project_id = $project->id;
				$yarn->yarn_used = $request->yarn_used[$i];
				$yarn->fiber_type = $request->fiber_type[$i];
				$yarn->yarn_weight = $request->yarn_weight[$i];
				$yarn->colourway = $request->colourway[$i];
				$yarn->dye_lot = $request->dye_lot[$i];
				$yarn->skeins = $request->skeins[$i];
				$yarn->created_at = Carbon::now();
				$yarn->ipaddress = $_SERVER['REMOTE_ADDR'];
				$yarn->save();
			}

			for ($j=0; $j < count($request->needle_size); $j++) { 
				$needle = new Projectneedle;
				$needle->user_id = Auth::user()->id;
				$needle->project_id = $project->id;
				$needle->needle_size = $request->needle_size[$j];
				$needle->created_at = Carbon::now();
				$needle->ipaddress = $_SERVER['REMOTE_ADDR'];
				$needle->save();
			}

			$projectimage =  new Projectimages;
			$projectimage->user_id = Auth::user()->id;
			$projectimage->project_id = $project->id;
			$projectimage->image_path = $image;
			$projectimage->created_at = Carbon::now();
			$projectimage->ipaddress = $_SERVER['REMOTE_ADDR'];
			$projectimage->save();

            return response()->json(['status' => 'success']);
		}else{
			return response()->json(['status' => 'fail']);
		}
	}


	function create_external_project(Request $request){

		$request->validate([
			'product_name' => 'required',
			'description'  => 'required',
			'user_verify'  => 'required'
		]);

		$projectsCount = Project::count() +1;


		$project = new Project;
		$project->token_key = md5($projectsCount);
		$project->user_id = Auth::user()->id;
		$project->name = $request->product_name;
		$project->description = $request->description;
		$project->pattern_type = $request->pattern_type;
		$project->uom = $request->uom;
		$project->stitch_gauge = $request->stitch_gauge;
		$project->row_gauge = $request->row_gauge;
		$project->measurement_profile = $request->measurement_profile;
		$project->ease = $request->ease;
		$project->user_verify = $request->user_verify;
		$project->status = 1;
		$project->created_at = Carbon::now();
		$project->ipaddress = $_SERVER['REMOTE_ADDR'];
		$save = $project->save();

		if($save){

			for ($i=0; $i < count($request->yarn_used); $i++) { 
				$yarn = new Projectyarn;
				$yarn->user_id = Auth::user()->id;
				$yarn->project_id = $project->id;
				$yarn->yarn_used = $request->yarn_used[$i];
				$yarn->fiber_type = $request->fiber_type[$i];
				$yarn->yarn_weight = $request->yarn_weight[$i];
				$yarn->colourway = $request->colourway[$i];
				$yarn->dye_lot = $request->dye_lot[$i];
				$yarn->skeins = $request->skeins[$i];
				$yarn->created_at = Carbon::now();
				$yarn->ipaddress = $_SERVER['REMOTE_ADDR'];
				$yarn->save();
			}

			for ($j=0; $j < count($request->needle_size); $j++) { 
				$needle = new Projectneedle;
				$needle->user_id = Auth::user()->id;
				$needle->project_id = $project->id;
				$needle->needle_size = $request->needle_size[$j];
				$needle->created_at = Carbon::now();
				$needle->ipaddress = $_SERVER['REMOTE_ADDR'];
				$needle->save();
			}

			for ($k=0; $k < count($request->image); $k++) { 
				$projectimage =  new Projectimages;
				$projectimage->user_id = Auth::user()->id;
				$projectimage->project_id = $project->id;
				$projectimage->image_path = $request->image[$k];
				$projectimage->created_at = Carbon::now();
				$projectimage->ipaddress = $_SERVER['REMOTE_ADDR'];
				$projectimage->save();
			}
			
            return response()->json(['status' => 'success']);
		}else{
			return response()->json(['status' => 'fail']);
		}
	}
    
}

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

		$jsonArray = DB::table('booking_process')
		->leftJoin('products', 'booking_process.product_id', 'products.id')
		->leftJoin('product_images', 'products.id','product_images.product_id')
		->select('products.id','booking_process.created_at','products.product_name', 'product_images.image_medium')
		->where('booking_process.category_id', 1)
		->where('booking_process.user_id', Auth::user()->id)
		->get();

		$data = array();

		$jsonArray1 = $this->get_generated_patterns();
		$jsonArray2 = $this->get_workinprogress_patterns();
		$jsonArray3 = $this->get_completed_patterns();

		$array = array('new_patterns' => $jsonArray,'generated_patterns' => $jsonArray1,'work_in_progress' => $jsonArray2,'completed' => $jsonArray3);
		return $this->sendJsonData($array);
	}


	function get_generated_patterns(){
		$jsonArray = array();

$jsonA = Auth::user()->projects()->where('status',1)->where('is_archive',0)->where('is_deleted',0)->select('id','name','pattern_type','created_at','updated_at')->get();
//$jq = $jsonArray1['generated_patterns'];
for ($i=0; $i < count($jsonA); $i++){
	$id = $jsonA[$i]->id;
	$jsonArray['name'] = $jsonA[$i]->name;
	$jsonArray['pattern_type'] = $jsonA[$i]->pattern_type;
	$jsonArray['created_at'] = $jsonA[$i]->created_at;
	$jsonArray['updated_at'] = $jsonA[$i]->updated_at;
	$jsonArray['image'] = Projectimages::where('project_id',$id)->select('image_path')->first();
}

if(count($jsonA) > 0){
		return [$jsonArray];
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
	$jsonArray['name'] = $winp[$j]->name;
	$jsonArray['pattern_type'] = $winp[$j]->pattern_type;
	$jsonArray['created_at'] = $winp[$j]->created_at;
	$jsonArray['updated_at'] = $winp[$j]->updated_at;
	$jsonArray['image'] = Projectimages::where('project_id',$id)->select('image_path')->first();
}

if(count($winp) > 0){
		return [$jsonArray];
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
			$jsonArray['name'] = $comp[$k]->name;
			$jsonArray['pattern_type'] = $comp[$k]->pattern_type;
			$jsonArray['created_at'] = $comp[$k]->created_at;
			$jsonArray['updated_at'] = $comp[$k]->updated_at;
			$jsonArray['image'] = Projectimages::where('project_id',$id)->select('image_path')->first();
		}
		if(count($comp) > 0){
		return [$jsonArray];
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
			$gp = Auth::user()->projects()->where('status',1)->where('is_archive',0)->where('is_deleted',0)->where('id',$request->id)->select('id','name','pattern_type','created_at','updated_at')->first();
		for ($i=0; $i < count($gp); $i++) {
		$jsonArray['generated_patterns']['id'] = $gp[$i]['id']; 
		$jsonArray['generated_patterns']['name'] = $gp[$i]['name']; 
		$jsonArray['generated_patterns']['pattern_type'] = $gp[$i]['pattern_type']; 
		$jsonArray['generated_patterns']['image'] = Projectimages::where('project_id',$gp[$i]['id'])->select('image_path')->first(); 
		$jsonArray['generated_patterns']['created_at'] = $gp[$i]['created_at']; 
		$jsonArray['generated_patterns']['updated_at'] = $gp[$i]['updated_at']; 
		}

			return response()->json(['data' => $jsonArray]);
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
			$wp = Auth::user()->projects()->where('status',2)->where('is_archive',0)->where('is_deleted',0)->where('id',$request->id)->select('id','name','pattern_type','created_at','updated_at')->get();
		for ($j=0; $j < count($wp); $j++) {
		$jsonArray['work_in_progress']['id'] = $gp[$j]['id']; 
		$jsonArray['work_in_progress']['name'] = $gp[$j]['name']; 
		$jsonArray['work_in_progress']['pattern_type'] = $gp[$j]['pattern_type']; 
		$jsonArray['work_in_progress']['image'] = Projectimages::where('project_id',$gp[$j]['id'])->select('image_path')->first(); 
		$jsonArray['work_in_progress']['created_at'] = $gp[$j]['created_at']; 
		$jsonArray['work_in_progress']['updated_at'] = $gp[$j]['updated_at']; 
		}
			return response()->json(['data' => $jsonArray]);
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
		for ($k=0; $k < count($com); $k++) {
		$jsonArray['completed']['id'] = $com[$k]['id']; 
		$jsonArray['completed']['name'] = $com[$k]['name']; 
		$jsonArray['completed']['pattern_type'] = $com[$k]['pattern_type']; 
		$jsonArray['completed']['image'] = Projectimages::where('project_id',$com[$k]['id'])->select('image_path')->first(); 
		$jsonArray['completed']['created_at'] = $com[$k]['created_at']; 
		$jsonArray['completed']['updated_at'] = $com[$k]['updated_at']; 
		}
			return response()->json(['data' => $jsonArray]);
		}else{
			return response()->json(['error' => true,'message' => 'unable to load data']);
		}
	}

    
}

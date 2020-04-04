<?php

namespace App\Http\Controllers\Knitter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

class ProjectController extends Controller
{
	function __construct(){
		$this->middleware('auth');
	}

    function home(){
    	$orders = DB::table('booking_process')
		->leftJoin('products', 'booking_process.product_id', 'products.id')
		->select('booking_process.created_at','products.id as pid','products.product_name')
		->where('booking_process.category_id', 1)
		->where('booking_process.user_id', Auth::user()->id)
		->get();


		$generatedpatterns = Auth::user()->projects()->where('status',1)->where('is_archive',0)->where('is_deleted',0)->select('id as pid','name','token_key','pattern_type','created_at','updated_at')->get();

		$workinprogress = Auth::user()->projects()->where('status',2)->where('is_archive',0)->where('is_deleted',0)->select('id as pid','name','token_key','pattern_type','created_at','updated_at')->get();

		$completed = Auth::user()->projects()->where('status',3)->where('is_archive',0)->where('is_deleted',0)->select('id as pid','name','token_key','pattern_type','created_at','updated_at')->get();

    	return view('knitter.projects.index',compact('orders','generatedpatterns','workinprogress','completed'));
    }

    function archive(){
    	$orders = DB::table('booking_process')
		->join('products', 'booking_process.product_id', '=', 'products.id')
		->select('booking_process.created_at','products.id as pid','products.product_name')
		->where('booking_process.category_id', 1)
		->where('booking_process.user_id', Auth::user()->id)
		->get();

		$generatedpatterns = Auth::user()->projects()->where('status',1)->where('is_archive',1)->where('is_deleted',0)->select('id as pid','name','token_key','pattern_type','created_at','updated_at')->get();

		$workinprogress = Auth::user()->projects()->where('status',2)->where('is_archive',1)->where('is_deleted',0)->select('id as pid','name','token_key','pattern_type','created_at','updated_at')->get();

		$completed = Auth::user()->projects()->where('status',3)->where('is_archive',1)->where('is_deleted',0)->select('id as pid','name','token_key','pattern_type','created_at','updated_at')->get();

    	return view('knitter.projects.archive',compact('orders','generatedpatterns','workinprogress','completed'));
    }

    function project_to_archive(Request $request){
    	$id = $request->id;
    	$project = Project::find($id);
    	$project->is_archive = 1;
    	$save = $project->save();
    	if($save){
    		return response()->json(['status' => 'success']);
    	}else{
    		return response()->json(['status' => 'fail']);
    	}
    }

    function project_to_library(Request $request){
    	$id = $request->id;
    	$project = Project::find($id);
    	$project->is_archive = 0;
    	$save = $project->save();
    	if($save){
    		return response()->json(['status' => 'success']);
    	}else{
    		return response()->json(['status' => 'fail']);
    	}
    }

    function project_change_status(Request $request){
    	$id = $request->id;
    	$project = Project::find($id);
    	$project->status = $request->status;
    	$project->updated_at = Carbon::now();
    	$save = $project->save();
    	if($save){
    		return response()->json(['status' => 'success']);
    	}else{
    		return response()->json(['status' => 'fail']);
    	}
    }

    function create_project(Request $request){
    	$measurements = Auth::user()->measurements->count();
    	$needlesizes = NeedleSizes::all();
        $custom = DB::table('booking_process')
        ->join('products', 'booking_process.product_id', '=', 'products.id')
        ->select('products.id as pid','products.product_name')
        ->where('booking_process.category_id', 1)
        ->where('products.is_custom', 1)
        ->where('booking_process.user_id', Auth::user()->id)
        ->get();
        $noncustom = DB::table('booking_process')
        ->join('products', 'booking_process.product_id', '=', 'products.id')
        ->select('products.id as pid','products.product_name')
        ->where('booking_process.category_id', 1)
        ->where('products.is_custom', 0)
        ->where('booking_process.user_id', Auth::user()->id)
        ->get();
        $projects = Auth::user()->projects()->where('is_deleted',0)->count();
    	return view('knitter.projects.create-project',compact('measurements','needlesizes','custom','noncustom','projects'));
    }

    function delete_project(Request $request){
    	$id = $request->id;
    	$project = Project::find($id);
    	$project->is_deleted = 1;
    	$save = $project->save();
    	if($save){
    		return response()->json(['status' => 'success']);
    	}else{
    		return response()->json(['status' => 'fail']);
    	}
    }

    function clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    function project_images(Request $request){
    	$image = $request->file('file');
    	for ($i=0; $i < count($image); $i++) { 
            $fname = $this->clean($image[$i]->getClientOriginalName());
            $filename = time().'-'.$fname;
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

    function remove_project_image(Request $request){
    	//print_r($request->all());
    	//exit;
    }

    function project_external(Request $request){
    	$needlesizes = NeedleSizes::all();
    	$gaugeconversion = GaugeConversion::all();
    	$measurements = Auth::user()->measurements;
    	return view('knitter.projects.external',compact('needlesizes','gaugeconversion','measurements'));
    }

    function upload_project(Request $request){
    	//echo '<pre>';
    	//print_r($request->all());
    	//echo '</pre>';
    	//exit;

    	$projectsCount = Project::count();
    	$token = $projectsCount + 1;

    	$key = md5($token);
    	$slug = Str::slug($request->project_name,'-');

    	$project = new Project;
    	$project->token_key = $key;
    	$project->user_id = Auth::user()->id;
    	$project->product_id = 0;
    	$project->name = $request->project_name;
    	$project->description = $request->description;
    	$project->pattern_type = $request->pattern_type;
    	$project->uom = $request->uom;
    	if($request->uom == 'cm'){
    		$project->stitch_gauge = $request->stitch_gauge_cm;
    		$project->row_gauge = $request->row_gauge_cm;
    	}else{
    		$project->stitch_gauge = $request->stitch_gauge_in;
    		$project->row_gauge = $request->row_gauge_in;
    	}
    	$project->measurement_profile = $request->measurement_profile;
    	if($request->uom == 'cm'){
    		$project->ease = $request->ease_cm;
    	}else{
    		$project->ease = $request->ease_in;
    	}
    	$project->user_verify = $request->user_verify;
        if($request->pattern_type == 'custom'){
            $project->status = 1;
        }else{
            $project->status = 2;
        }
    	$project->created_at = Carbon::now();
    	$project->updated_at = Carbon::now();
        $project->ipaddress = $_SERVER['REMOTE_ADDR'];
    	$save = $project->save();

    		

    	if($save){

    	for ($i=0; $i < count($request->image); $i++) { 
    			$pi = new Projectimages;
    			$pi->user_id = Auth::user()->id;
    			$pi->project_id = $project->id;
    			$pi->image_path = $request->image[$i];
    			$pi->image_ext = $request->ext[$i];
    			$pi->created_at = Carbon::now();
    			$pi->ipaddress = $_SERVER['REMOTE_ADDR'];	
    			$pi->save();
    		}

    		for ($j=0; $j < count($request->yarn_used); $j++) { 
    			$py = new Projectyarn;
    			$py->user_id = Auth::user()->id;
    			$py->project_id = $project->id;
    			$py->yarn_used = $request->yarn_used[$j];
    			$py->fiber_type = $request->fiber_type[$j];
    			$py->yarn_weight = $request->yarn_weight[$j];
    			$py->colourway = $request->colourway[$j];
    			$py->dye_lot = $request->dye_lot[$j];
    			$py->skeins = $request->skeins[$j];
    			$py->created_at = Carbon::now();
    			$py->ipaddress = $_SERVER['REMOTE_ADDR'];
    			$py->save();
    		}

    		for ($k=0; $k < count($request->needle_size); $k++) { 
    			$pn = new Projectneedle;
    			$pn->user_id = Auth::user()->id;
    			$pn->project_id = $project->id;
    			$pn->needle_size = $request->needle_size[$k];
    			$pn->created_at = Carbon::now();
    			$pn->ipaddress = $_SERVER['REMOTE_ADDR'];
    			$pn->save();
    		}

    		return response()->json(['status' => 'success','key' => $key,'slug' => $slug]);
    	}else{
			return response()->json(['status' => 'fail']);
		}
    }

    function generate_external_pattern(Request $request){
    	$id = $request->id;
    	$slug = $request->slug;
    	$project = Project::where('token_key', $id)->first();
    	$project_images = $project->project_images;
    	$project_yarn = $project->project_yarn;
    	$project_needle = $project->project_needle()->leftJoin('needle_sizes','needle_sizes.id','projects_needle.needle_size')->select('needle_sizes.us_size','needle_sizes.mm_size','projects_needle.id as pnid')->get();
        
    $stitch_gauge = GaugeConversion::where('id',$project->stitch_gauge)->first();
    $row_gauge = GaugeConversion::where('id',$project->row_gauge)->first();
    $measurements = UserMeasurements::where('id',$project->measurement_profile)->first();
    $project_notes = $project->project_notes;
    $product = Products::where('id',$project->product_id)->first();
    return view('knitter.projects.generate-external-pattern',compact('project','project_images','project_yarn','project_needle','stitch_gauge','row_gauge','measurements','project_notes','product'));
    }

    function project_notes_add(Request $request){
    	$notes = new ProjectNotes;
    	$notes->user_id = Auth::user()->id;
    	$notes->project_id = $request->project_id;
    	$notes->notes = $request->note;
    	$notes->created_at = Carbon::now();
    	$notes->status = 1;
    	$notes->ipaddress = $_SERVER['REMOTE_ADDR'];
    	$save = $notes->save();
    	if($save){
    		return response()->json(['status' => 'success','id' => $notes->id]);
    	}else{
    		return response()->json(['status' => 'fail']);
    	}
    }

    function project_notes_completed(Request $request){
    	$id = $request->id;
    	$check = ProjectNotes::where('id',$id)->first();
    	if($check->status == 1){
    		$notes = ProjectNotes::find($id);
    		$notes->status = 2;
    		$notes->completed_at = Carbon::now();
    		$save = $notes->save();
    	}else{
    		$notes = ProjectNotes::find($id);
    		$notes->status = 1;
    		$notes->completed_at = NULL;
    		$notes->updated_at = Carbon::now();
    		$save = $notes->save();
    	}

    	if($save){
    		return response()->json(['status' => 'success']);
    	}else{
    		return response()->json(['status' => 'fail']);
    	}
    }

    function project_notes_delete(Request $request){
    	$id = $request->id;
    	$notes = ProjectNotes::find($id);
    	$save = $notes->delete();
    	if($save){
    		return response()->json(['status' => 'success']);
    	}else{
    		return response()->json(['status' => 'fail']);
    	}
    }

    function project_notes_delete_all(Request $request){
    	$delete = ProjectNotes::where('project_id',$request->project_id)->delete();
    	if($delete){
    		return response()->json(['status' => 'success']);
    	}else{
    		return response()->json(['status' => 'fail']);
    	}
    }

    function upload_more_images(Request $request){
    	$id = $request->id;
    	$project = Project::where('token_key',$id)->first();
    $project_images = $project->project_images()->where('image_ext','jpg')->get();
    $product_images = Product_images::where('id',$project->product_id)->get();
    	return view('knitter.projects.project-images',compact('project','project_images','product_images'));
    }

    function get_all_project_images(Request $request){
    	$id = $request->id;
    	$project = Project::where('token_key',$id)->first();
    
    $project_images = $project->project_images()->where('image_ext','jpg')->get();
    return response()->json(['images' => $project_images]);
    }

    function upload_project_images_own(Request $request){
    	$id = $request->id;

    	$image = $request->file('file');
    	for ($i=0; $i < count($image); $i++) { 
            $oname = $this->clean($image[$i]->getClientOriginalName());
            $filename = time().'-'.$oname;
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

       	$path = 'https://s3.us-east-2.amazonaws.com/knitfitcoall/'.$filepath;
       	$pimages = new Projectimages;
       	$pimages->user_id = Auth::user()->id;
       	$pimages->project_id = $id;
       	$pimages->image_path = $path;
       	$pimages->image_ext = $ext;
       	$pimages->created_at = Carbon::now();
       	$pimages->ipaddress = $_SERVER['REMOTE_ADDR'];
       	$pimages->save();

         return response()->json(['path1' => $filepath, 'path' => 'https://s3.us-east-2.amazonaws.com/knitfitcoall/'.$filepath,'ext' => $ext]);
     }else{
        echo 'error';
     }
        }
    }


    /* custom pattern */

    function create_project_custom(Request $request){
        $id = $request->id;
        $product = Products::where('id',$id)->first();
        $needlesizes = NeedleSizes::all();
        $gaugeconversion = GaugeConversion::all();
        $measurements = Auth::user()->measurements;
        $orders = DB::table('booking_process')
        ->join('products', 'booking_process.product_id', '=', 'products.id')
        //->join('product_images', 'products.id', '=', 'product_images.product_id')
        ->select('products.id as pid','products.product_name')
        ->where('booking_process.category_id', 1)
        ->where('booking_process.user_id', Auth::user()->id)
        ->get();
        $product_image = Product_images::where('product_id',$id)->first();
        $pmeasurements = ProductDesignerMeasurements::where('product_id',$id)->get();

        return view('knitter.projects.custom',compact('orders','product','needlesizes','gaugeconversion','measurements','product_image','pmeasurements'));
    }

    function create_project_noncustom(Request $request){
        $id = $request->id;
        $product = Products::where('id',$id)->first();
        $needlesizes = NeedleSizes::all();
        $gaugeconversion = GaugeConversion::all();
        $measurements = Auth::user()->measurements;
        $orders = DB::table('booking_process')
        ->join('products', 'booking_process.product_id', '=', 'products.id')
        //->join('product_images', 'products.id', '=', 'product_images.product_id')
        ->select('products.id as pid','products.product_name')
        ->where('booking_process.category_id', 1)
        ->where('booking_process.user_id', Auth::user()->id)
        ->get();

        $product_image = Product_images::where('product_id',$id)->first();
        return view('knitter.projects.noncustom',compact('orders','product','needlesizes','gaugeconversion','measurements','product_image'));
    }

    function create_custom_project(Request $request){
        //print_r($request->all());
        //exit;
        $projectsCount = Project::count();
        $token = $projectsCount + 1;

        $key = md5($token);
        $slug = Str::slug($request->project_name,'-');

        $project = new Project;
        $project->token_key = $key;
        $project->user_id = Auth::user()->id;
        $project->product_id = $request->product_id;
        $project->name = $request->project_name;
        $project->description = $request->description;
        $project->pattern_type = $request->pattern_type;
        $project->uom = $request->uom;
        if($request->uom == 'cm'){
            $project->stitch_gauge = $request->stitch_gauge_cm;
            $project->row_gauge = $request->row_gauge_cm;
        }else{
            $project->stitch_gauge = $request->stitch_gauge_in;
            $project->row_gauge = $request->row_gauge_in;
        }
        $project->measurement_profile = $request->measurement_profile;
        if($request->uom == 'cm'){
            $project->ease = $request->ease_cm;
        }else{
            $project->ease = $request->ease_in;
        }

        $project->status = 1;
        $project->created_at = Carbon::now();
        $project->updated_at = Carbon::now();
        $save = $project->save();

        if($save){

            if($request->image) { 
                $pi = new Projectimages;
                $pi->user_id = Auth::user()->id;
                $pi->project_id = $project->id;
                $pi->image_path = $request->image;
                $pi->image_ext = 'jpg';
                $pi->created_at = Carbon::now();
                $pi->ipaddress = $_SERVER['REMOTE_ADDR'];   
                $pi->save();
            }

            for ($j=0; $j < count($request->yarn_used); $j++) { 
                $py = new Projectyarn;
                $py->user_id = Auth::user()->id;
                $py->project_id = $project->id;
                $py->yarn_used = $request->yarn_used[$j];
                $py->fiber_type = $request->fiber_type[$j];
                $py->yarn_weight = $request->yarn_weight[$j];
                $py->colourway = $request->colourway[$j];
                $py->dye_lot = $request->dye_lot[$j];
                $py->skeins = $request->skeins[$j];
                $py->created_at = Carbon::now();
                $py->ipaddress = $_SERVER['REMOTE_ADDR'];
                $py->save();
            }

            for ($k=0; $k < count($request->needle_size); $k++) { 
                $pn = new Projectneedle;
                $pn->user_id = Auth::user()->id;
                $pn->project_id = $project->id;
                $pn->needle_size = $request->needle_size[$k];
                $pn->created_at = Carbon::now();
                $pn->ipaddress = $_SERVER['REMOTE_ADDR'];
                $pn->save();
            }

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

            return response()->json(['status' => 'success','key' => $key,'slug' => $slug]);
        }else{
            return response()->json(['status' => 'fail']);
        }
    }

    function create_noncustom_project(Request $request){
        $projectsCount = Project::count();
        $token = $projectsCount + 1;

        $key = md5($token);
        $slug = Str::slug($request->project_name,'-');

        $project = new Project;
        $project->token_key = $key;
        $project->user_id = Auth::user()->id;
        $project->product_id = $request->product_id;
        $project->name = $request->project_name;
        $project->description = $request->description;
        $project->pattern_type = $request->pattern_type;
        $project->uom = $request->uom;
        if($request->uom == 'cm'){
            $project->stitch_gauge = $request->stitch_gauge_cm;
            $project->row_gauge = $request->row_gauge_cm;
        }else{
            $project->stitch_gauge = $request->stitch_gauge_in;
            $project->row_gauge = $request->row_gauge_in;
        }
        $project->measurement_profile = $request->measurement_profile;
        if($request->uom == 'cm'){
            $project->ease = $request->ease_cm;
        }else{
            $project->ease = $request->ease_in;
        }

        $project->status = 1;
        $project->created_at = Carbon::now();
        $project->updated_at = Carbon::now();
        $save = $project->save();

        if($save){

            if($request->image) { 
                $pi = new Projectimages;
                $pi->user_id = Auth::user()->id;
                $pi->project_id = $project->id;
                $pi->image_path = $request->image;
                $pi->image_ext = 'jpg';
                $pi->created_at = Carbon::now();
                $pi->ipaddress = $_SERVER['REMOTE_ADDR'];   
                $pi->save();
            }

            for ($j=0; $j < count($request->yarn_used); $j++) { 
                $py = new Projectyarn;
                $py->user_id = Auth::user()->id;
                $py->project_id = $project->id;
                $py->yarn_used = $request->yarn_used[$j];
                $py->fiber_type = $request->fiber_type[$j];
                $py->yarn_weight = $request->yarn_weight[$j];
                $py->colourway = $request->colourway[$j];
                $py->dye_lot = $request->dye_lot[$j];
                $py->skeins = $request->skeins[$j];
                $py->created_at = Carbon::now();
                $py->ipaddress = $_SERVER['REMOTE_ADDR'];
                $py->save();
            }

            for ($k=0; $k < count($request->needle_size); $k++) { 
                $pn = new Projectneedle;
                $pn->user_id = Auth::user()->id;
                $pn->project_id = $project->id;
                $pn->needle_size = $request->needle_size[$k];
                $pn->created_at = Carbon::now();
                $pn->ipaddress = $_SERVER['REMOTE_ADDR'];
                $pn->save();
            }

            return response()->json(['status' => 'success','key' => $key,'slug' => $slug]);
        }else{
            return response()->json(['status' => 'fail']);
        }
    }

    function generate_noncustom_pattern(Request $request){
        $id = $request->id;
        $slug = $request->slug;
        $project = Project::where('token_key', $id)->first();
        $project_images = $project->project_images;
        $project_yarn = $project->project_yarn;
        $project_needle = $project->project_needle()->leftJoin('needle_sizes','needle_sizes.id','projects_needle.needle_size')->select('needle_sizes.us_size','needle_sizes.mm_size','projects_needle.id as pnid')->get();
    $stitch_gauge = GaugeConversion::where('id',$project->stitch_gauge)->first();
    $row_gauge = GaugeConversion::where('id',$project->row_gauge)->first();
    $measurements = UserMeasurements::where('id',$project->measurement_profile)->first();
    $project_notes = $project->project_notes;
    $product = Products::where('id',$project->product_id)->first();
    $pdf = ProductPdf::where('product_id',$project->product_id)->first();

    //$mid = $project->measurement_profile;

    $filename = storage_path('Peekaboo Cabled Sweater Variables.xlsx');

            $str = '';

            //$ss = DB::table('pattern_pdf')->where('product_id',58)->first();

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filename);
            //$worksheet = $spreadsheet->getActiveSheet();
            $worksheet = $spreadsheet->getSheetByName('KnitVariables');

            $rows = $worksheet->rangeToArray(
                'B2:B112',     // The worksheet range that we want to retrieve
                NULL,        // Value that should be returned for empty cells
                TRUE,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                TRUE,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                TRUE         // Should the array be indexed by cell row and cell column
            );


$rows1 = $worksheet->rangeToArray(
                'C2:C112',     // The worksheet range that we want to retrieve
                NULL,        // Value that should be returned for empty cells
                TRUE,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                TRUE,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                TRUE         // Should the array be indexed by cell row and cell column
            );


            $i=2;
    foreach ($rows as $row) {

        //echo $rows1[$i]['C']."<br>";

    $pdf->content=str_replace('[['.$row['B'].']]',$rows1[$i]['C'],$pdf->content);
        $i++;
    }   


    $cont = $pdf->content;


    return view('knitter.projects.generate-noncustom-pattern',compact('project','project_images','project_yarn','project_needle','stitch_gauge','row_gauge','measurements','project_notes','product','pdf','cont'));
    }

    function generate_custom_pattern(Request $request){

        

        $id = $request->id;
        $slug = $request->slug;
        $project = Project::where('token_key', $id)->first();
        $product = Products::where('id',$project->product_id)->first();

        $filename = storage_path($product->measurement_file);


        $project_images = $project->project_images;
        $project_yarn = $project->project_yarn;
        $project_needle = $project->project_needle()->leftJoin('needle_sizes','needle_sizes.id','projects_needle.needle_size')->select('needle_sizes.us_size','needle_sizes.mm_size','projects_needle.id as pnid')->get();
    $stitch_gauge = GaugeConversion::where('id',$project->stitch_gauge)->first();
    $row_gauge = GaugeConversion::where('id',$project->row_gauge)->first();
    $measurements = UserMeasurements::where('id',$project->measurement_profile)->first(['hips','waist','waist_front','bust','bust_front','bust_back','waist_to_underarm','armhole_depth','wrist_circumference',
'forearm_circumference','upperarm_circumference','shoulder_circumference','wrist_to_underarm','wrist_to_elbow','elbow_to_underarm',
'wrist_to_top_of_shoulder','depth_of_neck','neck_width','neck_circumference','neck_to_shoulder','shoulder_to_shoulder']);
    $project_notes = $project->project_notes;
    
    
    $pdm = ProjectsDesignerMeasurements::where('project_id',$project->id)->get();
    $pdf = ProductPdf::where('product_id',$project->product_id)->first();

    $array = array('FIRST_NAME' => Auth::user()->first_name,'LAST_NAME' => Auth::user()->last_name,'EMAIL_ADDRESS' => Auth::user()->email);
    if($project->uom == 'in'){
        $array1 = array('STITCH_GAUGE' =>$stitch_gauge->stitch_gauge_inch,'ROW_GAUGE' => $row_gauge->row_gauge_inch,'EASE' => $project->ease,'NEEDLE_SIZE' => 3);
    }else{
        $array1 = array('STITCH_GAUGE' =>$stitch_gauge->stitches_10_cm,'ROW_GAUGE' => $row_gauge->rows_10_cm,'EASE' => $project->ease,'NEEDLE_SIZE' => 3);
    }
    
    //$m = (array) $measurements;
   // array_push($m,$array);
    //echo '<pre>';
    //print_r($m);
    //echo '</pre>';
    //exit;

    /* Adding  a file */

            $path = storage_path($product->measurement_file);
            //$url = Storage::url('Emily_s Sweater Variables.xlsx');
            $time = Auth::user()->id;
            
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            $worksheet = $spreadsheet->getSheetByName('KnitVariables');

            $rows = $worksheet->rangeToArray(
                'B2:B26',     // The worksheet range that we want to retrieve
                NULL,        // Value that should be returned for empty cells
                TRUE,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                TRUE,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                TRUE         // Should the array be indexed by cell row and cell column
            );  

    $columns = DB::getSchemaBuilder()->getColumnListing('user_measurements');
            
            $i=2;
            foreach ($rows as $row) {
                //echo $row['B']."<br>";

                foreach ($columns as $key) {
                   $key1 = strtoupper($key);
                    if($row['B'] == $key1){
                    //echo $row['B'].' - '.strtoupper($key).' - '.$i."<br>";
                    $value = $measurements->$key;
                    $worksheet->getCell("C".$i)->setValue($value); 
                    }
                }
                

                foreach ($array as $k => $val) {
                    if($row['B'] == $k){
                    // echo $row['B'].' -- '.$k."<br>";
                    $worksheet->getCell("C".$i)->setValue($val); 
                    }
                }

                foreach ($array1 as $ky => $va) {
                    if($row['B'] == $ky){
                    // echo $row['B'].' -- '.$ky."<br>";
                    $worksheet->getCell("C".$i)->setValue($va); 
                    }
                }

                foreach ($pdm as $pm => $mdp) {
                    $mname = strtoupper($mdp->measurement_name);
                    if($row['B'] == $mname){
                    //echo $mname.' -- '.$mdp->measurement_value."<br>";
                    $worksheet->getCell("C".$i)->setValue($mdp->measurement_value); 
                    }
                }
                $i++;
            }
            //exit;
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->setPreCalculateFormulas(true);
            $save = $writer->save(storage_path('write'.$time.'.xlsx'));

    /* Adding a file */

    $filename = storage_path('write'.$time.'.xlsx');

            $str = '';

            //$ss = DB::table('pattern_pdf')->where('product_id',58)->first();

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filename);
            //$worksheet = $spreadsheet->getActiveSheet();
            $worksheet = $spreadsheet->getSheetByName('KnitVariables');

            $rows = $worksheet->rangeToArray(
                'B2:B150',     // The worksheet range that we want to retrieve
                NULL,        // Value that should be returned for empty cells
                TRUE,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                TRUE,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                TRUE         // Should the array be indexed by cell row and cell column
            );


$rows1 = $worksheet->rangeToArray(
                'C2:C150',     // The worksheet range that we want to retrieve
                NULL,        // Value that should be returned for empty cells
                TRUE,        // Should formulas be calculated (the equivalent of getCalculatedValue() for each cell)
                TRUE,        // Should values be formatted (the equivalent of getFormattedValue() for each cell)
                TRUE         // Should the array be indexed by cell row and cell column
            );


            $i=2;
    foreach ($rows as $row) {

        //echo $rows1[$i]['C']."<br>";

    $pdf->content=str_replace('[['.$row['B'].']]',$rows1[$i]['C'],$pdf->content);
        $i++;
    }   


    $cont = $pdf->content;
            //exit;
    unlink($filename);
    return view('knitter.projects.generate-custom-pattern',compact('project','project_images','project_yarn','project_needle','stitch_gauge','row_gauge','measurements','project_notes','product','pdf','pdm','filename','cont'));
    }
}

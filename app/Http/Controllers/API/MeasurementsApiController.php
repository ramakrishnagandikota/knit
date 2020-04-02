<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Requests\MeasurementRequest;
use App\Http\Resources\MeasurementResource;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserMeasurements;
use Auth;
use App\User;
use File;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use DB;
use DateTime;

class MeasurementsApiController extends Controller
{

    function dashboard(){
        return MeasurementResource::collection(Auth::user()->measurements()->latest()->take(5)->get());
    } 

    function check_measurement_name(Request $request){
        $name =  $request->m_title;
        $check = UserMeasurements::where('m_title',$name)->count();
        if($check != 0){
            return response()->json(['success' => false,'message' => 'Measurement name already exists.Please select another one.']);
        }else{
            return response()->json(['success' => true]);
        }
    }

    function clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    function image_upload(Request $request){
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
        $ext = $ext;
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
         return response()->json(['path' => 'https://s3.us-east-2.amazonaws.com/knitfitcoall/'.$filepath,'ext' => $ext]);
     }else{
        echo 'error';
     }
        }
    }

    public function index(){
    	return MeasurementResource::collection(Auth::user()->measurements()->latest()->get());
    }

    public function store(MeasurementRequest $request){
    	$measurement = Auth::user()->measurements()->create($request->all());
   //return response(new MeasurementResource($measurement), Response::HTTP_CREATED);
    	return response()->json(['created' => true,'id' => $measurement->id],Response::HTTP_CREATED);
    }

    public function show(UserMeasurements $measurement){
    	return new MeasurementResource($measurement);
    }

    public function update(Request $request, UserMeasurements $measurement){
    	$measurement->update($request->all());
        return response()->json(['updated' => true], Response::HTTP_ACCEPTED);
    }

    public function destroy(UserMeasurements $measurement){
    	$measurement->delete();
        return response()->json(['deleted' => true]);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use Carbon\Carbon;
use Laravel\Passport\Passport;

class LoginController extends Controller
{
    public $successStatus = 200;
	
	public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message
        ];


        return response()->json($response, 200);
    }
	
	public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
	
	public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){

            if(Auth::user()->status != 1){
                $success['error'] = 'User account not verified';
                 return $this->sendResponse($success, $this->successStatus);
                 exit;
            }
            $user = Auth::user();
			
			
            $success['access_token'] =  $user->createToken('MyApp')->accessToken;
			$success['token_type'] =  'bearer';
			$success['expires_in'] =  Carbon::now()->addDays(15);
			
            return $this->sendResponse($success, $this->successStatus);
        }
        else{
            return $this->sendError('Unauthorised', 401);
        }
    }
	
	
	public function register(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'first_name' => 'required|alpha|min:2|max:15',
            'last_name' => 'required|alpha|min:2|max:15',
            'username' => 'required|alpha_num|max:25|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'confirm_password' => 'required|same:password',
            'terms_and_conditions' => 'required'
        ]);


        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 401);            
        }

        $md5email = md5($request->email);
        $input = $request->all();
        $input['enc_email'] = $md5email;
        $input['password'] = bcrypt($input['password']);
        $input['subscription_type'] = 1;
        $input['sub_exp'] = Carbon::now()->addDays(30);
        $user = User::create($input);
        $success['access_token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->first_name.' '.$user->last_name;
        
        $user->subscription()->attach(['1']);
        
        $arr = array('user_id' => $user->id,'role_id' => 2,'created_at' => date('Y-m-d H:i:s'));
            $dd = DB::table('user_role')->insert($arr);

            $arr = array('user_id' => $user->id);
            //$ii = DB::table('user_measurements')->insert($arr);
            $up = DB::table('user_profile')->insert($arr);



            $details = [
                'detail'=>'detail',
                'name'  => ucwords(ucwords($request->username)),
                'email' =>$request->email,
                'encemail' => $md5email
                 ];

            \Mail::to($request->email)->send(new RegistrationMail($details));


        return $this->sendResponse($success, $this->successStatus);
    
	}
	
	public function details()
    {
        $user = Auth::user();
        return $this->sendResponse($user, $this->successStatus);
    }
	
	
}

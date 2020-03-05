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
            'message' => $message,
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);


        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 401);            
        }


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['access_token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;


        return $this->sendResponse($success, $this->successStatus);
    
	}
	
	public function details()
    {
        $user = Auth::user();
        return $this->sendResponse($user, $this->successStatus);
    }
	
	
}

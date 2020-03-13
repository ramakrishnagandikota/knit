<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use Carbon\Carbon;
use Laravel\Passport\Passport;
use App\Mail\AccountVerificationMail;
use App\Mail\PasswordResetMail;
use DB; 
use Mail;
use Redirect;
use App\Mail\RegistrationMail;

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
    
    public function findUsername()
    {
        $login = request()->input('email');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
 
        request()->merge([$fieldType => $login]);
 
        return $fieldType;
    }
    
    public function login(Request $request){
        
         if($this->findUsername() == 'email'){
                $validator = $request->validate([
                    'email' => 'required|email',
                    'password' => 'required|string|min:6|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
                ]);
            }else{
                $validator = $request->validate([
                    'username' => 'required|alpha_num|min:5|max:15',
                    'password' => 'required|string|min:6|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
                ]);
            }
            
            //$emailOrUsername = $this->findUsername();
            $data = array($this->findUsername() => $request->email,'password' => $request->password);
            
        if(Auth::attempt($data)){

            if(Auth::user()->status != 1){
                $success['error'] = 'User account not verified';
                 return $this->sendError($success,401);
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
            $user = new User;
            $user->name = $request->username;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->enc_email = $md5email;
            $user->picture = 'resources/assets/user.png';
            
            $user->subscription_type = 1;
            $user->sub_exp = Carbon::now()->addDays(30);
            $user->created_at = date('Y-m-d H:i:s');
            $user->save();
            
        //$success['access_token'] =  $user->createToken('MyApp')->accessToken;
        $success['message'] =  'Hi '$user->first_name.' '.$user->last_name.', Please check your email to activate your account.';
        
        
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
    
    function send_reset_password_link(Request $request,User $user){
        $validator = $request->validate([
            'email' => 'required|email'
        ]);




        if(! $validator) {
            return redirect()->back();
        }else{
            $check = $user->email($request->email)->first();
           if($check){
           $time = md5(time());
            $array = array('email' => $request->email,'token' => $time,'created_at' => date('Y-m-d H:i:s'));
            DB::table('password_resets')->insert($array);

            $details = array(
                'name'  => ucwords(ucwords($check->first_name.' '.$check->last_name)),
                'email' =>$request->email,
                'token' => $time
            );

            \Mail::to($request->email)->send(new PasswordResetMail($details));
            //Session::flash('success','Mail has been sent to the registered email with reset link');

            $success['status'] = 'Mail has been sent to the registered email with reset link';

            
            
           }else{
            $success['status'] = 'Mail does not found in our records.';
            
           }
           return $this->sendResponse($success, $this->successStatus);
        }
    }
    
}

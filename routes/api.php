<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
  //  return $request->user();
//});


Route::post('login', 'API\LoginController@login');
Route::post('register', 'API\LoginController@register');
Route::post('forgot-password', 'API\LoginController@send_reset_password_link');
//Route::post('reset-password', 'API\LoginController@validate_password');


Route::group(['middleware' => 'auth:api'], function(){
	Route::get('dashboard','API\MeasurementsApiController@dashboard');
	Route::post('details', 'API\LoginController@details');
	Route::apiResource('/measurements','API\MeasurementsApiController');
	Route::post('checkMeasurementTitle','API\MeasurementsApiController@check_measurement_name');
});
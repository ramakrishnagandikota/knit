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

Route::post('login/facebook','API\LoginController@login_facebook');
Route::post('login/google','API\LoginController@login_google');

Route::group(['middleware' => 'auth:api'], function(){
	Route::get('dashboard','API\MeasurementsApiController@dashboard');
	Route::post('details', 'API\LoginController@details');
	Route::apiResource('/measurements','API\MeasurementsApiController');
	Route::post('checkMeasurementTitle','API\MeasurementsApiController@check_measurement_name');
	//Route::apiResource('projects','API\ProjectsController');
	Route::get('project-library','API\ProjectsController@get_project_library');

	Route::get('projects-library/generated','API\ProjectsController@get_generated_patterns');
	Route::get('projects-library/workinprogress','API\ProjectsController@get_workinprogress_patterns');
	Route::get('projects-library/completed','API\ProjectsController@get_completed_patterns');

Route::get('move-to-generated/{id}','API\ProjectsController@move_to_generated');
Route::get('move-to-workinprogress/{id}','API\ProjectsController@move_to_workinprogress');
Route::get('move-to-completed/{id}','API\ProjectsController@move_to_completed');
});

Route::get('product-filters','API\ProductsController@get_all_filters');
Route::get('products','API\ProductsController@get_products_data');

Route::apiResource('product','API\ProductsController');
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
	Route::post('imageUpload','API\MeasurementsApiController@image_upload');
	//Route::apiResource('projects','API\ProjectsController');

	/* project library */

Route::get('project-library','API\ProjectsController@get_project_library');
Route::get('projects-library/generated','API\ProjectsController@get_generated_patterns');
Route::get('projects-library/workinprogress','API\ProjectsController@get_workinprogress_patterns');
Route::get('projects-library/completed','API\ProjectsController@get_completed_patterns');
Route::get('projects-archive','API\ProjectsController@get_project_library_archive');
Route::get('delete-project/{id}','API\ProjectsController@project_delete');
Route::get('move-to-project-library/{id}','API\ProjectsController@move_to_project_library');
Route::get('move-to-archive/{id}','API\ProjectsController@move_to_archive');
Route::get('move-to-generated/{id}','API\ProjectsController@move_to_generated');
Route::get('move-to-workinprogress/{id}','API\ProjectsController@move_to_workinprogress');
Route::get('move-to-completed/{id}','API\ProjectsController@move_to_completed');

Route::get('available-products/{type}','API\ProjectsController@available_products');
Route::get('productData/{id}','API\ProjectsController@get_products_data');
Route::get('externalProjectData','API\ProjectsController@get_external_data');

Route::post('create-custom-project','API\ProjectsController@create_custom_project');
Route::post('create-non-custom-project','API\ProjectsController@create_custom_project');
Route::post('create-external-project','API\ProjectsController@create_external_project');
Route::get('generate-external-pattern/{id}','API\ProjectsController@generate_external_pattern');
/* project library */

/* subscriptions */
Route::get('subscription-plans','API\SubscriptionController@index');
/* subscriptions */
});

Route::get('product-filters','API\ProductsController@get_all_filters');
Route::get('products','API\ProductsController@get_products_data');

Route::apiResource('product','API\ProductsController');
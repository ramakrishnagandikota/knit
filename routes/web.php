<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('home');
});


Route::match(array('GET','POST'),'login',[
	'uses' => 'Logincontroller@login_page',
    'as' => 'login'
]);

Route::match(array('GET','POST'),'register',[
	'uses' => 'Logincontroller@Register_validate',
    'as' => 'register'
]);

Route::post('notify-us','Home\Frontendcontroller@notify_us');
Route::get('newsletter/unsubscribe/{token}','Home\Frontendcontroller@newsletter_unscbscribe');
Route::post('contact-us','Home\Frontendcontroller@contact_us');

Route::get('logout',[
	'uses' => 'Logincontroller@logout',
    'as' => 'logout'
]);

Route::get('check-validpage/{token}','Logincontroller@check_validpage');

Route::get('registration/check-user-email/{email}/{encemail}','Logincontroller@email_activate');
Route::get('reset-password','Logincontroller@reset_password');
Route::post('password-reset','Logincontroller@send_reset_password_link');
Route::get('validate/password/{token}','Logincontroller@validate_password');
Route::post('validate/newpassword','Logincontroller@validate_newpassword');

Route::get('subscription','SubscriptionController@subscription_view');
Route::post('add-cart','SubscriptionController@add_to_cart');


Route::get('paypal/ec-checkout', 'SubscriptionController@getExpressCheckout');
Route::get('paypal/ec-checkout-success', 'SubscriptionController@getExpressCheckoutSuccess');
Route::get('paypal/adaptive-pay', 'SubscriptionController@getAdaptivePay');

Route::get('paypal/cancel-subscription', 'SubscriptionController@cancel_subscription');
Route::post('paypal/notify', 'SubscriptionController@notify');

Route::get('payment/success','SubscriptionController@getExpressCheckoutSuccess');
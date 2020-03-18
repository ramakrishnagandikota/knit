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

/*
Route::get('paypal/ec-checkout', 'SubscriptionController@getExpressCheckout');
Route::get('paypal/ec-checkout-success', 'SubscriptionController@getExpressCheckoutSuccess');
Route::get('paypal/adaptive-pay', 'SubscriptionController@getAdaptivePay');

Route::get('paypal/cancel-subscription', 'SubscriptionController@cancel_subscription');
Route::post('paypal/notify', 'SubscriptionController@notify');

Route::get('payment/success','SubscriptionController@getExpressCheckoutSuccess');
*/

Route::get('shop-patterns','ShoppingController@index');
Route::get('product/{pid}/{slug}','ShoppingController@product_full_view');
Route::get('pattern-popup/{pid}',[
	'uses' => 'ShoppingController@pattern_popup',
    'as' => 'pattern-popup/{pid}'
]);

/* cart items */
Route::get('load-cart','CartController@get_cart');
Route::post('add-to-cart','CartController@add_to_cart');
Route::get('cart','CartController@my_cart');
Route::get('remove-all-items','CartController@remove_all_items');
Route::get('remove-item/{id}','CartController@getReduseByOne');
Route::get('checkout','CartController@checkout');
Route::get('getUserAddress','CartController@getUserAddress');

Route::post('placeOrder','CheckoutController@place_order');
Route::get('payment/cancel/{orderId}', 'CheckoutController@cancel')->name('payment.cancel');
Route::get('payment/success/{order_id}', 'CheckoutController@success')->name('payment.success');
Route::get('order/invoice/{orderId}','CheckoutController@payment_invoice');
Route::get('order/faild/{orderId}','CheckoutController@payment_faild');
Route::get('cancel/{orderId}', 'CheckoutController@cancel_order');

Route::get('my-account','AccountController@my_account');
Route::get('my-address','AccountController@my_address');
Route::get('my-orders','AccountController@myorders');
Route::get('add-address','AccountController@add_address');
Route::post('add-address','AccountController@add_my_address');
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\User;
use Auth;
use App\Http\Resources\UserResource;
use App\Cart;
use Session;
use Srmklive\PayPal\Services\AdaptivePayments;
use Srmklive\PayPal\Services\ExpressCheckout;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function subscription_view(){
    	//$sub = Auth::user()->subscription;
    	return view('subscription.index');
    	//$user = UserResource::collection(User::latest()->get());
    	//return response()->json($user);
    }

    public function getCheckoutData($price){

    	$order_id = time();
    	
        $data['items'] = [
            [
                'name'  => 'Monthly Subscription '.config('paypal.invoice_prefix').' #'.$order_id,
                'price' => $price,
                'qty'   => 1,
            ],
        ];
        $data['return_url'] = url('/paypal/ec-checkout-success?mode=recurring');
        $data['subscription_desc'] = 'Monthly Subscription '.config('paypal.invoice_prefix').' #'.$order_id;
        $data['invoice_id'] = config('paypal.invoice_prefix').'_'.$order_id;
        $data['invoice_description'] = "Order #$order_id Invoice";
        $data['cancel_url'] = url('/');

        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $data['total'] = $total;

        return $data;
    }


    function add_to_cart(Request $request){
    	//
    	$request->session()->put('p_type',$request->p_type);
    	$request->session()->put('price',$request->price);
    	$request->session()->put('s_type',$request->s_type);
    	$request->session()->put('s_for',$request->s_for);
    	//print_r($request->all());
    	return 'success';
    }

    public function getExpressCheckout(Request $request)
    {

        $data = [];
$data['items'] = [
    [
        'name' => 'Product 1',
        'price' => 9.99,
        'desc'  => 'Description for product 1',
        'qty' => 1
    ],
    [
        'name' => 'Product 2',
        'price' => 4.99,
        'desc'  => 'Description for product 2',
        'qty' => 2
    ]
];

$data['invoice_id'] = 1;
$data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
$data['return_url'] = url('/payment/success');
$data['cancel_url'] = url('/cart');

$total = 0;
foreach($data['items'] as $item) {
    $total += $item['price']*$item['qty'];
}

$data['total'] = $total;

//give a discount of 10% of the order amount
$data['shipping_discount'] = round((10 / 100) * $total, 2);


$provider = new ExpressCheckout;
  
        $response = $provider->setExpressCheckout($data);
  
        $response = $provider->setExpressCheckout($data, true);
  
        return redirect($response['paypal_link']);

    }

    public function getExpressCheckoutSuccess(Request $request)
    {
    	$provider = new ExpressCheckout;
    	$token = $request->get('token');
    	 $PayerID = $request->get('PayerID');
        $startdate = Carbon::now()->toAtomString();
$profile_desc = 'Daily subscription profile';



$data = [];
$data['items'] = [
    [
        'name' => 'Product 1',
        'price' => 9.99,
        'desc'  => 'Description for product 1',
        'qty' => 1
    ]
];

$data['invoice_id'] = 1;
$data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
$data['return_url'] = url('/payment/success');
$data['cancel_url'] = url('/cart');

$total = 0;
foreach($data['items'] as $item) {
    $total += $item['price']*$item['qty'];
}

$data['total'] = $total;
$response = $provider->createRecurringPaymentsProfile($data, $token);
if (!empty($response['PROFILESTATUS']) && in_array($response['PROFILESTATUS'], ['ActiveProfile', 'PendingProfile'])) {
                   echo  $status = 'Processed';
                } else {
                   echo $status = 'Invalid';
                }
//$response = $provider->doExpressCheckoutPayment($data, $token, $PayerID);
echo '<pre>';
print_r($response);
echo '</pre>';
     
    }
}

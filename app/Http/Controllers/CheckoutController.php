<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\UserAddress;
use Carbon\Carbon;
use Session;
use App\Cart;
use Srmklive\PayPal\Services\ExpressCheckout;
use PayPal;
use Redirect;
use DB;
use App\Models\Orders;
use App\Models\Booking_process;

class CheckoutController extends Controller
{
    function __construct(){
    	$this->middleware('auth');
    }

    function place_order(Request $request){
    	
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$data = $cart->items;
        $totalPrice = $cart->totalPrice;

        if(!$request->user_address){
        	$add = new UserAddress;
	    	$add->user_id = Auth::user()->id;
	    	$add->type = 'billing';
	    	$add->first_name = $request->first_name;
	    	$add->last_name = $request->last_name;
	    	$add->email = $request->email;
	    	$add->mobile = $request->mobile;
	    	$add->address = $request->address;
	    	$add->city = $request->city;
	    	$add->state = $request->state;
	    	$add->zipcode = $request->zipcode;
	    	$add->is_default = 0;
	    	$add->status = 1;
	    	$add->created_at = Carbon::now();
	    	$save = $add->save();

	    	$address_id = $add->id;
        }else{
        	$address_id = $request->user_address;
        }

$invoice = time();
       //$address = UserAddress::where('id',$address_id)->first();

	/* Orders table data insertion */

	$order = new Orders;
	$order->user_id = Auth::user()->id;
	$order->order_number = $invoice;
	$order->order_date = Carbon::now();
	$order->order_status = 'Pending';
	$order->order_description = 'Payment towards order '.$invoice;
	$order->ordered_amt = $totalPrice;
	$order->booking_datebooked = date('Y-m-d');
	$order->booking_timebooked = date('H:i:s');
	$order->booking_cart_total = count($data);
	$order->total = $totalPrice;
	$order->address_id = $address_id;
	$order->cart_total = serialize($cart);
	$order->created_at = Carbon::now();
	$order->save();


foreach ($cart->items as $keys => $it) {
	if($it['item']['sale_price'] != 0){
		$price = $it['item']['sale_price'];
	}else{
		$price = $it['item']['price'];
	}

	$bp = new Booking_process;
	$bp->user_id = Auth::user()->id;
	$bp->order_id = $order->id;
	$bp->category_id = 
	$bp->product_id = $it['item']['id'];
	$bp->product_name = $it['item']['product_name'];
	$bp->product_quantity = $it['qty'];
	$bp->bookingdate = date('Y-m-d');
	$bp->bookingtime = date('H:i:s');
	$bp->setpayment = $price;
	$bp->subtotal = $totalPrice;
	$bp->created_at = Carbon::now();
	$bp->save();

} 


        $data = [];
        
    	$data['items'] = [];
        foreach ($cart->items as $key => $item) {
        	if($item['item']['sale_price'] != 0){
        		$price = $item['item']['sale_price'];
        	}else{
        		$price = $item['item']['price'];
        	}

            $itemDetail=[
                'name' => $item['item']['product_name'],
                'price' => $price,
                'desc'  => $item['item']['product_name'],
                'qty' => $item['qty']
            ];

            $data['items'][] =$itemDetail;
        }

    	$total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
    
        $data['invoice_id'] = $invoice;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = url('payment/success/'.$invoice);
        $data['cancel_url'] = url('payment/cancel/'.$invoice);
        $data['total'] = $total;

        $provider = new ExpressCheckout;
  
        $response = $provider->setExpressCheckout($data);
  
        $response = $provider->setExpressCheckout($data, true);
  
        return redirect($response['paypal_link']);
        
    }

    public function cancel(Request $request)
    {
        $orderId = $request->orderId;
        $provider = PayPal::setProvider('express_checkout'); 
        $response = $provider->getExpressCheckoutDetails($request->token);

        $array = array('order_token' => $response['TOKEN'],'order_status' => 'Cancled');
        $ins = Orders::where('order_number',$orderId)->update($array);
        return redirect('cancel/'.$orderId);
    }



    function remove_all_items(){
        Session::forget('cart');
    }

    public function success(Request $request)
    {
    	$provider = PayPal::setProvider('express_checkout'); 
        $response = $provider->getExpressCheckoutDetails($request->token);

      /*  echo '<pre>';
        print_r($response);
        echo '</pre>';
        exit;
      */
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

        	$order_id = $request->order_id;

        	$array = array('order_token' => $response['TOKEN'],'order_status' => $response['ACK'],'payer_email' => $response['EMAIL'],'payerid' => $response['PAYERID'],'payer_first_name' => $response['FIRSTNAME'],'payer_last_name' => $response['LASTNAME'],'updated_at' => Carbon::now());

        	$ins = Orders::where('order_number',$order_id)->update($array);
            $this->remove_all_items();
           return redirect('order/invoice/'.$order_id);
        //return view('shopping.order-success',compact('orders','booking_process'));
        }
  
        $array = array('order_token' => $response['TOKEN'],'order_status' => $response['ACK'],'payer_email' => $response['EMAIL'],'payerid' => $response['PAYERID'],'payer_first_name' => $response['FIRSTNAME'],'payer_last_name' => $response['LASTNAME'],'updated_at' => Carbon::now());
        $ins = Orders::where('order_number',$order_id)->update($array);
        return redirect('order/faild/'.$order_id);
    }

    function payment_invoice(Request $request){
    	$orderId = $request->orderId;
        $page = '';
        $perPage = '';
    	$orders = DB::table('orders')->where('order_number',$orderId)->first();
        $booking_process = DB::table('booking_process')->where('order_id',$orders->id)->get();
    return view('shopping.order-success',compact('page','perPage','orders','booking_process'));
    }

    function payment_faild(Request $request){
        $orderId = $request->orderId;
        $page = '';
        $perPage = '';
        $orders = DB::table('orders')->where('order_number',$orderId)->first();
        return view('shopping.order-faild',compact('page','perPage','orders'));
    }

    function cancel_order(Request $request){
        $orderId = $request->orderId;
        $page = '';
        $perPage = '';
        $orders = DB::table('orders')->where('order_number',$orderId)->first();
        return view('shopping.order-cancled',compact('page','perPage','orders'));
    }
}

@extends('layouts.shopping')
@section('title','Cart')
@section('content')

<!-- section start -->
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="account-sidebar"><a class="popup-btn">my account</a></div>
                <div class="dashboard-left">
                    <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                    <div class="block-content card">
                    <ul>
                        <li><a href="{{url('my-account')}}">Account info</a></li>
                        <li ><a href="{{url('my-address')}}">Address</a></li>
                        <li class="active"><a href="{{url('my-orders')}}">My orders</a></li>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard card">
                        <div class="page-title">
                            <h2>My orders</h2></div>
                        <!-- <div class="welcome-msg">
                            <p>Hello, MARK JECNO !</p>
                            <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
                        </div> -->
                        <div class="box-account box-info">
                            <!-- <div class="box-head">
                                <h2>Account Information</h2></div> -->
                                <div class="box">
                                	@if($orders->count() > 0)
                                	@foreach($orders as $order)
    <?php 
    $image = App\Models\Product_images::where('product_id',$order->product_id)->first();
    if($image){
    	$im = $image->image_small;
    }else{
    	$im = 'https://via.placeholder.com/150';
    }
    ?>
                            <div class="row m-b-25">
                                <div class="col-sm-12">
                                        <div class="box-content m-t-15">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <img src="{{$im}}" class="w">
                                                </div>
                                            <div class="col-sm-5">
                                                    <h6><a href="{{url('shop-patterns')}}">{{$order->product_name}}</a></h6>
                                            </div>
                                            <div class="col-lg-5 text-right p-r-20">
                                                <h6>ORDER # {{$order->order_number}}</h6>
                                                <h6>Order placed on</h6><span>{{date('F d,Y',strtotime($order->booking_datebooked))}}</span>
                                                <h6>Total</h6><div class="text-right">${{$order->total}}</div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12"><hr></div>
                        </div>
                        @endforeach

                        {{$orders->links()}}
						@endif
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
@endsection
@section('footerscript')

@endsection
@extends('layouts.shopping')
@section('title','My account')
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
                        <li><a href="{{url('my-orders')}}">My orders</a></li>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard card">
                        <div class="page-title">
                          
                        <div class="box-account box-info">
                            <div class="box-head">
                                <h2>Account info</h2></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="box b_n">
                                        <div class="box-title">
                                            <h3>Contact information</h3><a href="#">Edit</a></div>
                                        <div class="box-content">
                                            <h6>MARK JECNO</h6>
                                            <h6>MARk-JECNO@gmail.com</h6>
                                            <h6>&nbsp;</h6></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="box b_n">
                                        <div class="box-title">
                                            <h3>Newsletters</h3><a href="#">Edit</a></div>
                                        <div class="box-content">
                                            <p>You are currently not subscribed to any newsletter.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="box b_n">
                                    <div class="box-title">
                                        <h3>Address Book</h3><a href="address-book.html">Manage addresses</a></div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h6>Default billing address</h6><address>You have not set a default billing address.<br><a href="address-book.html">Edit address</a></address></div>
                                        <div class="col-sm-6">
                                            <h6>Default shipping address</h6><address>You have not set a default shipping address.<br><a href="address-book.html">Edit address</a></address></div>
                                    </div>
                                </div>
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
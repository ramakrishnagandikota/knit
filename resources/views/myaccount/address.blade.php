@extends('layouts.shopping')
@section('title','My address')
@section('content')

<section class="section-b-space">
<div class="container">
<div class="row">
<div class="col-lg-3">
<div class="account-sidebar"><a class="popup-btn">my account</a></div>
<div class="dashboard-left">
<div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
<div class="card block-content">
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
<div class="dashboard">
<div class="page-title">
<h2>Billing address</h2></div>
<div class="box-account box-info">
<div class="row">
    <div class="col-sm-6">
        <div class="card">
           <a href="billing_Add.html">
            <div class="box-content text-center pad">
                    <i class="fa fa-plus"></i>
                <h3 class="m-t-20 m-b-15">Add address </h3>
            </div>
        </a>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card setActive">
            <div class="box-title">
                <h4>MARK JECNO </h4><a href="#"><u>Edit</u></a></div>
            <div class="box-content">
                <h6>115 EWS
                    New mukhrjee nagar
                    Dewas, Madhya Pradesh 455001
                    India</h6>
                <h6>mark-jenco@gmail.com</h6>
                <h6><a href="#"><u>Set as default</u></a></h6></div>
        </div>
    </div>
</div><br>
<div class="page-title">
        <h2>Shipping address</h2></div>
<div class="row">
        <div class="col-sm-6">
                <div class="card">
                   <a href="#">
                    <div class="box-content text-center pad">
                            <i class="fa fa-plus"></i>
                        <h3 class="m-t-20 m-b-15">Add address </h3>
                    </div>
                </a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card setActive">
                    <div class="box-title">
                        <h4>MARK JECNO </h4><a href="#"><u>Edit</u></a></div>
                    <div class="box-content">
                        <h6>115 EWS
                            New mukhrjee nagar
                            Dewas, Madhya Pradesh 455001
                            India</h6>
                        <h6>mark-jenco@gmail.com</h6>
                        <h6><a href="#"><u>Set as default</u></a></h6></div>
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
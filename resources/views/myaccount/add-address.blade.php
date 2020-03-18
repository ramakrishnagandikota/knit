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
    <li class="active" ><a href="{{url('my-address')}}">Address</a></li>
    <li><a href="{{url('my-orders')}}">My orders</a></li>
</ul>
</div>
</div>
</div>

<div class="col-lg-9">
<div class="checkout-page">
<div class="checkout-form">
<form action="{{url('add-address')}}" method="POST">
	@csrf
<div class="row">
    <div class="card col-md-10 offset-lg-1 p-20">
        <div class="checkout-title  text-center">
            <h3>Add new address</h3></div>
        <div class="row check-out">
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <div class="field-label">First name</div>
                <input type="text" name="first_name" value="" placeholder="">
                <span class="red">{{$errors->first('first_name')}}</span>
            </div>
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <div class="field-label">Last name</div>
                <input type="text" name="last_name" value="" placeholder="">
            </div>
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <div class="field-label">Phone</div>
                <input type="text" name="mobile" value="" placeholder="">
            </div>
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <div class="field-label">Email address</div>
                <input type="text" name="email" value="" placeholder="">
            </div>
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <div class="field-label">Country</div>
                <select name="country">
                    <option value="Canada">Canada</option>
                    <option value="United States">United States</option>
                </select>
            </div>
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <div class="field-label">Address</div>
                <input type="text" name="address" value="" placeholder="Street address">
            </div>
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <div class="field-label">Town/City</div>
                <input type="text" name="city" value="" placeholder="">
            </div>
            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                <div class="field-label">State / County</div>
                <input type="text" name="state" value="" placeholder="">
            </div>
            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                <div class="field-label">Postal code</div>
                <input type="text" name="zipcode" value="" placeholder="">
            </div>
            <!-- <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <input type="checkbox" name="shipping-option" id="account-option"> &ensp;
                <label for="account-option">Create An Account?</label>
            </div> -->
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            	<input type="submit" name="submit" class="btn theme-btn waves-effect waves-light" value="Add address">
            </div>
        </div>
    </div>
    
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>
@endsection
@section('footerscript')
<style type="text/css">
	.red{
		color: #bc7c8f;
    font-weight: 500;
	}
</style>
@endsection
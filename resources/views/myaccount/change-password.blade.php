@extends('layouts.shopping')
@section('title','My account')
@section('content')
<!-- section start -->
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif

@if(Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif

<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="account-sidebar"><a class="popup-btn">my account</a></div>
                <div class="dashboard-left">
                    <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                    <div class="block-content card">
                    <ul>
                        <li class="active" ><a href="{{url('my-account')}}">Newsletter info</a></li>
                        <li ><a href="{{url('my-address')}}">Address</a></li>
                        <li><a href="{{url('my-orders')}}">My orders</a></li>
                        <li><a href="{{url('change-password')}}">Change Password</a></li>
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
                                
<div class="col-sm-12">

<div class="box-content"><br>
    <div class="">
            <form class="theme-form text-center" action="{{url('change-password')}}" method="POST">
            	@csrf
                    <div class="form-row">
                        <div class="col-md-6 offset-lg-3">
                            <input type="password" class="form-control" id="oldPassword" name="old_password" placeholder="Old Password" required=""><br>
                            <input type="password" class="form-control" id="NewPassword" name="new_password" placeholder="New Password" required="">
							<span>{{$errors->first('new_password')}}</span>
                            <br>
                            <input type="password" class="form-control" id="confirmPassword" name="confirm_new_password" placeholder="Confirm Password" required="">
							<span>{{$errors->first('confirm_new_password')}}</span>
                            <br>
                        </div></div>
                        <button type="submit" class="btn theme-btn waves-effect waves-light" id="mc-submit">Change password</button>
                </form>
</div>
</div><br>

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
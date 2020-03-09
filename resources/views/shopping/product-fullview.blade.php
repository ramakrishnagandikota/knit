@extends('layouts.shopping')
@section('title',' Dashboard')
@section('content')

<!-- section start -->
<section>
<div class="collection-wrapper card p-15">
<div class="container">
<div class="row">
<div class="col-lg-4">
<div class="product-slick">

@if($product_images->count() > 0)
	@foreach($product_images as $pi)
<div><img src="{{ $pi->image_medium }}" alt="" class="img-fluid blur-up lazyload image_zoom_cls-0">
</div>
	@endforeach
@endif
<!-- 
<div><img src=" asset('resources/assets/KnitfitEcommerce/assets/images/pro3/2-1.jpg') }}" alt="" class="img-fluid blur-up lazyload image_zoom_cls-1">
</div> -->
<!-- <div><img src="../assets/images/pro3/1-2.jpg" alt="" class="img-fluid blur-up lazyload image_zoom_cls-2"></div>
<div><img src="../assets/images/pro3/1-3.jpg" alt="" class="img-fluid blur-up lazyload image_zoom_cls-3"></div> -->
</div>
<div class="row">
<div class="col-12 p-0">
<div class="slider-nav">
@if($product_images->count() > 0)
	@foreach($product_images as $pi)
<div><img src="{{ $pi->image_small }}" alt="" class="img-fluid blur-up lazyload">
</div>
	@endforeach
@endif

<!-- <div><img src="../assets/images/pro3/1-2.jpg" alt="" class="img-fluid blur-up lazyload"></div>
<div><img src="../assets/images/pro3/1-3.jpg" alt="" class="img-fluid blur-up lazyload"></div> -->
</div>
</div>
</div>
</div>
<div class="col-lg-5">
<div class="product-right product-description-box">
<h2>{{ ucfirst($product->product_name) }}</h2>

<div class="rating three-star mb-2">
	@php 
$rating = DB::select(DB::raw("select SUM(rating) as rat from product_comments where product_id = '".$product->id."' "));
$totrate = DB::table('product_comments')->where('product_id',$product->id)->count();
@endphp

@if($totrate > 0)
				@foreach($rating as $rat) 
				<?php $starNumber = number_format($rat->rat / $totrate,1);

				 ?>
				<?php
						for($x=1;$x<=$starNumber;$x++) {
							echo '<i class="fa fa-star" aria-hidden="true"></i> &nbsp;';
						}
						
						while ($x<=5) {
							echo '<i class="fa fa-star-o" aria-hidden="true"></i> &nbsp;';
							$x++;
						}
					?>
					&nbsp; 
				@endforeach
				@else
			<?php for($x=1;$x<=5;$x++) {
        		echo '<i class="fa fa-star-o" aria-hidden="true"></i> &nbsp;';
    			} ?>
    		@endif	
</div>
<div class="product-icon mb-3">
<ul class="product-social">
<li><a href="#"><i
class="fa fa-facebook"></i></a>
</li>
<!-- <li><a href="#"><i class="fa fa-google-plus"></i></a></li> -->
<li><a href="#"><i
class="fa fa-twitter"></i></a>
</li>
<!-- <li><a href="#"><i class="fa fa-instagram"></i></a></li>
<li><a href="#"><i class="fa fa-rss"></i></a></li> -->
</ul>
<form class="d-inline-block">
<button class="wishlist-btn"><i class="fa fa-heart"></i><span class="title-font">Add to
wishlist</span></button>
</form>
</div>
<div class="row product-accordion card p-b-10">
<div class="col-sm-12">
<div class="accordion theme-accordion" id="accordionExample">
<div class="">
<div class="card-header outline-row" id="headingOne" data-toggle="collapse" data-target="#collapseOne" style="margin-right:5px;margin-left: 5px;">
<h5 class="mb-0"><button
        class="btn btn-link"
        type="button"
        aria-expanded="true"
        aria-controls="collapseOne">Product
        description</button>
</h5>
<i class="fa fa-caret-down pull-right micro-icons m-t-15"></i>
</div>
<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
<div class="p-10">
<p>This sweater is meant to be comfortable and float over your body shape, however, you may decide how tight or loose you want the sweater to be by selecting the ease you want added to your measurements:
</p>
<ul class="ulli">
<li>
<p>Standard: 1.5 inches will be added to your measurements for a comfortable fit that glides over your body; or,
</p>
</li>
<li>
<p>Casual: 3 inches will be added to your measurements for a loose fit.
</p>
</li>

</ul>
<p>You will need to take the following measurements for your custom pattern at checkout:
</p>
<ul class="ulli">
<li type="circle">
<p>Lower Edge Width
</p>
</li>
<li type="circle">
<p>Length from Lower Edge to Underarm
</p>
</li>
<li type="circle">
<p>Waist</p>
</li>
<li type="circle">
<p>Bust</p>
</li>
<li type="circle">
<p>Wrist Circumference
</p>
</li>
<li type="circle">
<p>Forearm Circumference
</p>
</li>
<li type="circle">
<p>Upper Arm Circumference
</p>
</li>
<li type="circle">
<p>Length from Wrist to Underarm
</p>
</li>
<li type="circle">
<p>Armhole Depth
</p>
</li>
</ul>
<p>The original design was created in a gauge of 5.5 stitches and 7 rows per inch in stockinette. However, you can select a yarn from fingering to aran weight if you’d like. Just make sure that you have knit an accurate gauge swatch in the yarn you will be using.
</p>
</p>
</div>
</div>
</div>
<div class="">
<div class="card-header outline-row" style="margin-right:5px;margin-left: 5px;" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo">
<h5 class="mb-0"><button
        class="btn btn-link collapsed"
        type="button"
        aria-expanded="false"
        aria-controls="collapseTwo">Details</button>
</h5>
<i class="fa fa-caret-down pull-right micro-icons m-t-15"></i>
</div>

<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
<div class="p-10">
<ul class="ulli pl-18">
Not available
</ul>
</div>
</div>
</div>
<div class="">
<div class="card-header outline-row" style="margin-right:5px;margin-left: 5px;" id="headingthree" data-toggle="collapse" data-target="#collapsethree">
<h5 class="mb-0"><button
        class="btn btn-link collapsed"
        type="button"
        aria-expanded="false"
        aria-controls="collapseTwo">Additional
        information</button>
</h5>
<i class="fa fa-caret-down pull-right micro-icons m-t-15"></i>
</div>

<div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#accordionExample">
<div class="p-10">
<p><strong>Yarn
            Requirements:</strong>
</p>
<p>The amount of yarn in the kit is estimated for sizes 32 (34, 36, 38, 40, 42, 44)
</p>
<br>
<p><strong>Fingering
            weight
            yarn</strong>
<br> Yardage needed: 1900 (1900, 2000, 2200, 2200, 2400, 2400)
<br>
<br>
<strong>DK weight
            yarn</strong>
<br> Yardage needed: 1100 (1200, 1300, 1350, 1500, 1600, 1600)
<br>
<br>
<strong>Worsted
            weight
            yarn</strong>
<br> Yardage needed: 1300 (1400, 1500, 1600, 1600, 1700, 1700)
</p>
<br>

<p><strong>Tools:</strong>
</p>

<ul class="ulli">
<li>
<p>24" or 36" circular needle in the size that will give you a desirable fabric given the yarn that your choose.
</p>
</li>
<li>
<p>Markers</p>
</li>
</ul>
</div>
</div>
</div>
<div class="">
<div class="card-header outline-row" style="margin-right:5px;margin-left: 5px;" id="headingfour" data-toggle="collapse" data-target="#collapsefour">
<h5 class="mb-0"><button
        class="btn btn-link collapsed"
        type="button"
        aria-expanded="false"
        aria-controls="collapsefour">Read
        reviews</button>
</h5>
<i class="fa fa-caret-down pull-right micro-icons m-t-15"></i>
</div>

<div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordionExample">
<div class="p-10 m-t-10">
<div class="row">
<div class="col-sm-12 img-padding">
<img class="img-fluid" src="../../files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
</div>
<div class="col-lg-8">
<h6>Mark Jecno
                <span>( 12
                    Jannuary
                    2018 at
                    1:30AM
                    )</span>
            </h6>
<ul class="comnt-sec">
<li><a href="#"><i
                            class="fa fa-thumbs-o-up"
                            aria-hidden="true"></i><span>(14)</span></a>
</li>
<li>
<a href="#">
<div class="unlike">
<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>(2)
</div>
</a>
</li>
</ul>
</div>
<div class="col-lg-12 m-t-15">
<div class="media-body">
<p>Donec rhoncus massa quis nibh imperdiet dictum. Vestibulum id est sit amet felis fringilla bibendum at at leo. Proin molestie ac nisi eu laoreet. Integer faucibus enim nec ullamcorper tempor. Aenean nec felis dui. Integer tristique odio mi, in volutpat metus posuere eu. Aenean suscipit ipsum nunc, id volutpat lorem hendrerit ac. Sed id elit quam. In ac mauris arcu. Praesent eget lectus sit amet diam vestibulum varius. Suspendisse dignissim mattis leo, nec facilisis erat tempor quis. Vestibulum eu vestibulum ex.
</p>
</div>
</div>
<div class="col-lg-12">
<hr>
</div>
<div class="col-lg-12 img-padding">
<img class="img-fluid" src="../../files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
</div>
<div class="col-lg-8">
<h6>Mark Jecno<span>( 12 Jannuary 2018 at 1:30AM )</span></h6>
<ul class="comnt-sec">
<li><a href="#"><i
                            class="fa fa-thumbs-o-up"
                            aria-hidden="true"></i><span>(14)</span></a>
</li>
<li>
<a href="#">
<div class="unlike">
<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>(2)
</div>
</a>
</li>
</ul>
</div>
<div class="col-lg-12 m-t-15">
<div class="media-body">
<p>Donec rhoncus massa quis nibh imperdiet dictum. Vestibulum id est sit amet felis fringilla bibendum at at leo. Proin molestie ac nisi eu laoreet. Integer faucibus enim nec ullamcorper tempor. Aenean nec felis dui. Integer tristique odio mi, in volutpat metus posuere eu. Aenean suscipit ipsum nunc, id volutpat lorem hendrerit ac. Sed id elit quam. In ac mauris arcu. Praesent eget lectus sit amet diam vestibulum varius. Suspendisse dignissim mattis leo, nec facilisis erat tempor quis. Vestibulum eu vestibulum ex.
</p>
</div>

</div>
</div>
</div>
</div>
</div>
<div class="">
<div class="card-header outline-row" style="margin-right:5px;margin-left: 5px;" id="headingfive" data-toggle="collapse" data-target="#collapsefive">
<h5 class="mb-0"><button
        class="btn btn-link collapsed"
        type="button"
        aria-expanded="false"
        aria-controls="collapsefive">Write
        a review</button>
</h5>
<i class="fa fa-caret-down pull-right micro-icons m-t-15"></i>
</div>

<div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordionExample">
<div class="p-10">
<form class="theme-form">
<div class="form-row">
<div class="col-md-12">
<div class="media">
<label>Rating</label>
<div class="media-body ml-3">
<div class="rating three-star">
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
</div>
</div>
</div>
</div>
<div class="col-md-6 m-t-10">
<label for="name">Name</label>
<input type="text" class="form-control" id="name" placeholder="Enter your name" required>
</div>
<div class="col-md-6 m-t-10">
<label for="email">Email</label>
<input type="text" class="form-control" id="email" placeholder="Email" required>
</div>
<div class="col-md-12 m-b-10 m-t-15">
<label for="review">Review title
</label>
<input type="text" class="form-control" id="review" placeholder="Enter your review title" required>
</div>

<div class="col-md-12 m-t-10">
<button class="btn btn-block theme-outline-btn waves-effect waves-light" type="submit">Submit your review
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>

<div class="col-lg-3">
<div class="product-right product-form-box">
<h4><del>$459.00</del><span>55% off</span></h4>
<h3>$32.96</h3>
<!-- <ul class="color-variant">
<li class="bg-light0"></li>
<li class="bg-light1"></li>
<li class="bg-light2"></li>
</ul> -->
<div class="product-description border-product">

</div>
<div class="product-buttons" style="display: inline-flex;"><a href="#" data-toggle="modal" data-target="#addtocart" class="btn theme-outline-btn waves-effect waves-light">Add to
cart</a> <a href="#" class="btn theme-btn waves-effect waves-light">Buy now</a></div>
</div>
</div>
</div>
</div>
</div>

</section>
<!-- Section ends -->

@endsection
@section('footerscript')
    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/KnitfitEcommerce/assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/KnitfitEcommerce/assets/css/slick-theme.css') }}">

    <!-- Zoom js-->
    <script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/jquery.elevatezoom.js') }}"></script>
@endsection
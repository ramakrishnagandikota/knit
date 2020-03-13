@extends('layouts.shopping')
@section('title','Knitter Dashboard')
@section('content')

<!-- section start -->
<section class="section-b-space ratio_asos">
<div class="collection-wrapper">
<div class="container">
<div class="row">
<div class="col-sm-3 collection-filter" >
<!-- side-bar colleps block stat -->
<div class="collection-filter-block card" id="collection-filter">
<!-- brand filter start -->
<div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
<!-- Garment construction filter start here -->
<div class="collection-collapse-block border-0 open">
<!-- <h4 class="text-left heading-right m-t-10 m-b-20" style="color: #666666;">Filter patterns</h4> -->

<div class="row outline-row m-b-10 m-t-15" data-toggle="collapse" data-target="#section1">
<div class="accordion col-lg-11 p-r-0 p-l-0">
<h5 class="card-header-text accordion-left-menu-heading">Garment type</h5>
</div>
<div class="col-lg-1 p-r-0 m-t-5">
<i class="fa fa-caret-down pull-right micro-icons"></i>
</button>
</div>
</div>
<div class="collapse show" id="section1">
<div class="m-b-10">
<div class="row">
<div class="col-lg-12 col-sm-12">
<div class="list-group-item">
<div class="col-lg-12">
<div class="collection-brand-filter">
@if($garmenttype->count() > 0)
    @foreach($garmenttype as $gt)
<div class="custom-control custom-checkbox collection-filter-checkbox">
<input type="checkbox" class="custom-control-input" id="{{$gt->slug}}" value="{{$gt->slug}}">
<label class="custom-control-label" for="{{$gt->slug}}">{{$gt->name}}</label>
</div>
    @endforeach
@endif
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--Ends here-->           


<!-- Garment construction filter start here -->
<div class="row outline-row m-b-10" data-toggle="collapse" data-target="#section2">
<div class="accordion col-lg-11 p-r-0 p-l-0">
<h5 class="card-header-text accordion-left-menu-heading">Garment construction</h5>
</div>
<div class="col-lg-1 p-r-0 m-t-5">
<i class="fa fa-caret-down pull-right micro-icons"></i>
</button>
</div>
</div>
<div class="collapse show" id="section2">
<div class="m-b-10">
<div class="row">
<div class="col-lg-12 col-sm-12">
<div class="list-group-item">
<div class="col-lg-12">
<div class="collection-brand-filter">


@if($garmentconstruction->count() > 0)
    @foreach($garmentconstruction as $gc)
<div class="custom-control custom-checkbox collection-filter-checkbox">
<input type="checkbox" class="custom-control-input" id="{{$gc->slug}}" value="{{$gc->slug}}">
<label class="custom-control-label" for="{{$gc->slug}}">{{$gc->name}}</label>
</div>
    @endforeach
@endif

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--Ends here-->  


<!-- Garment construction filter start here -->
<div class="row outline-row m-b-10" data-toggle="collapse" data-target="#section3">
<div class="accordion col-lg-11 p-r-0 p-l-0">
<h5 class="card-header-text accordion-left-menu-heading">Pattern type</h5>
</div>
<div class="col-lg-1 p-r-0 m-t-5">
<i class="fa fa-caret-down pull-right micro-icons"></i>
</button>
</div>
</div>
<div class="collapse" id="section3">
<div class="m-b-10">
<div class="row">
<div class="col-lg-12 col-sm-12">
<div class="list-group-item">
<div class="col-lg-12">
<div class="collection-brand-filter">

<div class="custom-control custom-checkbox collection-filter-checkbox">
<input type="checkbox" class="custom-control-input" id="custom" value="custom">
<label class="custom-control-label" for="custom">Custom</label>
</div>
<div class="custom-control custom-checkbox collection-filter-checkbox">
<input type="checkbox" class="custom-control-input" id="non-custom" value="non-custom">
<label class="custom-control-label" for="non-custom">Non custom</label>
</div>
<!-- <div class="custom-control custom-checkbox collection-filter-checkbox">
<input type="checkbox" class="custom-control-input" id="toys">
<label class="custom-control-label" for="toys">Toys</label>
</div> -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--Ends here-->  

<!-- Garment construction filter start here -->
<div class="row outline-row m-b-10" data-toggle="collapse" data-target="#section4">
<div class="accordion col-lg-11 p-r-0 p-l-0">
<h5 class="card-header-text accordion-left-menu-heading">Designer</h5>
</div>
<div class="col-lg-1 p-r-0 m-t-5">
<i class="fa fa-caret-down pull-right micro-icons"></i>
</button>
</div>
</div>
<div class="collapse" id="section4">
<div class="m-b-10">
<div class="row">
<div class="col-lg-12 col-sm-12">
<div class="list-group-item">
<div class="col-lg-12">
<div class="collection-brand-filter">
<div class="custom-control custom-checkbox collection-filter-checkbox">
<input type="checkbox" class="custom-control-input" id="knit-fit-couture" value="knit-fit-couture">
<label class="custom-control-label" for="knit-fit-couture">Knit Fit Couture</label>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--Ends here-->  
 
</div>
</div>


</div>
<div class="collection-content col">
<div class="page-main-content">
<div class="row">
<div class="col-sm-12">
<div class="top-banner-wrapper">


</div>
<div class="collection-product-wrapper">
<div class="product-top-filter">
<div class="row">
<div class="col-xl-12">
<div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
</div>
</div>
<div class="row">
<div class="col-12 card">
<div class="row product-filter-content">
    <div class="col-lg-2">
        <div class="collection-view">
            <ul>
                <li><i class="fa fa-th grid-layout-view"></i></li>
                <li><i class="fa fa-list-ul list-layout-view"></i></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="collection-grid-view">
            <ul>
                <li><img src="{{ asset('resources/assets/KnitfitEcommerce/assets/images/icon/2.png') }}" alt="" class="product-2-layout-view"></li>
                <li><img src="{{ asset('resources/assets/KnitfitEcommerce/assets/images/icon/3.png') }}" alt="" class="product-3-layout-view"></li>
                <li><img src="{{ asset('resources/assets/KnitfitEcommerce/assets/images/icon/4.png') }}" alt="" class="product-4-layout-view"></li>
                <li><img src="{{ asset('resources/assets/KnitfitEcommerce/assets/images/icon/6.png') }}" alt="" class="product-6-layout-view"></li>
            </ul>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="custom-select selects m-t-15">
            <select name="select" id="perPage">
                <option  value="">25 Products per page</option>
                <option  value="25" @if($perPage == 25) selected @endif >25 Products per page</option>
                <option  value="50" @if($perPage == 50) selected @endif >50 Products per page</option>
                <option  value="100" @if($perPage == 100) selected @endif >100 Products per page</option>
               
            </select>
          </div> 
    </div>
    <div class="col-lg-3" style="margin-right: 20px;">
      <div class="custom-select select1 m-t-15">
        <select name="select">
            <option value="opt1"> Newest first</option>
            <option value="newest_first" @if($orderBy == '_Newest_first') selected @endif > Newest first</option>
            <option value="low_to_high" @if($orderBy == 'Low_to_high') selected @endif >Low to high</option>
            <option value="high_to_low" @if($orderBy == 'High_to_low') selected @endif >High to low</option>
            <option value="popular" @if($orderBy == 'Popular') selected @endif >Popular</option>
        </select>
       
      </div>
    </div>
</div>
</div>
</div>
</div>
<div class="product-wrapper-grid">
<div class="row card-bg">
@if($products->count() > 0)
	@foreach($products as $pro)
@php 
$rating = DB::select(DB::raw("select SUM(rating) as rat from product_comments where product_id = '".$pro->id."' "));
$totrate = DB::table('product_comments')->where('product_id',$pro->id)->count();
@endphp
<div class="col-xl-3 col-md-6 col-grid-box sectionContent knit-fit-couture">
<div class="product-box">
    <div class="img-wrapper">
        <div class="front">
            <a href="#"><img src="{{ asset('resources/assets/KnitfitEcommerce/assets/images/pro3/peekaboo_1.jpg') }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div>
        <div class="back">
            <a href="#"><img src="{{ asset('resources/assets/KnitfitEcommerce/assets/images/pro3/peekaboo_2.jpg') }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div>
        <div class="cart-info cart-wrap">
            <button data-toggle="modal" data-target="#addtocart"  title="Add to cart"><i class="typcn typcn-shopping-cart" ></i></button>  <a href="#" data-toggle="modal" class="pattern-popup" data-id="{{$pro->pid}}" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a></div>
    </div>
    <div class="product-detail">
        <div>
            <a href="{{url('product/'.$pro->pid.'/'.$pro->slug)}}"><h5 class="m-t-10 min-height-heading">{{$pro->product_name}}</h5></a>
            <div class="rating">

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
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
            <h5>${{$pro->price}}</h5>
            <!-- <ul class="color-variant">
                <li class="bg-light0"></li>
                <li class="bg-light1"></li>
                <li class="bg-light2"></li>
            </ul> -->
        </div>
    </div>
</div>
</div>

@endforeach

@else
<div style="margin: auto;">No products to show. Change the search criteria</div>
@endif
</div>
</div>
<div class="product-pagination">
<div class="theme-paggination-block">
<div class="row card-bg" style="padding: 2px;">
<div class="col-xl-8 col-md-8 col-sm-12">

	<nav aria-label="Page navigation">
        {{$products->links()}}
    </nav>

   
</div>
<div class="col-xl-4 col-md-4 col-sm-12">
    <div class="product-search-count-bottom">
        <h5>Showing Products {{$products->currentPage()}} - {{$products->count()}} of {{$products->lastPage()}} Result</h5></div>
</div>
</div>
</div>
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


<!-- Quick-view modal popup start-->
<div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content quick-view-modal">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="row" id="show-pattern">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick-view modal popup end-->

@endsection
@section('footerscript')
<style type="text/css">
	.page-link{
		padding:12px !important;
	}
	.fas .fa-heart{
		color: #bc7c8f;
	}
	.rating i{
		color: #ddd !important;
	}
	.rating i.fa-star{
		color: #ffa200 !important;
	}
</style>

<script type="text/javascript">
    var sections = $('.sectionContent');

	$(function(){
        updateContentVisibility();

		var perPage = '{{$perPage}}';
		setTimeout(function(){
			var pageLink = $(".page-item a");
			var pageLinks = $(".page-item a").attr('href');
			pageLink.each(function() {
			    var url = $(this).attr('href');
			    $(this).attr('href',url+'&perPage='+perPage);
			});
			
		},3000);


		$(document).on('click','.pattern-popup',function(){
			var id = $(this).attr('data-id');
			$("#show-pattern").load('{{url("pattern-popup")}}/'+id)
		});



        $("#collection-filter :checkbox").click(updateContentVisibility);
        
		
	});

function updateContentVisibility(){
    var checked = $("#collection-filter :checkbox:checked");
    if(checked.length){
        sections.hide();
        checked.each(function(){
            $("." + $(this).val()).show();
        });
    } else {
        sections.show();
    }
}
</script>
@endsection
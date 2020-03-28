@extends('layouts.shopping')
@section('title','Shop Patterns')
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
@if($garmentType->count() > 0)
    @foreach($garmentType as $gt)
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


@if($garmentConstruction->count() > 0)
    @foreach($garmentConstruction as $gc)
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

<div class="row outline-row m-b-10" data-toggle="collapse" data-target="#section2">
<div class="accordion col-lg-11 p-r-0 p-l-0">
<h5 class="card-header-text accordion-left-menu-heading">Design elements</h5>
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


@if($designElements->count() > 0)
    @foreach($designElements as $de)
<div class="custom-control custom-checkbox collection-filter-checkbox">
<input type="checkbox" class="custom-control-input" id="{{$de->slug}}" value="{{$de->slug}}">
<label class="custom-control-label" for="{{$de->slug}}">{{$de->name}}</label>
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


<!-- Shoulder construction filter start here -->
<div class="row outline-row m-b-10" data-toggle="collapse" data-target="#section2">
<div class="accordion col-lg-11 p-r-0 p-l-0">
<h5 class="card-header-text accordion-left-menu-heading">Shoulder construction</h5>
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


@if($shoulderConstruction->count() > 0)
    @foreach($shoulderConstruction as $sc)
<div class="custom-control custom-checkbox collection-filter-checkbox">
<input type="checkbox" class="custom-control-input" id="{{$sc->slug}}" value="{{$sc->slug}}">
<label class="custom-control-label" for="{{$sc->slug}}">{{$sc->name}}</label>
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

<div class="col-lg-3">
    <div class="collection-view">
        <ul>
            <li><i class="fa fa-th grid-layout-view"></i></li>
            <li><i class="fa fa-list-ul list-layout-view"></i></li>
            <li style="margin-top: -2px;margin-left: 20px;"><span class="collection-grid-view">
             <ul>
                <li><img src="{{ asset('resources/assets/KnitfitEcommerce/assets/images/icon/2.png') }}" alt="" class="product-2-layout-view"></li>
                <li><img src="{{ asset('resources/assets/KnitfitEcommerce/assets/images/icon/3.png') }}" alt="" class="product-3-layout-view"></li>
                <li style="margin-left: 20px;"><img src="{{ asset('resources/assets/KnitfitEcommerce/assets/images/icon/4.png') }}" alt="" class="product-4-layout-view"></li>
                <li style="margin-left: 22px;"><img src="{{ asset('resources/assets/KnitfitEcommerce/assets/images/icon/6.png') }}" alt="" class="product-6-layout-view"></li>
                </ul>   
              </span> </li>
        </ul>

    </div>

</div>

<div class="col-lg-3">
    <form class="form-horizontal" action="{{url('search-products')}}" method="GET">
        <div class="form-group">
            <input type="text" class="form-control" style="margin-top: 15px;height:36px;border-radius: 3px;" value="{{$name}}"  id="pwd" placeholder="Search" name="search">
            <button type="submit" id="search-btn-insider"><i class="fa fa-search"></i></button>
        </div>

    </form>
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
<div class="col-lg-3">
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
$gartype = str_replace(',',' ',$pro->garment_type);
$garcons = str_replace(',',' ',$pro->garment_construction);
$desielem = str_replace(',',' ',$pro->design_elements);
$shouldcons = str_replace(',',' ',$pro->shoulder_construction);
$product_images = App\Models\Product_images::where('product_id',$pro->id)->first();
if($pro->is_custom == 1){
    $custom = 'custom';
}else{
    $custom = 'non-custom';
}
@endphp
<div class="col-xl-3 col-md-6 col-grid-box sectionContent knit-fit-couture {{$gartype}} {{$garcons}} {{$desielem}} {{$shouldcons}} {{$custom}}">
<div class="product-box">
    <div class="img-wrapper">
        @if($product_images)
        <div class="front">
            <a href="#" style="background-image: url('{{$product_images->image_small}}');" ><img src="{{$product_images->image_small}}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div>
        <div class="back">
            <a href="#" style="background-image: url('{{$product_images->image_small}}');" ><img src="{{$product_images->image_small}}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div>
        @else
        <div class="front">
            <a href="#"><img src="https://via.placeholder.com/150" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div>
        <div class="back">
            <a href="#"><img src="https://via.placeholder.com/150" class="img-fluid blur-up lazyload bg-img" alt=""></a>
        </div>
        @endif
        <div class="cart-info cart-wrap">
            <button class="addToCart" data-id="{{$pro->id}}" title="Add to cart"><i class="typcn typcn-shopping-cart" ></i></button>  
            <a href="#" data-toggle="modal" class="pattern-popup" data-id="{{$pro->pid}}" data-target="#quick-view" title="Quick View"><i class="ti-search" aria-hidden="true"></i></a>
        </div>
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
            <p>{{Str::limit($pro->product_description,245)}} &nbsp; <a href="{{url('product/'.$pro->pid.'/'.$pro->slug)}}">Read more</a> </p>
            @if(empty($pro->sale_price))
                @if($pro->price == 0)
                <h5>FREE</h5>
                @else
                <h5>$ {{$pro->price}}</h5>
                @endif
            @else
            @if($pro->sale_price == 0)
                <h5>FREE</h5>
                @else
                <h5>$ {{$pro->sale_price}}</h5>
                @endif
            @endif
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

<div style="margin: auto;" id="noproducts" class="hide">No products to show. Change the search criteria</div>
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
    .hide{
        display: none;
    }

            .custom-control-label::before
            {
                border: .8px solid #0d665c!important;
                background-color: transparent;
            }
            .list-group-item {

                padding: .75rem 0rem;
            }

            select option:hover,
    select option:focus,
    select option:active {
        background: linear-gradient(#000000, #000000);
        background-color: #000000 !important; /* for IE */
        color: #ffed00 !important;
    }
    .custom-select{padding: unset}
    #search-btn-insider{position: absolute;
    top: 22px;
    right: 18px;
    /* -webkit-appearance: media-sliderthumb; */
    border: none;
    background-color: transparent;
    }
    .form-control{ border: 1px solid #0d665c;}
    .progress{
        max-width: 100% !important;
    }
        </style>

<script>

    var page = '{{$page}}';
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("selects");
for (i = 0; i < x.length; i++) {
selElmnt = x[i].getElementsByTagName("select")[0];
/*for each element, create a new DIV that will act as the selected item:*/
a = document.createElement("DIV");
a.setAttribute("class", "select-selected");
a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
x[i].appendChild(a);
/*for each element, create a new DIV that will contain the option list:*/
b = document.createElement("DIV");
b.setAttribute("class", "select-items select-hide");

for (j = 1; j < selElmnt.length; j++) {
/*for each option in the original select element,
create a new DIV that will act as an option item:*/
c = document.createElement("DIV");
c.innerHTML = selElmnt.options[j].innerHTML;
c.addEventListener("click", function(e) {
/*when an item is clicked, update the original select box,
and the selected item:*/
var y, i, k, s, h;
s = this.parentNode.parentNode.getElementsByTagName("select")[0];
h = this.parentNode.previousSibling;
for (i = 0; i < s.length; i++) {
if (s.options[i].innerHTML == this.innerHTML) {
s.selectedIndex = i;
h.innerHTML = this.innerHTML;
y = this.parentNode.getElementsByClassName("same-as-selected");
for (k = 0; k < y.length; k++) {
y[k].removeAttribute("class");
}
this.setAttribute("class", "same-as-selected");
window.location.assign('{{url("search-products?search=".$name)}}'+'&perPage='+this.innerHTML.replace(/[^\d.]/g, '' )+'&page='+page);
break;
}
}
h.click();
});
b.appendChild(c);
}
x[i].appendChild(b);
a.addEventListener("click", function(e) {
/*when the select box is clicked, close any other select boxes,
and open/close the current select box:*/
e.stopPropagation();
closeAllSelect(this);
this.nextSibling.classList.toggle("select-hide");
this.classList.toggle("select-arrow-active");
});
}

function closeAllSelect(elmnt) {
/*a function that will close all select boxes in the document,
except the current select box:*/
var x, y, i, arrNo = [];
x = document.getElementsByClassName("select-items");
y = document.getElementsByClassName("select-selected");
for (i = 0; i < y.length; i++) {
if (elmnt == y[i]) {
arrNo.push(i)
} else {
y[i].classList.remove("select-arrow-active");
}
}
for (i = 0; i < x.length; i++) {
if (arrNo.indexOf(i)) {
x[i].classList.add("select-hide");
}
}
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>

<script>

    var page = '{{$page}}';
    var perPage = '{{$perPage}}';
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("select1");
for (i = 0; i < x.length; i++) {
selElmnt = x[i].getElementsByTagName("select")[0];
/*for each element, create a new DIV that will act as the selected item:*/
a = document.createElement("DIV");
a.setAttribute("class", "select-selected");
a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
x[i].appendChild(a);
/*for each element, create a new DIV that will contain the option list:*/
b = document.createElement("DIV");
b.setAttribute("class", "select-items select-hide");

for (j = 1; j < selElmnt.length; j++) {
/*for each option in the original select element,
create a new DIV that will act as an option item:*/
c = document.createElement("DIV");
c.innerHTML = selElmnt.options[j].innerHTML;
c.addEventListener("click", function(e) {
/*when an item is clicked, update the original select box,
and the selected item:*/
var y, i, k, s, h;
s = this.parentNode.parentNode.getElementsByTagName("select")[0];
h = this.parentNode.previousSibling;
for (i = 0; i < s.length; i++) {
if (s.options[i].innerHTML == this.innerHTML) {
s.selectedIndex = i;
h.innerHTML = this.innerHTML;
y = this.parentNode.getElementsByClassName("same-as-selected");
for (k = 0; k < y.length; k++) {
y[k].removeAttribute("class");
}
this.setAttribute("class", "same-as-selected");
var dd = this.innerHTML;
window.location.assign('{{url("search-products?search=".$name)}}'+'&perPage='+perPage+'&page='+page+'&orderBy='+dd.split(' ').join('_'));
break;
}
}
h.click();
});
b.appendChild(c);
}
x[i].appendChild(b);
a.addEventListener("click", function(e) {
/*when the select box is clicked, close any other select boxes,
and open/close the current select box:*/
e.stopPropagation();
closeAllSelect(this);
this.nextSibling.classList.toggle("select-hide");
this.classList.toggle("select-arrow-active");
});
}

function closeAllSelect(elmnt) {
/*a function that will close all select boxes in the document,
except the current select box:*/
var x, y, i, arrNo = [];
x = document.getElementsByClassName("select-items");
y = document.getElementsByClassName("select-selected");
for (i = 0; i < y.length; i++) {
if (elmnt == y[i]) {
arrNo.push(i)
} else {
y[i].classList.remove("select-arrow-active");
}
}
for (i = 0; i < x.length; i++) {
if (arrNo.indexOf(i)) {
x[i].classList.add("select-hide");
}
}
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
<script type="text/javascript">
    var sections = $('.sectionContent');

	$(function(){
        updateContentVisibility();

        $(document).on('click','.pattern-popup',function(){
            var id = $(this).attr('data-id');
            $("#show-pattern").load('{{url("pattern-popup")}}/'+id)
        });

		var perPage = '{{$perPage}}';
        var search = '{{$name}}';
		setTimeout(function(){
			var pageLink = $(".page-item a");
			var pageLinks = $(".page-item a").attr('href');
			pageLink.each(function() {
			    var url = $(this).attr('href');
			    $(this).attr('href',url+'&search='+search+'&perPage='+perPage);
			});
			
		},1000);


		$(document).on('click','.pattern-popup',function(){
			var id = $(this).attr('data-id');
			$("#show-pattern").load('{{url("pattern-popup")}}/'+id)
		});



        $("#collection-filter :checkbox").click(updateContentVisibility);
        

        $(document).on('click','.addToCart',function(){
        /* var is_login = $("#is_login").val();
        if(!is_login){
            addProductCartOrWishlist('fa-times','Error','Please login to add product to cart.')
            return false;
        } */
        var id = $(this).attr('data-id');
        var Data = 'product_id='+id;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            $.ajax({
                url : '{{url("add-to-cart")}}',
                type : 'POST',
                data : Data,
                beforeSend: function(){
                
                },
                success : function(res){
                    if(res.error == 'fail'){
                       addProductCartOrWishlist('fa-times','Oops!','This product is already in cart.'); 
                    }else{
                    addProductCartOrWishlist('fa-check','Success','Product Successfully added to cart');
                    }
                },
                complete : function(){
                    getCart();
                },
                error : function(jQxhr,textStatus){
                    if(jQxhr.statusText == 'Unauthorized'){
                        addProductCartOrWishlist('fa-times','Error','Please login to add product to cart.');
                    }
                }
            }); 
    });
		
	});

function updateContentVisibility(){
    var checked = $("#collection-filter :checkbox:checked");
    //if(sections.length == 0){
               
            //}
    if(checked.length){
        sections.addClass('hide');
        checked.each(function(){
            $("." + $(this).val()).removeClass('hide');

        });
    } else {
        sections.removeClass('hide');
    }

     if ( $("div.sectionContent:visible").length === 0){
        $("#noproducts").removeClass('hide');
     }else{
        $("#noproducts").addClass('hide');
     }
        
}

function addProductCartOrWishlist(icon,status,msg){
        $.notify({
            icon: 'fa '+icon,
            title: status+'!',
            message: msg
        },{
            element: 'body',
            position: null,
            type: "info",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 10000,
            delay: 3000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
    }
</script>
@endsection
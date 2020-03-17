<!DOCTYPE html>
<html lang="en">

<head>
<title>KnitFit eCom | Shop patterns</title>
<!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 10]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
<meta name="author" content="Phoenixcoded" />
<!-- Favicon icon -->

<link rel="icon" href="{{ asset('resources/assets/files/assets/images/favicon.ico')}}" type="image/x-icon">
<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<!-- Required Fremwork -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/bower_components/bootstrap/css/bootstrap.min.css')}}">
<!-- waves.css -->
<link rel="stylesheet" href="{{ asset('resources/assets/files/assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
<!-- feather icon -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/feather/css/feather.css') }}">
<!-- themify-icons line icon -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/themify-icons/themify-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/typicons-icons/css/typicons.min.css') }}">
<!-- ico font -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/icofont/css/icofont.css') }}">
<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/font-awesome/css/font-awesome.min.css') }}">
<!-- typicon icon -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/typicons-icons/css/typicons.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/KnitfitEcommerce/assets/css/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/KnitfitEcommerce/assets/css/slick-theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/KnitfitEcommerce/assets/css/animate.css') }}">
<!-- Style.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/css/pages.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/css/e-commerce.css') }}">
<!-- Theme css -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/KnitfitEcommerce/assets/css/color17.css') }}" media="screen" id="color">
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/KnitfitEcommerce/assets/css/left-menu.css') }}">

</head>

<body>

<!-- [ Pre-loader ] start -->
<div class="loader-bg">
<div class="loader-bar"></div>
</div>
<!-- [ Pre-loader ] end -->
<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">
<!-- [ Header ] start -->
<nav class="navbar header-navbar pcoded-header">
<div class="navbar-wrapper">
<div class="navbar-logo">

<a href="{{url('/')}}">
<img class="img-fluid theme-logo" src="{{ asset('resources/assets/files/assets/images/logoNew.png') }}" alt="Theme-Logo" />
</a>
<a class="mobile-options waves-effect waves-light">
<i class="feather icon-more-horizontal"></i>
</a>
</div>
<div class="navbar-container container-fluid">
<ul class="nav-left">
<!-- <li class="text-muted f-14 welcome-knitfit">Welcome to our store Knitfit</li>
<li class="text-muted f-14 call-us"><i class="fa fa-phone" aria-hidden="true"></i> Call Us: 123-456-7890</li> -->
</ul>
<ul class="nav-right">
<li class="header-notification toggle-menu">
<div class="dropdown-primary dropdown">
<div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-navicon"></i>
</div>
</div>
</li>
<!-- <li><a href="../../Knitter/Nini/Dashboard.html">Home</a></li> -->
<li class="active"><a href="{{url('shop-patterns')}}">Shop patterns</a></li>
@if(Auth::check())
<li class="header-notification">
<div class="dropdown-primary dropdown">
<div class="dropdown-toggle f-16" data-toggle="dropdown">
Account <i class="feather icon-chevron-down"></i>
</div>
<ul class="show-account-dropdown dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
<li>
<ul class="header-dropdown">
    <li  class="onhover-div shopping-menu">
            <ul class="show-div shopping-cart">
                <!-- <li><a href="my-whislist.html">Wishlist</a></li> -->
                <li><a href="#">Cart</a></li>
                <li><a href="#">My account </a></li>
                <li><a href="#">Wishlist</a></li>
                <!-- <li><a href="forget_pwd.html">Forget password</a></li> -->
                <li><a href="#">Checkout</a></li>
         
            </ul>
        </li>
</ul>
</li>

</ul>

</div>
</li>
@endif

<li class="header-notification p-l-0 p-r-5">
<div class="dropdown-primary dropdown" id="cart-div">   
       

</div>
</li>
<!-- <li class="mobile-wishlist p-0 m-l-10"><a href="my-whislist.html"><i class="fa fa-heart" aria-hidden="true"></i></a></li> -->
@if(Auth::check())
<li class="user-profile header-notification">
<div class="dropdown-primary dropdown">
<div class="dropdown-toggle" data-toggle="dropdown">
<img src="{{ asset('resources/assets/files/assets/images/avatar-2.jpg') }}" class="img-radius" alt="User-Profile-Image">
<span>{{ucfirst(Auth::user()->first_name)}}</span>
<i class="feather icon-chevron-down"></i>
</div>
<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

<li>
<a href="{{url('logout')}}">
<i class="feather icon-log-out"></i> Logout</a>
</li>
</ul>
</div>
</li>
@else
    <li>
    <a href="{{url('login?p='.URL::previous())}}">Login</a>
    </li>
    
    <li>
    <a href="{{url('register')}}">Register</a>
    </li>
@endif
</ul>
</div>
</div>

</nav>
<!-- [ Header ] end -->


<!-- [ chat message ] end -->
<div class="pcoded-main-container">
<div class="pcoded-wrapper" id="dashboard">

<div class="pcoded-content">

<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<!-- Page-body start -->
<div class="page-body">
<div class="row">
<div class="col-lg-12">
<!-- section start -->

@yield('content')
<!-- section End -->


<!-- footer start -->
<footer class="footer-light">
<div class="light-layout">
    <div class="container">
        <section class="small-section border-section border-top-0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="subscribe">
                        <div>
                            <h4>Want expert tips on getting that perfect fit?</h4>
                            <p>Sign up to receive for our helpful, inspiring, and delightfully un-spammy newsletters!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="" class="form-inline subscribe-form auth-form needs-validation" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                        <div class="form-group mx-sm-3">
                            <input type="text" class="form-control" name="EMAIL" id="mce-EMAIL" placeholder="Enter your email" required="required">
                        </div>
                        <button type="submit" class="btn theme-outline-btn waves-effect waves-light " id="mc-submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<section class="section-b-space light-layout">
   
</section>
<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="footer-end">
                    <p><i class="fa fa-copyright" aria-hidden="true"></i> {{date('Y')}} <a href="{{url('/')}}">KnitFitCo</a></p>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-12">
                
            </div>
        </div>
    </div>
</div>
</footer>
</div>
</div>
</div>
</div>
<!-- Page-body end -->
</div>
</div>
</div>
</div>
<!-- Main-body end -->

</div>
</div>
<div id="sidebar" class="users p-chat-user showChat">
<div class="had-container">
<div class="p-fixed users-main">
<div class="user-box">
<div class="chat-search-box">
<a class="back_friendlist">
<i class="feather icon-x"></i>
</a>
<div class="row right-menubar">
<div class="col-lg-6 col-6">
    <figure class="no-bg"><a href="{{url('knitter/project-library')}}" class="m-l-10"> <img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Projects.png') }}" /></a><figcaption class="text-muted text-center">Project Library</figcaption>
    </figure>
</div>
<div class="col-lg-6 col-6"> <a href="{{url('shop-patterns')}}"><figure class="no-bg"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Shop-Design.png') }}" /></a><figcaption class="text-muted text-center">Shop</figcaption></figure></div>
</div>
<div class="row right-menubar">
<div class="col-lg-6 col-6"> <figure class="no-bg"><a href="#"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Timeline.png') }}" /></a><figcaption class="text-muted text-center">Connect</figcaption></figure></div>

<div class="col-lg-6 col-6"> <a href="{{url('knitter/measurements')}}"><figure  class="no-bg"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Measurement.png') }}" /></a><figcaption class="text-muted text-center ">Measurement</figcaption></figure></div>
</div>
<div class="row right-menubar">
<div class="col-lg-6 col-6"> <a href="#"> <figure class="no-bg"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Friends.png') }}" /></a><figcaption class="text-muted text-center">Friends</figcaption></figure></div>

<div class="col-lg-6 col-6"> <a href="#"><figure class="no-bg"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/My-Profile.png') }}" /></a><figcaption class="text-muted text-center ">My Profile</figcaption></figure></div>
</div>
<div class="row right-menubar">
<div class="col-lg-6 col-6"> <a href="#"> <figure class="no-bg"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/To-do.png') }}" /></a><figcaption class="text-muted text-center ">To-Do</figcaption></figure></div>

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
<!-- latest jquery-->
<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/jquery-3.3.1.min.js') }}"></script>

<!-- menu js-->
<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/menu.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/lazysizes.min.js') }}"></script>

<!-- popper js-->
<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/popper.min.js') }}"></script>

<!-- slick js-->
<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/slick.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/bootstrap.js') }}"></script>

<!-- Bootstrap Notification js-->
<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/bootstrap-notify.min.js') }}"></script>

<!-- Theme js-->
<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/script.js') }}"></script>


<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>

<!-- menu js-->
<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/menu.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/lazysizes.min.js') }}"></script>

<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/modernizr/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/modernizr/js/css-scrollbars.js') }}"></script>
<script src="{{ asset('resources/assets/files/assets/pages/waves/js/waves.min.js') }}"></script>
<!-- Todo js -->

<script src="{{ asset('resources/assets/files/assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('resources/assets/files/assets/js/vertical/vertical-layout.min.js') }}"></script>

<!-- Custom js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/assets/js/script.js') }}"></script>

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
window.location.assign('{{url("shop-patterns?perPage=")}}'+this.innerHTML.replace(/[^\d.]/g, '' )+'&page='+page);
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
window.location.assign('{{url("shop-patterns?perPage=")}}'+perPage+'&page='+page+'&orderBy='+dd.split(' ').join('_'));
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
    $(function(){
        getCart();

        $(document).on('click','.remove-item',function(){
        if(confirm('Are you sure want to remove item from cart ?')){
            var id = $(this).attr('data-id');
        $.get('{{url("remove-item")}}/'+id,function(res){
    getCart();
    if(document.title == 'Knitfit - Checkout'){
        window.location.assign('{{url("shop-patterns")}}')
    }
    addProductCartOrWishlist('fa-check','Success','Product Successfully removed from cart');
        });
        }
    });
    });
    function getCart(){
    $("#cart-div").load('{{ url("load-cart") }}');
    }
</script>
@yield('footerscript')
</body>

</html>
<?php header('Set-Cookie: cross-site-cookie='.url('/').'; SameSite=None; Secure'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>KnitFit | @yield('title')</title>
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
<meta name="author" content="Knitfit" />
<!-- Favicon icon -->
<!-- <script src=" asset('public/js/app.js') }}" defer></script> -->
<link rel="icon" href="{{ asset('resources/assets/files/assets/images/favicon.ico') }}" type="image/x-icon">
<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<!-- Required Fremwork -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/bower_components/bootstrap/css/bootstrap.min.css') }}">
<!-- waves.css -->
<link rel="stylesheet" href="{{ asset('resources/assets/files/assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
<!-- feather icon -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/feather/css/feather.css') }}">
<!-- themify-icons line icon -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/themify-icons/themify-icons.css') }}">
<!-- ico font -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/icofont/css/icofont.css') }}">
<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/font-awesome/css/font-awesome.min.css') }}">
<!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/material-design/css/material-design-iconic-font.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/css/pages.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/marketplace/css/Marketplace.css') }}">
<link rel="stylesheet" href="{{ asset('resources/assets/marketplace/src/images-grid-custom.css') }}">

 <link rel="stylesheet" type="text/css" href="{{asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">

 <script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery/js/jquery.min.js') }}"></script>
  <script src="{{asset('resources/assets/pusher.min.js')}}"></script>



 <script>
 var UserId = '{{Auth::user()->id}}';

   var pusher = new Pusher('7c06140b8071b2413bb7', {
	    forceTLS: true,
		cluster : 'ap2'
  });

  var channel = pusher.subscribe('like-post-'+UserId);

  // Bind a function to a Event (the full Laravel class)
  channel.bind('App\\Events\\LikeToPost', function(data) {
	  var da = JSON.stringify(data);
    //alert(da);
	  //console.log(data);
	  if($('#NotificationCount').length > 0){
		  var NotificationCount = $('#NotificationCount').html();
		  var Ncount = parseInt(NotificationCount) + 1;
		  $('#NotificationCount').html(Ncount);
	  }else{
		  var Ncount = 1;
		  var htmls = '<i class="feather icon-bell"></i><span id="NotificationCount" class="badge bg-c-red">'+Ncount+'</span>';
	      $('#ToogleDiv').html(htmls);
	  }
	  //addProductCartOrWishlist('fa-check','Hey','You have got a new Notification.','info');

    var err = eval("(" + da + ")");
    if(err.userDetails.uid != UserId){
     notifyMe(err.timeline,err.userDetails.first_name,err.message,err.userDetails.picture);
    }

  });



 </script>
</head>
<body >
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
@php
    if(Auth::user()->hasRole('Knitter')){
        $role = 'knitter';
    }else if(Auth::user()->hasRole('Designer')){
        $role = 'Designer';
    }else{
        $role = '';
    }
@endphp
<a href="{{url($role.'/dashboard')}}">
<img class="img-fluid theme-logo" src="{{ asset('resources/assets/files/assets/images/logoNew.png') }}" alt="Theme-Logo" />
</a>
<a class="mobile-options waves-effect waves-light">
<i class="feather icon-more-horizontal"></i>
</a>
</div>
<div class="navbar-container container-fluid">
<ul class="nav-right">
<li>
<a href="{{url('connect')}}" class="waves-effect waves-light {{Request::is('connect') ? 'active' : '' }}">Connect</a>
</li>
<li>
<a href="{{url('connect/my-connections')}}" class="waves-effect waves-light {{Request::is('connect/my-connections') ? 'active' : '' }}">
My connections
</a>
</li>
<li>
<a href="{{url('connect/find-connections')}}" class="waves-effect waves-light {{Request::is('connect/find-connections') ? 'active' : '' }}">
Find connections
</a>
</li>

<li>
<a href="{{url('connect/gallery')}}" class="waves-effect waves-light">
Photos
</a>
</li>


<li class="header-notification toggle-menu">
<div class="dropdown-primary dropdown">
<div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-navicon"></i>
</div>
</div>
</li>


<li class="header-notification"  onclick="markAsRead({{count(Auth::user()->unreadNotifications)}});">
<div class="dropdown-primary dropdown">
<div class="dropdown-toggle" id="ToogleDiv" data-toggle="dropdown">
<i class="feather icon-bell"></i>
@if(count(Auth::user()->unreadNotifications) > 0)
<span class="badge bg-c-red" id="NotificationCount">{{count(Auth::user()->unreadNotifications)}}</span>
@endif
</div>
<ul id="show-notification" class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="max-height: 400px;overflow-y: scroll;">

  </ul>
</div>
</li>

@php 
if(Auth::user()->picture){
  $pic = Auth::user()->picture;
}else{
  $pic = 'https://via.placeholder.com/150?text='.Auth::user()->first_name;
}
@endphp

<li class="user-profile header-notification">
<div class="dropdown-primary dropdown">
<div class="dropdown-toggle" data-toggle="dropdown">
<img src="{{ $pic }}" class="img-radius" alt="User-Profile-Image">
<span>{{ucfirst(Auth::user()->first_name)}}</span>
<i class="feather icon-chevron-down"></i>
</div>
<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
<!-- <li>
<a href="#!">
<i class="feather icon-settings"></i> Settings

</a>
</li>
<li>
<a href="email-inbox.html">
<i class="feather icon-mail"></i> My Messages

</a>
</li>-->
<li>
<a href="{{url('connect/myprofile')}}">
<i class="feather icon-user"></i> <span>My profile</span>
</a>
</li>
<li>
<a data-toggle="modal" data-target="#myProfileModal">
<i class="ti-user"></i> Update profile picture
</a>
</li>
<li>
<a href="{{url('change-password')}}">
<i class="feather icon-settings"></i> Reset passowrd
</a>
</li>
<!-- <li>
<a href="#">
<i class="feather icon-user"></i> <span>Privacy</span>
</a>
</li> -->
<li>
<a href="{{url('logout')}}">
<i class="feather icon-log-out"></i> Logout
</a>
</li>
</ul>
</div>
</li>
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

@yield('content')
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
<figure class="no-bg">
<a href="{{url('knitter/project-library')}}" class="m-l-10"> <img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Projects.png') }}" /></a>
<figcaption class="text-muted text-center">Project Library</figcaption>
</figure>
</div>
<div class="col-lg-6 col-6">
<a href="{{url('shop-patterns')}}">
<figure class="no-bg"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Shop-Design.png') }}" /></a>
<figcaption class="text-muted text-center">Shop</figcaption>
</figure>
</div>
</div>
<div class="row right-menubar">
<div class="col-lg-6 col-6">
<figure class="no-bg">
<a href="{{url('connect')}}"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Timeline.png') }}" /></a>
<figcaption class="text-muted text-center">Connect</figcaption>
</figure>
</div>
<div class="col-lg-6 col-6">
<a href="{{url('knitter/measurements')}}">
<figure class="no-bg"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Measurement.png') }}" /></a>
<figcaption class="text-muted text-center ">Measurement</figcaption>
</figure>
</div>
</div>
<div class="row right-menubar">
<div class="col-lg-6 col-6">
<a href="{{url('connect/my-connections')}}">
<figure class="no-bg"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Friends.png') }}" /></a>
<figcaption class="text-muted text-center">Friends</figcaption>
</figure>
</div>
<!-- <li><a href="#"><img class="icon-img" src="../files/assets/icon/custom-icon/Library.png" /></a><div class="text-muted text-center">Library</div></li> -->
<div class="col-lg-6 col-6">
<a href="{{url('connect/profile')}}">
<figure class="no-bg"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/My-Profile.png') }}" /></a>
<figcaption class="text-muted text-center ">My Profile</figcaption>
</figure>
</div>
</div>
<div class="row right-menubar">
<div class="col-lg-6 col-6">
<a href="{{url('knitter/todo')}}">
<figure class="no-bg"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/To-do.png') }}" /></a>
<figcaption class="text-muted text-center ">To-Do</figcaption>
</figure>
</div>
<!-- <li><a href="#"> <img class="icon-img" src="../files/assets/icon/custom-icon/My-Order.png" /></a><div class="text-muted text-center ">My Order</div></li> -->
<!-- <li><a href="#"> <img class="icon-img" src="../files/assets/icon/custom-icon/Shop-Design.png" /></a><div class="text-muted text-center ">Sample</div></li> -->
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
<!-- Modal fro profile update-->
<div class="modal fade" id="myProfileModal" role="dialog">
<div class="modal-dialog modal-sm">
<div class="modal-content">
  <form id="uploadPicture" enctype="multipart/form-data">
<div class="modal-header">
<h6 class="modal-title">Change profile image</h6>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body text-center m-t-15">
<div class="">
<!-- <p class="f-16">Change your profile image instantly</p> -->
<a href="#" class="profile-image">
<img class="" id="profile-img" src="{{ $pic }}" alt="user-img">
</a>
<span class="profile-upload">
<label for="profile-upload">
<img src="{{ asset('resources/assets/files/assets/images/pencil.png') }}">
</label>
<input id="file" name="file" type="file"  style="position: absolute;
    left: 0px;
    width: 25px;
    opacity: 0;top:0px;cursor: pointer;display: block;">
</span>
</form>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn theme-outline-btn" data-dismiss="modal">Cancel</button>
<input type="submit" class="btn theme-btn" id="updateBth" value="Update">
</div>

</div>
</div>
</div>

</body>

<style type="text/css">
	/* sweet alert customizes css */
  .swal2-icon.swal2-success [class^=swal2-success-line]{
	  background-color: #0d665c !important;
  }
  .swal2-icon.swal2-success .swal2-success-ring{
	  border:.25em solid rgb(13, 102, 92)
  }
  .swal2-styled.swal2-confirm {

    background-color: #0d665c !important;
    color: #fff !important;
    border: 1px solid #0d665c !important;
  }
  .swal2-icon.swal2-error [class^=swal2-x-mark-line]{
	  background-color: #bc7c8f !important;
  }
  .swal2-icon.swal2-error {
    border-color: #bc7c8f !important;
    color: #bc7c8f !important;
}
.swal2-styled.swal2-cancel {
    background-color: #bc7c8f !important;
}
.swal2-icon.swal2-warning {
    border-color: #bc7c8f !important;
    color: #bc7c8f !important;
}
.alert-success {
    background-color: #fff;
    border-color: #0d665c;
    color: #0d665c;
}
.alert-danger {
    background-color: #fff;
    border-color: #bc7c8f;
    color: #bc7c8f;
}
.header-navbar .navbar-wrapper .navbar-container .badge{
    width:auto !important;
}
</style>
<!-- Required Jquery -->

<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- waves js -->
<script src="{{ asset('resources/assets/files/assets/pages/waves/js/waves.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/modernizr/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/modernizr/js/css-scrollbars.js') }}"></script>

<!-- Bootstrap Notification js-->
<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/bootstrap-notify.min.js') }}"></script>

<!-- Bootstrap Notification js-->
<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/bootstrap-notify.min.js') }}"></script>

<script src="{{ asset('resources/assets/files/assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('resources/assets/files/assets/js/vertical/vertical-layout.min.js') }}"></script>
<script src="{{ asset('resources/assets/files/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/assets/js/script.js') }}"></script>
<script src="{{ asset('resources/assets/marketplace/src/images-grid-custom.js') }}"></script>

<script type="text/javascript" src="{{asset('node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>

<script>
function notifyMe(timeline,name,body,picture) {
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
  }

  // Let's check if the user is okay to get some notification
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
  var options = {
        body: body,
        icon: picture,
        dir : "ltr"
    };
  var notification = new Notification(name,options);
  }

  // Otherwise, we need to ask the user for permission
  // Note, Chrome does not implement the permission static property
  // So we have to check for NOT 'denied' instead of 'default'
  else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
      // Whatever the user answers, we make sure we store the information
      if (!('permission' in Notification)) {
        Notification.permission = permission;
      }

      // If the user is okay, let's create a notification
      if (permission === "granted") {
        var options = {
              body: body,
              icon: picture,
              dir : "ltr"
          };
        var notification = new Notification(name,options);
      }
    });
  }

  // At last, if the user already denied any notification, and you
  // want to be respectful there is no need to bother them any more.
}
</script>

<script>

$(function() {
getAllNotifications();

/*
setTimeout(function(){
  checkNotifications();
},1000);
*/

$("#uploadPicture").on('submit',(function(e) {
  alert()
    e.preventDefault();
    $.ajax({
      url: "{{url('connect/profile-picture')}}",
      type: "POST",
      data:  new FormData(this),
      beforeSend: function(){
        //$("#body-overlay").show();
      },
      contentType: false,
      processData:false,
      success: function(data)
        {
      alert(data);
      },
        error: function() 
        {
        }           
     });
  }));

});

function getAllNotifications(){
  $.get('{{url("showAllNotifications")}}',function(res){
   $("#show-notification").html(res);
  });
  
}

function checkNotifications(){
  var count = $("#NotificationCount").html()
  if(count > 0){
    notifyMe('','Hi {{ucfirst(Auth::user()->first_name)}}','Some Notifications waiting for you.',"{{ asset('resources/assets/files/assets/images/logoNew.png') }}");
  }
}

function markAsRead(data){
var length = $("#show-notification li").length;
if(length > 1){
  if(data > 0){
      $.get('{{url("connect/markAsRead")}}');
      $("#NotificationCount").remove();
    }
}else{
  getAllNotifications();
}
}

function readprofileURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile-img')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}


function addProductCartOrWishlist(icon,status,msg,info){
        $.notify({
            icon: 'fa '+icon,
            title: status+'!',
            message: msg
        },{
            element: 'body',
            position: null,
            type: type,
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
@yield('footerscript')
</html>

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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    
    <link rel="icon" href="{{ asset('resources/assets/files/assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/bower_components/bootstrap/css/bootstrap.min.css')}}">
    <!-- waves')}} -->
    <link rel="stylesheet" href="{{ asset('resources/assets/files/assets/pages/waves/css/waves.min.css')}}" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/feather/css/feather.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/icofont/css/icofont.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/font-awesome/css/font-awesome.min.css')}}">
     <!-- <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/icon/simple-line-icons/css/simple-line-icons.css')}}"> -->
    <!-- Style')}} -->
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/css/pages.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}">

    <script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery/js/jquery.min.js')}}"></script>


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
<style>
    [type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
    border: 2px solid #0f3833;
    padding: 8px;
    border-radius: 6px;
}
</style>
</head>

<body>

    <div class="loading">
  <div class="loader"></div>
</div>
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
                        <img class="img-fluid theme-logo" src="{{ asset('resources/assets/files/assets/images/logoNew.png')}}" alt="Theme-Logo" />
                    </a>
                    <a class="mobile-options waves-effect waves-light">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <!-- <ul class="nav-left">
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                        <span class="input-group-prepend search-close">
										<i class="feather icon-x input-group-text"></i>
									</span>
                                    <input type="text" class="form-control" placeholder="Enter Keyword">
                                    <span class="input-group-append search-btn">
										<i class="feather icon-search input-group-text"></i>
									</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                <i class="full-screen feather icon-maximize"></i>
                            </a>
                        </li>
                    </ul> -->

                    <ul class="nav-right">
                            <li class="header-notification toggle-menu">
                                    <div class="dropdown-primary dropdown">
                                        <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                                <i class="fa fa-navicon"></i>
                                        </div>
                                    </div>
                                </li>
                       <!-- <li>
                            <div class="text-center">
                                <a href="url('subscription')}}" class="btn btn-primary">Subscribe</a>
                            </div>
                        </li> -->
                        <li>
                            <a href="{{url('knitter/subscription')}}" class="waves-effect waves-light">
                               Subscription
                            </a>
                        </li>
                        
<li class="header-notification"  onclick="markAsRead({{count(Auth::user()->unreadNotifications)}});">
<div class="dropdown-primary dropdown">
<div class="dropdown-toggle" data-toggle="dropdown">
<i class="feather icon-bell"></i>
@if(count(Auth::user()->unreadNotifications) > 0)
<span class="badge bg-c-red">{{count(Auth::user()->unreadNotifications)}}</span>
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
                                    <span>{{Auth::user()->first_name}}</span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <!-- <li>
                                        <a href="#!">
                                            <i class="feather icon-settings"></i> Settings

                                        </a>
                                    </li>
                                    <li>
                                        <a href="user-profile.html">
                                            <i class="feather icon-user"></i> Profile

                                        </a>
                                    </li>
                                    <li>
                                        <a href="email-inbox.html">
                                            <i class="feather icon-mail"></i> My Messages

                                        </a>
                                    </li>
                                    <li>
                                        <a href="auth-lock-screen.html">
                                            <i class="feather icon-lock"></i> Lock Screen

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

       <div class="pcoded-main-container">
       @yield('content')
       
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
                            <div class="col-lg-6 col-6"><figure class="no-bg"><a href="{{url('knitter/project-library')}}" class="m-l-10"> <img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Projects.png')}}" /></a><figcaption class="text-muted text-center">Project Library</figcaption></figure></div>
                            <div class="col-lg-6 col-6"> <a href="{{url('shop-patterns')}}">
                                <figure class="no-bg">
                                    <img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Shop-Design.png')}}" /></a>
                                    <figcaption class="text-muted text-center">Shop</figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="row right-menubar">
                                <div class="col-lg-6 col-6"> 
                            <figure class="no-bg">
                                    <a href="{{url('connect')}}"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Timeline.png')}}" /></a>
                                    <figcaption class="text-muted text-center">Connect</figcaption>
                            </figure></div>
                                <div class="col-lg-6 col-6"> <a href="{{url('knitter/measurements')}}"><figure  class="no-bg"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Measurement.png')}}" /></a><figcaption class="text-muted text-center ">Measurement</figcaption></figure></div>
                        </div>
                        <div class="row right-menubar">
                                <div class="col-lg-6 col-6"> <a href="#"> <figure class="no-bg"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/Friends.png')}}" /></a><figcaption class="text-muted text-center">Friends</figcaption></figure></div>
                                
                                <div class="col-lg-6 col-6"> <a href="#"><figure class="no-bg"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/My-Profile.png')}}" /></a><figcaption class="text-muted text-center ">My Profile</figcaption></figure></div>
                        </div>
                        <div class="row right-menubar">
                                <div class="col-lg-6 col-6"> <a href="#"> <figure class="no-bg"><img class="icon-img" src="{{ asset('resources/assets/files/assets/icon/custom-icon/To-do.png')}}" /></a><figcaption class="text-muted text-center ">To-Do</figcaption></figure></div>
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

 <style type="text/css">
   .loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #bc7c8f;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  position: fixed;
    margin: auto;
    top: 150px !important;
    webkit-transform: none !important;
    transform: none !important;
    left: 0px !important;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.loading{
    display: none;
      background: #00000085;
    position: fixed;
    width: 100%;
    height: 100%;
    z-index: 10000;
    padding: 0px;
  
}
.header-navbar .navbar-wrapper .navbar-container .badge{
    width:auto !important;
}
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
 </style> 
 <script type="text/javascript">
     var URL = "{{url('/')}}";
     var PAGE = '';
 </script>
<!-- Required Jquery -->

<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/popper.js/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- waves js -->
<script src="{{ asset('resources/assets/files/assets/pages/waves/js/waves.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/modernizr/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/modernizr/js/css-scrollbars.js')}}"></script>

<script src="{{ asset('resources/assets/files/assets/js/pcoded.min.js')}}"></script>
<script src="{{ asset('resources/assets/files/assets/js/vertical/vertical-layout.min.js')}}"></script>
<script src="{{ asset('resources/assets/files/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<script type="text/javascript" src="{{asset('node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>


<!-- Bootstrap Notification js-->
<link rel="stylesheet" type="text/css" href="{{asset('resources/assets/select2/animate.css')}}">
<script type="text/javascript" src="{{asset('resources/assets/assets/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

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

<style type="text/css">
    [data-notify="progressbar"] {
    margin-bottom: 0px;
    position: absolute;
    bottom: 0px;
    left: 0px;
    width: 100%;
    height: 5px;
}

.red{
color: #bc7c8f;
font-weight:bold;
font-size: 12px;
}
</style>

<script type="text/javascript">
    $(function(){
        getAllNotifications();
    });


function getAllNotifications(){
  $.get('{{url("showAllNotifications")}}',function(res){
    $("#show-notification").html(res);
  });
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
</script>
@yield('footerscript')


</body>

</html>

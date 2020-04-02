@extends('layouts.connect')
@section('title','user Profile')
@section('content')
@php 
if($user->picture){
	$picture = $user->picture;
}else{
	$picture = 'https://via.placeholder.com/150?text='.$user->first_name;;
}
@endphp
<div class="page-body m-t-15 m-r-40">
<div class="row users-card">
<div class="col-lg-3 col-xl-3 col-md-6">
<div class="rounded-card user-card">
<div class="card">
<div class="img-hover">
<img class="img-fluid img-radius" src="{{ $picture }}" alt="round-img">
<div class="img-overlay img-radius">
<span>
<a href="#" class="btn btn-sm btn-primary" data-popup="lightbox"><i class="fa fa-eye"></i></a>
<a href="" class="btn btn-sm btn-primary"><i class="fa fa-user-plus"></i></a>
</span>
</div>
</div>
<div class="user-content">
<h4 class=""> {{ $user->first_name }} {{ $user->last_name }}</h4>
<p class="m-b-0 text-muted m-b-10">Knitter</p>
</div>
</div>
</div>
</div>

<div class="col-lg-9 col-xl-9 col-md-6">
<div class="card">
<!-- Nav tabs -->
<ul class="nav nav-tabs md-tabs" role="tablist">
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#feed" role="tab" aria-selected="false">Studio</a>
<div class="slide"></div>
</li>
<li class="nav-item">
<a class="nav-link active show" data-toggle="tab" href="#about" role="tab" aria-selected="false">About</a>
<div class="slide"></div>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#profile3" role="tab" aria-selected="false">Skill set</a>
<div class="slide"></div>
</li>
<li class="nav-item">
<a class="nav-link " data-toggle="tab" href="#interest" role="tab" aria-selected="false">Interest</a>
<div class="slide"></div>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#settings3" role="tab" aria-selected="true">Contact details</a>
<div class="slide"></div>
</li>

</ul>
<!-- Tab panes -->
<div class="tab-content card-block">

<div class="tab-pane" id="feed" role="tabpanel">
<div class="p-relative">

<div class="card-block">

@if($timeline_images->count() > 0)
<div class="fbphotobox m-10 text-center">

@foreach($timeline_images as $ti)

<a class="hide">
	<img class="photo"  fbphotobox-src="{{ $ti->image_path }}" alt="" src="{{ $ti->image_path }}"/>
</a>

@endforeach

<div style="color: #bbd6bb;font-size: 16px;text-decoration: underline;"><a href="javascript:;" id="show-more">Show more</a></div>
</div>
@else
<p>No images to show.</p>
@endif
</div>
</div>

</div>


<div class="tab-pane active show" id="about" role="tabpanel">
<div class="m-0" id="view-about">
<p class="f-14 m-t-5" id="aboutmeContent">
    {{ $user->profile->aboutme ? $user->profile->aboutme : 'No content to display.' }}
</p>
</div>

</div>
<div class="tab-pane" id="profile3" role="tabpanel">
<div class="row">
<div class="col-lg-12 col-xl-12">
<!--New Accordion-->

<div class="collapse show" id="skills">
<div class="list-group-item">
<div class="view-info2">
<div class="row">
<div class="col-lg-12">
<div class="general-info">
<div class="row">
<div class="col-lg-12 col-xl-12" id="skillSet">
  

  @if($user->profile->professional_skills)
<?php 
$exp = explode(',', $user->profile->professional_skills);
?>
 <ul class="skills-list">
            @for($i=0;$i<count($exp);$i++)
                <li>
                    <img class="checked-img" src="{{ asset('resources/assets/files/assets/icon/custom/'.$exp[$i].'.png') }}" />
                        <div class="text-center">{{$exp[$i]}}</div>
                    </li>
            @endfor
            </ul>
@else
<p>Nothing to display.</p>
@endif
            <p></p>
            <hr>
            <h5 class="m-l-30 m-b-20">As a Knitter I am </h5>
            <div class="form-radio m-l-30">
                @if($user->profile->as_a_knitter_i_am)
                <ul>
                    <li><i class="fa fa-check m-r-10"></i>{{$user->profile->as_a_knitter_i_am}}</li>
                </ul>
                @else
                <p>Nothing to display.</p>
                @endif
                </div>
                <p></p>
                <hr>
                <h5 class="m-l-30 m-b-20">Your Rating</h5>
                <div class="m-l-30">
                <div class="stars-example-css review-star">
                        
    <?php $rating = $user->profile->rate_yourself; ?>
    @if($rating)
    <label for="checkbox3">Knitting Skills</label>&nbsp;&nbsp;
                        <?php
                        for($x=1;$x<=$rating;$x++) {
                            echo '<i class="fa fa-star" aria-hidden="true"></i> &nbsp;';
                        }
                        
                        while ($x<=5) {
                            echo '<i class="fa fa-star-o" aria-hidden="true"></i> &nbsp;';
                            $x++;
                        }
                    ?>
        <label for="checkbox3">&nbsp; (1- Beginner , 2- Advance beginner, 3- Experienced, 4- Very experienced, 5-Expert )</label>
    @else
    <p>Nothing to display.</p>
    @endif
                </div>
                </div>
                <p></p>
                <hr>  

</div>
</div>

    </div>
</div>
<!-- end of table col-lg-6 -->
</div>
<!-- end of row -->
</div>
<!-- end of general info -->
</div>
<!-- end of col-lg-12 -->

<!-- end of row -->

</div>


<!--New Accordion-->
</div>
</div>
</div>

<div class="tab-pane " id="interest" role="tabpanel">
<div id="view-interest">

<h5 class="m-l-30 m-b-20 m-t-10">I Knit for </h5>
<div class="m-l-30">
	@if($user->profile->i_knit_for)
<ul>
<?php 
$i_knit_for = explode(',', $user->profile->i_knit_for);
?>
@for($i=0;$i<count($i_knit_for);$i++)
<li style="display: list-item;color: #0d665b;"><i class="fa fa-check m-r-10"></i>{{$i_knit_for[$i]}}</li>
@endfor
</ul>
@else
<p>Nothing to display.</p>
@endif
</div>
<br>
<h5 class="m-l-30 m-b-20">I am here for </h5>
<div class="m-l-30">
	@if($user->profile->i_am_here_for)
<ul>
<?php 
$i_am_here_for = explode(',',$user->profile->i_am_here_for);
?>
@for($j=0;$j<count($i_am_here_for);$j++)
    <li style="display: list-item;color: #0d665b;"><i class="fa fa-check m-r-10"></i> {{$i_am_here_for[$j]}}</li>
@endfor
</ul>
@else
<p>Nothing to display.</p>
@endif
</div>

</div>   

</div>
<div class="tab-pane" id="settings3" role="tabpanel">
<!--profile cover end-->
<div class="row">
<div class="col-lg-12">
<div class="list-group panel">
<!--New Accordion-->

<div class="collapse show">
<div class="list-group-item">
<div class="col-lg-12 Profession">
<div class="view-info">
<div class="row">
<div class="col-lg-12">
<div class="general-info" id="view-details">

<div class="row">
<div class="col-lg-12 col-xl-6">
        <div class="table-responsive">
            <table class="table m-0">
                <tbody>
                    <tr>
                        <th scope="row">First name</th>
                        <td>{{$user->first_name}}</td>
                        <!-- <td><i class="fa fa-eye"></i></td> -->
                    </tr>
                  
                    <tr>
                        <th scope="row">Contact number</th>
                        <td>
                        	@component('connect.profile.mobile_privacy',['user' => $user]) @endcomponent
                        </td>
                        <!-- <td><i class="fa fa-eye-slash"></i></td> -->
                    </tr>
                    <tr>
                        <th scope="row">Postal address</th>
                        <td>@component('connect.profile.address_privacy',['user' => $user]) @endcomponent</td>
                        <!-- <td><i class="fa fa-eye-slash"></i></td> -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end of table col-lg-6 -->
    <div class="col-lg-12 col-xl-6">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Last name</th>
                        <td>{{$user->last_name ? $user->last_name : 'NA' }}</td>
                        <!-- <td><i class="fa fa-eye-slash"></i></td> -->
                    </tr>
                    <tr>
                        <th scope="row">E-mail</th>
                        <td>@component('connect.profile.email_privacy',['user' => $user]) @endcomponent</td>
                        <!-- <td><i class="fa fa-eye-slash"></i></td> -->
                    </tr>
                    <tr>
                        <th scope="row">website</th>
                        <td><a target="_blank" href="{{$user->profile->website}}">{{$user->profile->website ? $user->profile->website : 'NA' }}</a></td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


<!-- end of general info -->
</div>
<!-- end of col-lg-12 -->
</div>
<!-- end of row -->
</div>
<!-- end of view-info -->

</div>
</div>
</div>

</div>

</div>
</div>
<!-- Page-body end -->
</div>

</div>
</div>
</div>
</div>                                       
</div>
@endsection
@section('footerscript')
<style>
	.hide{
		display: none;
	}
	.fa-star{
       color: #0d665c !important
    }
    #view-about-btn{position: absolute;
    float: right;
    right: -6px;
    top: 39px;}
ul {
  list-style-type: none;
}

li {
  display: inline-block;
}

input[type="checkbox"][id^="cb"] {
  display: none;
}

.checked-edit-list label {
  border: 1px solid #fff;
  padding: 10px;
  display: block;
  position: relative;
  margin: 10px;
  cursor: pointer;
}

.checked-edit-list label:before {
  background-color: white;
  color: white;
  content: " ";
  display: block;
  border-radius: 50%;
  border: 1px solid transparent;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 28px;
  transition-duration: 0.4s;
  transform: scale(0);
}

.checked-edit-list label img {
  height: 100px;
  width: 100px;
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
  filter:grayscale(100%);
}
:checked + label {
  border-color: #ddd;
}

:checked + label:before {
  content: "✓";
  background-color:transparent;;
  transform: scale(1);
}
.list-group-item{
background-color: transparent;
    border: unset;}

:checked + label img {
  transform: scale(0.9);
  box-shadow: 0 0 5px #333;
  z-index: -1;
  filter: grayscale(0%);
}
#edit-btn, #edit-btn1 {
    background-color: transparent;
    border: 1px solid transparent;
}
.nav-tabs .slide {
    background: #0d665c;
}
.btn-sm {
    padding: 0px 0px;
    line-height: 10px;
    font-size: 11px;
}
.ekko-lightbox-nav-overlay a span{color: #0d665c;}
/* #edit-btn,#edit-btn1{position: absolute;top: 9px;right: 55px;z-index: 999;} */
.fa-pencil{padding:4px 6px;color: #0d665b;font-size: 16px;background-color: transparent;}
.fa-gear{color: #0d665b;cursor: pointer;}
.icofont-close{font-size: 16px!important;padding-top: 10px!important;right: 55px!important;}
#first-card .list-group-item,#second-card .list-group-item{border-bottom:1px solid #0d665b!important;}
.btn:focus, .btn.focus {
    outline: 0;
    box-shadow: none;
}
button, html [type="button"], [type="reset"], [type="submit"]{background-color: transparent;}
#privacy{border: 1px solid #0d665b;padding: 0px;border-radius: 2px;color: #0d665b;}
.fbphotobox-container-left{margin-left: -4px;}
    .fbphotobox-main-container{padding-top: 25px;}
    .fbphotobox-image-content{padding:20px}
    .fbphotobox-container-right{overflow-y: scroll;}
    .fbphotobox img {
        width:200px;
        height:200px;
        margin:2px;
        border-radius:5px;
    }
    
    .fbphotobox img:hover {
        box-sizing:border-box;
          -moz-box-sizing:border-box;
          -webkit-box-sizing:border-box;
        border: 5px solid #0d665b;
    }
</style>
<script type="text/javascript">
	var CLOSE = '{{asset('resources/assets/marketplace/images/close.png')}}';
</script>

<link href="{{ asset('resources/assets/marketplace/css/fbphotobox.css') }}" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/ekko-lightbox/js/ekko-lightbox.js') }}"></script>
<script src="{{ asset('resources/assets/marketplace/js/fbphotobox.js') }}"></script>

<script type="text/javascript">

	$(document).ready(function() {


            $(".fbphotobox img").fbPhotoBox({
                rightWidth: 360,
                leftBgColor: "black",
                rightBgColor: "white",
                footerBgColor: "black",
                overlayBgColor: "#222",
                containerClassName: 'fbphotobox',
                imageClassName: 'photo',
                onImageShow: function() {
                    $(".fbphotobox img").fbPhotoBox("addTags",
                            [{x:0.3,y:0.3,w:0.3,h:0.3}]
                    );
                    $(".fbphotobox-image-content").html('<div class="card-block b-b-theme b-t-theme social-msg"> <a href="#"> <i class="icofont icofont-heart-alt text-muted"> </i> <span class="b-r-theme">Like (20)</span> </a> <a href="#"> <i class="icofont icofont-comment text-muted"> </i> <span class="b-r-theme">Comments (25)</span> </a> </div><div class="card-block user-box"> <div class="p-b-20 m-t-15"> <span class="f-14"><a href="#">Comments (110)</a> </span> <span class="float-right"><a href="#!">See all comments</a></span><hr> </div><div class="media"> <a class="media-left p-r-0" href="#"> <img class="media-object img-radius m-r-20" src="../files/assets/images/avatar-1.jpg" alt="Generic placeholder image"> </a> <div class="media-body b-b-theme social-client-description"> <div class="chat-header">About Marta Williams<span class="text-muted">Jane 04, 2015</span></div><p class="text-muted">Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></div></div><div class="media"> <a class="media-left p-r-0" href="#"> <img class="media-object img-radius m-r-20" src="../files/assets/images/avatar-2.jpg" alt="Generic placeholder image"> </a> <div class="media-body b-b-theme social-client-description"> <div class="chat-header">About Marta Williams<span class="text-muted">Jane 10, 2015</span></div><p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></div></div><div class="media"> <a class="media-left p-r-0" href="#"> <img class="media-object img-radius m-r-20" src="../files/assets/images/avatar-1.jpg" alt="Generic placeholder image"> </a> <div class="media-body"> <form class="form-material right-icon-control"> <div class="form-group form-default"> <textarea class="form-control" required=""></textarea> <span class="form-bar"></span> <label class="float-label">Write something...</label> </div><div class="form-icon "> <button class="btn theme-outline-btn btn-icon waves-effect waves-light"> <i class="fa fa-paper-plane "></i> </button> </div></form> </div></div></div><p><br></p>');
                }
            });

var x = 3;
var totalImages = $(".fbphotobox a").length;
//$(".fbphotobox img").hide();

$(".fbphotobox a:lt("+x+")").removeClass('hide');

$(document).on('click','#show-more',function(){
	var hidden = $(".fbphotobox a.hide").length;
	if(x < hidden){
		x = 3;
	}else{
		x = hidden;
	}
	$(".fbphotobox a.hide:lt("+x+")").removeClass('hide');
  setTimeout(function(){
    var hiddennew = $(".fbphotobox a.hide").length;
    if(hiddennew == 0){
      $("#show-more").addClass('hide');
    }
  },2000);
});



        });
</script>
@endsection
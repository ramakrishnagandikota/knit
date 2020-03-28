@extends('layouts.connect')
@section('title','My Profile')
@section('content')
<!-- Page-body start -->
<div class="page-body m-t-15 m-r-40">
<div class="row users-card">
<div class="col-lg-3 col-xl-3 col-md-6">
<div class="rounded-card user-card">
<div class="card">
<div class="img-hover">
<img class="img-fluid img-radius" src="{{ asset('resources/assets/files/assets/images/user-card/user17.jpg') }}" alt="round-img">
<div class="img-overlay img-radius">
<span>
<a href="#" class="btn btn-sm btn-primary" data-popup="lightbox"><i class="fa fa-eye"></i></a>
<a href="" class="btn btn-sm btn-primary"><i class="fa fa-user-plus"></i></a>
</span>
</div>
</div>
<div class="user-content">
<h4 class="">Barbara Davis</h4>
<p class="m-b-0 text-muted m-b-10">Technical designer</p>
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
<div class="fbphotobox m-10 text-center">
<a><img class="photo" fbphotobox-src="{{ asset('resources/assets/marketplace/images/1.jpg') }}" alt="Dummmy Image<br>Very Coool!" src="{{ asset('resources/assets/marketplace/images/1.jpg') }}"/></a>
<a><img class="photo" fbphotobox-src="{{ asset('resources/assets/marketplace/images/2.jpg') }}" src="{{ asset('resources/assets/marketplace/images/2.jpg') }}"/></a>
<a><img class="photo" fbphotobox-src="{{ asset('resources/assets/marketplace/images/3.jpg') }}" src="{{ asset('resources/assets/marketplace/images/3.jpg') }}"/></a>
<div style="color: #bbd6bb;font-size: 16px;text-decoration: underline;"><a href="">Show more</a></div>
</div>

</div>
</div>

</div>


<div class="tab-pane active show" id="about" role="tabpanel">
<div class="m-0" id="view-about">
<button id="view-about-btn" type="button" class="btn btn-sm waves-effect waves-light">
<i class="fa fa-pencil"></i>
</button>
<p class="f-14 m-t-5" id="aboutmeContent">{{Auth::user()->profile->aboutme ? Auth::user()->profile->aboutme : 'Tell me about your self.' }}</p>
</div>

<div class="m-0" id="edit-about">
<p class="text-right">
<button id="" type="button" class="btn btn-sm waves-effect waves-light edit-about-btn">
<i class="icofont icofont-close"></i>
</button>
</p>
<form id="aboutme">
    <p><textarea name="aboutme" id="abtme" rows="4" cols="1" style="width: 100%;">{{Auth::user()->profile->aboutme}}</textarea></p>
</form>

<div class="text-center">
<a href="javascript:;" id="saveAbout" class="btn btn-primary waves-effect waves-light theme-btn">Save</a>
<a href="javascript:;" id="" class="btn btn-default waves-effect edit-about-btn">Cancel</a>
</div>

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

<!-- end of view-info --
<div class="edit-info2 hide">
<div class="row">
<div class="col-lg-12">


<!-- end of row --
</div>
<!-- end of edit-info --
</div>
<!-- end of card-block --
</div>
-->
</div>


<!--New Accordion-->
</div>
</div>
</div>

<div class="tab-pane " id="interest" role="tabpanel">
<div id="view-interest">
<p class="text-right m-b-0"><button id="view-interest-btn" type="button" class="btn btn-sm waves-effect waves-light">
<i class="fa fa-pencil"></i>
</button></p>
<h5 class="m-l-30 m-b-20 m-t-10">I Knit for </h5>
<div class="m-l-30">
<ul>
<li style="display: list-item;color: #0d665b;"><i class="fa fa-check m-r-10"></i>Myself</li>
<li style="display: list-item;color: #0d665b;"><i class="fa fa-check m-r-10"></i>Charity</li>
<li style="display: list-item;color: #0d665b;"><i class="fa fa-check m-r-10"></i>Family</li>
</ul>
</div>
<br>
<h5 class="m-l-30 m-b-20">I am here for </h5>
<div class="m-l-30">
<ul>
    <li style="display: list-item;color: #0d665b;"><i class="fa fa-check m-r-10"></i>Knitting</li>
    <li style="display: list-item;color: #0d665b;"><i class="fa fa-check m-r-10"></i>Learning</li>
    <li style="display: list-item;color: #0d665b;"><i class="fa fa-check m-r-10"></i>Casual Friends</li>
</ul>
</div>
</div>   
<div id="edit-interest">
<p class="text-right"><button id="edit-interest-btn" type="button" class="btn btn-sm waves-effect waves-light">
<i class="icofont icofont-close"></i>
</button></p>
<h5 class="m-l-30 m-b-20 m-t-10">I Knit for </h5>
<div class="m-l-30">
    <div class="checkbox-color checkbox-default">
            <input id="checkbox21" type="checkbox" checked="">
            <label for="checkbox21">
                Myself
            </label>
        </div>
        <div class="checkbox-color checkbox-default">
            <input id="checkbox22" type="checkbox" checked="">
            <label for="checkbox22">
                Charity
            </label>
        </div>
        <div class="checkbox-color checkbox-default">
            <input id="checkbox23" type="checkbox" checked="">
            <label for="checkbox23">
                Family
            </label>
        </div>
</div>
<br>
<h5 class="m-l-30 m-b-20">I am here for </h5>
<div class="m-l-30">
        <div class="checkbox-color checkbox-default">
                <input id="checkbox24" type="checkbox" checked="">
                <label for="checkbox24">
                   Knitting 
                </label>
            </div>
            <div class="checkbox-color checkbox-default">
                    <input id="checkbox25" type="checkbox" checked="">
                    <label for="checkbox25">
                       Learning 
                    </label>
                </div>
                <div class="checkbox-color checkbox-default">
                        <input id="checkbox26" type="checkbox" checked="">
                        <label for="checkbox26">
                                Casual Friends 
                        </label>
                    </div>
</div>
</div>                                                                                
</div>
<div class="tab-pane" id="settings3" role="tabpanel">
<!--profile cover end-->
<div class="row">
<div class="col-lg-12">
<div class="list-group panel">
<!--New Accordion-->
<div class="row m-l-5 m-r-5" id="first-card">
<div class="col-lg-12 text-right">
<button id="edit-btn" type="button" class="btn btn-sm waves-effect waves-light">
<i class="fa fa-pencil"></i>
</button>
</div>
</div>
<div class="collapse show" id="Personal-info">
<div class="list-group-item">
<div class="col-lg-12 Profession">
<div class="view-info">
<div class="row">
<div class="col-lg-12">
<div class="general-info">
<div class="row">
    <div class="col-lg-12 col-xl-6">
        <div class="table-responsive">
            <table class="table m-0">
                <tbody>
                    <tr>
                        <th scope="row">Name</th>
                        <td>Barbara Devis</td>
                        <!-- <td><i class="fa fa-eye"></i></td> -->
                    </tr>
                  
                    <tr>
                        <th scope="row">Contact number</th>
                        <td>(01**) - 45*****</td>
                        <!-- <td><i class="fa fa-eye-slash"></i></td> -->
                    </tr>
                    <tr>
                        <th scope="row">Postal address</th>
                        <td>NA</td>
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
                        <th scope="row">E-mail</th>
                        <td>barbara@knitfitco.com</td>
                        <!-- <td><i class="fa fa-eye-slash"></i></td> -->
                    </tr>
                    <tr>
                        <th scope="row">website</th>
                        <td>www.knitfitco.com</td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
    <!-- end of table col-lg-6 -->
</div>
<!-- end of row -->
</div>
<!-- end of general info -->
</div>
<!-- end of col-lg-12 -->
</div>
<!-- end of row -->
</div>
<!-- end of view-info -->
<div class="edit-info">
<div class="row">
<div class="col-lg-12">
<div class="general-info form-material">
<div class="row">
    <div class="col-lg-6 ">
        <div class="material-group">
            <div class="material-addone">
                <i class="icofont icofont-user"></i>
            </div>
            <div class="form-group form-primary">
                <input type="text" name="footer-email" class="form-control" required="">
                <span class="form-bar"></span>
                <label class="float-label">Name</label>
                <span class="privacy" data-toggle="modal" data-target="#myModal"><i class="icofont icofont-settings-alt"></i></span>
            </div>
        </div>

        <div class="material-group">
            <div class="material-addone">
                    <i class="icofont icofont-mobile-phone"></i>
            </div>
            <div class="form-group form-primary">
                <input type="text" name="footer-email" class="form-control" required="">
                <span class="form-bar"></span>
                <label class="float-label">Contact Number</label>
                <span class="privacy" data-toggle="modal" data-target="#myModal"><i class="icofont icofont-settings-alt"></i></span>
            </div>
        </div>

        <div class="material-group">
            <div class="material-addone">
                <i class="icofont icofont-location-pin"></i>
            </div>
            <div class="form-group form-primary">
                <input type="text" name="footer-email" class="form-control" required="">
                <span class="form-bar"></span>
                <label class="float-label">Postal address</label>
                <span class="privacy" data-toggle="modal" data-target="#myModal"><i class="icofont icofont-settings-alt"></i></span>
            </div>
        </div>
</div>
<!-- end of table col-lg-6 -->
<div class="col-lg-6">

    <div class="material-group">
        <div class="material-addone">
                <i class="icofont icofont-ui-message" style="color:black"></i>
        </div>
        <div class="form-group form-primary">
            <input type="text" name="footer-email" class="form-control" required="">
            <span class="form-bar"></span>
            <label class="float-label">e-mail</label>
            <span class="privacy" data-toggle="modal" data-target="#myModal"><i class="icofont icofont-settings-alt"></i></span>
        </div>
    </div>
    <div class="material-group">
        <div class="material-addone">
                <i class="icofont icofont-globe"></i>
        </div>
        <div class="form-group form-primary">
            <input type="text" id="ontype-textbox" name="footer-email" class="form-control" required="">
            <span class="form-bar"></span>
            <label class="float-label">Website</label><div id="target"></div>
        </div>
    </div>

   
    <div class="material-group m-t-30">
      
</div>
<!-- end of table col-lg-6 -->
</div>
</div>
<!-- end of row -->
<div class="text-center">
<a href="#!" class="btn theme-btn btn-primary waves-effect waves-light m-r-20">Save</a>
<a href="#!" id="edit-cancel" class="btn btn-default waves-effect">Cancel</a>
</div>
</div>
<!-- end of edit info -->
</div>
<!-- end of col-lg-12 -->
</div>
<!-- end of row -->
</div>

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
    .fbphotobox-main-container{margin-top: 35px;}
    
</style>


 <!-- jquery file upload Frame work -->
<link href="{{ asset('resources/assets/files/assets/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('resources/assets/files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />

<link href="{{ asset('resources/assets/marketplace/css/fbphotobox.css') }}" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/ekko-lightbox/js/ekko-lightbox.js') }}"></script>

  <!-- jquery file upload js -->
    <script src="{{ asset('resources/assets/files/assets/pages/jquery.filer/js/jquery.filer.min.js') }}"></script>
    <script src="{{ asset('resources/assets/files/assets/pages/filer-modified/custom-filer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('resources/assets/files/assets/pages/filer-modified/jquery.fileuploads.init.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
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
        });

$("#edit-about,#edit-interest,#edit-portfolio").hide();
$("#view-about-btn").click(function()
{
    $("#edit-about").show();
    $("#view-about").hide();
}
)
$(".edit-about-btn").click(function()
{
    $("#view-about").show();
    $("#edit-about").hide();
}
)

$("#view-interest-btn").click(function()
{
    $("#edit-interest").show();
    $("#view-interest").hide();
}
)
$("#edit-interest-btn").click(function()
{
    $("#view-interest").show();
    $("#edit-interest").hide();
}
)

$("#view-portfolio-btn").click(function()
{
    $("#edit-portfolio").show();
    $("#view-portfolio").hide();
}
)
$("#edit-portfolio-btn").click(function()
{
    $("#view-portfolio").show();
    $("#edit-portfolio").hide();
}
)


 $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

    $(".connect").click(function()
    {
        $('#myModal').modal('toggle');
        setTimeout(function(){ $('#myModal').modal('toggle'); },2000);
    })


$(function(){

    getSkillset();

    $(document).on('click','#saveAbout',function(){
        var Data = $("#aboutme").serializeArray();
        var aboutme = $("#abtme").val();
        $("#aboutmeContent").html(aboutme);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url : '{{url("connect/addAboutme")}}',
            type : 'POST',
            data : Data,
            beforeSend : function(){
                $(".loader-bg").show();
            },
            success: function(res){
                if(res.success){
                    $("#edit-about").hide();
                    $("#view-about").show();
                    addProductCartOrWishlist('fa-check','Success',res.success);
                }else{
                    addProductCartOrWishlist('fa-times','error',res.error);
                }
            },
            complete : function(){
                $(".loader-bg").hide();
            }
        });
 
    });


    $(document).on('click','#editSkillset',function(){
        $(".loader-bg").show();
        $.get('{{url("connect/editSkillset")}}',function(res){
            $("#skillSet").html(res);
            $(".loader-bg").hide();
        });
    });
});


function getSkillset(){
    $(".loader-bg").show();
    $.get('{{url("connect/getSkillset")}}',function(res){
        $("#skillSet").html(res);
        $(".loader-bg").hide();
    });
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
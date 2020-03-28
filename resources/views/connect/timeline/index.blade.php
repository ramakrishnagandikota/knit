@extends('layouts.connect')
@section('title','Connect Timeline')
@section('content')

<!-- Page-body start -->
<div class="page-body m-t-15" id="app">
<!-- <div class="row">
<div class="col-xl-12">                                       
<h4 class="m-b-30 m-t-30">Measurements </h4>
</div>
</div> -->
<div class="row">
<div class="col-lg-2"></div>
<div class="col-md-8">
<div class="card bg-white">
<div class="post-new-contain row card-block">
<div class="col-md-1 col-xs-3">
<img src="{{ asset('resources/assets/files/assets/images/user-card/user17.jpg') }}" class="img-fluid img-radius"
    alt="">
</div>
<form class="col-md-11 col-xs-9">
<div class="">
    <textarea id="post-message" class="form-control post-input b-none"
        rows="3" cols="10" required=""
        placeholder="Write something..." data-toggle="modal" data-target="#PostModal"></textarea>
</div>
</form>
</div>
<div class="post-new-footer b-t-muted p-15">
<span class="image-upload m-r-15" data-toggle="tooltip" data-placement="top"
title="Upload image">
<label for="file" class="file-upload-lbl" data-toggle="modal" data-target="#PostModal">
    <i class="icofont icofont-image text-muted"></i>
</label>
</span>
<span data-toggle="modal" data-target="#PostModal"><i class="icofont icofont-ui-user text-muted" data-toggle="tooltip" data-placement="top"
title="Tag"></i></span>
<span data-toggle="modal" data-target="#PostModal"><i class="fa fa-location-arrow text-muted" data-toggle="tooltip" data-placement="top"
title="Share location"></i></span>
<!-- <select class="options m-l-20">
<option value="volvo">Public</option>
<option value="saab">Friends</option>
<option value="vw">Followers</option>
<option value="audi" selected>Me</option>
</select> -->
<span><a href="#" id="post-new"
    class="btn theme-btn waves-effect waves-light float-right"
    >Post</a></span>
<!--<button type="submit" class="btn btn-primary float-right">Post</button>-->
</div>
</div>


<!-- POST BOX START-->

<div>
<div class="card bg-white p-relative" id="div-to-update">
<div class="card-block">
<div class="row" >
    <div class="col-lg-8">
        <div class="media">
            <div class="media-left media-middle friend-box">
                <a href="#">
                    <img class="media-object img-radius m-r-20"
                        src="{{ asset('resources/assets/files/assets/images/user-card/user17.jpg') }}" alt="">
                </a>
            </div>
            <div class="media-body">
                <div class="chat-header">Barbara Davis posted</div>
                <div class="f-13 text-muted">50 minutes ago</div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 text-right">
        <div class="dropdown-secondary dropdown d-inline-block">
            <span id="dropdown3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert" style="cursor: pointer;"></i>
            <div class="dropdown-menu" aria-labelledby="dropdown3" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                <a class="dropdown-item waves-light waves-effect" onclick="OpenEdit();" href="#!"><i class="icofont icofont-checked m-r-10"></i>Edit</a>
                <a class="dropdown-item waves-light waves-effect" id="privacy-drop" onclick="OpenPrivacy();"><i class="fa fa-gear"></i>Privacy settings</a>
                <a class="dropdown-item waves-light waves-effect" href="#!" onclick="OpenDelete();"><i class="fa fa-trash m-r-10"></i>Delete</a>
            <!-- end of dropdown menu -->
        </div>
    </div>
</div>
</div>

<div class="card-block">

<div class="fbphotobox m-10 text-center">
    <a><img class="photo" fbphotobox-src="{{ asset('resources/assets/marketplace/images/1.jpg') }}" alt="Dummmy Image<br>Very Coool!" src="{{ asset('resources/assets/marketplace/images/1.jpg') }}"/></a>
    <a><img class="photo" fbphotobox-src="{{ asset('resources/assets/marketplace/images/2.jpg') }}" src="{{ asset('resources/assets/marketplace/images/2.jpg') }}"/></a>
    <a><img class="photo" fbphotobox-src="{{ asset('resources/assets/marketplace/images/3.jpg') }}" src="{{ asset('resources/assets/marketplace/images/3.jpg') }}"/></a>
    <a><img class="photo" fbphotobox-src="{{ asset('resources/assets/marketplace/images/4.jpg') }}" src="{{ asset('resources/assets/marketplace/images/4.jpg') }}"/></a>
    <a><img class="photo" fbphotobox-src="{{ asset('resources/assets/marketplace/images/5.jpg') }}" src="{{ asset('resources/assets/marketplace/images/5.jpg') }}"/></a>
    <a><img class="photo" fbphotobox-src="{{ asset('resources/assets/marketplace/images/2.jpg') }}" src="{{ asset('resources/assets/marketplace/images/2.jpg') }}"/></a>
    <div style="color: #bbd6bb;font-size: 16px;text-decoration: underline;"><a href="">Show more</a></div>
</div>
<div class="timeline-details">

    <p class="text-muted">lorem ipsum dolor sit amet, consectetur
        adipisicing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
        exercitation ullamco
        laboris nisi ut aliquip ex ea </p>
</div>
<div class="card-block b-b-theme b-t-theme social-msg">
    <a href="#">
        <i class="icofont icofont-heart-alt text-muted"></i>
        <span class="b-r-theme">Like (20)</span>
    </a>
    <a href="#">
        <i class="icofont icofont-comment text-muted"></i>
        <span class="b-r-theme">Comments (25)</span>
    </a>
	<a href="#">
		<i class="icofont icofont-share text-muted"></i>
	    <span>Share (10)</span>
	</a>

</div>
<div class="card-block user-box">
    <div class="p-b-20">
        <span class="f-14"><a href="#">Comments (110)</a>
        </span>
        <span class="float-right"><a href="#!">See all comments</a></span>
    </div>
    <div class="media">
        <a class="media-left" href="#">
            <img class="media-object img-radius m-r-20"
                src="{{ asset('resources/assets/files/assets/images/avatar-1.jpg') }}"
                alt="Generic placeholder image">
        </a>
        <div class="media-body b-b-theme social-client-description">
            <div class="chat-header">About Marta Williams<span
                    class="text-muted">Jane 04, 2015</span></div>
            <p class="text-muted">Lorem Ipsum is simply dummy text of the
                printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an
                unknown printer
                took a galley of type and scrambled it to make a type specimen
                book.</p>
        </div>
    </div>
    <div class="media">
        <a class="media-left" href="#">
            <img class="media-object img-radius m-r-20"
                src="{{ asset('resources/assets/files/assets/images/avatar-2.jpg') }}"
                alt="Generic placeholder image">
        </a>
        <div class="media-body b-b-theme social-client-description">
            <div class="chat-header">About Marta Williams<span
                    class="text-muted">Jane 10, 2015</span></div>
            <p class="text-muted">Lorem Ipsum is simply dummy text of the
                printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an
                unknown printer
                took a galley of type and scrambled it to make a type specimen
                book.</p>
        </div>
    </div>
    <div class="media">
        <a class="media-left" href="#">
            <img class="media-object img-radius m-r-20"
                src="{{ asset('resources/assets/files/assets/images/avatar-1.jpg') }}"
                alt="Generic placeholder image">
        </a>
        <div class="media-body">
            <form class="form-material right-icon-control">
                <div class="form-group form-default">
                    <textarea class="form-control" required=""></textarea>
                    <span class="form-bar"></span>
                    <label class="float-label">Write something...</label>
                </div>
                <div class="form-icon ">
                    <button
                        class="btn theme-outline-btn btn-icon  waves-effect waves-light">
                        <i class="fa fa-paper-plane "></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</div>
<!-- one image gallery -->
</div>


<!-- POST BOX START-->


</div>
</div>
<!-- Round card end -->
</div>
</div>
<!-- Page-body end -->


<!-- all models -->
<!-- Modal fro profile update-->
<div class="modal fade" id="myProfileModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title">Change profile image</h6>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        <div class="modal-body text-center m-t-15">
            <div class="">
                <!-- <p class="f-16">Change your profile image instantly</p> -->
                <a href="#" class="profile-image">
                    <img class="" id="profile-img" src="../files/assets/images/avatar-2.jpg" alt="user-img">
                </a>
                <span class="profile-upload">
                        <label for="profile-upload">
                                <img src="../files/assets/images/pencil.png">
                            </label>
                    <input id="profile-upload" type="file" onchange="readprofileURL(this);">
                        </span> 
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn theme-outline-btn" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn theme-btn" data-dismiss="modal">Update</button>
        </div>
      </div>
    </div>
  </div>
   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
          <div class="modal-header">
              <h6 class="modal-title f-w-500">Privacy settings</h6>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        <div class="modal-body m-t-15">
            <div class="row">
                <div class="col-lg-6"> <div class="checkbox-color checkbox-default">
                    <input id="checkbox51" type="checkbox">
                    <label for="checkbox51">
                        Public
                    </label>
                </div></div>
                <div class="col-lg-6"> <div class="checkbox-color checkbox-default">
                    <input id="checkbox52" type="checkbox" checked="">
                    <label for="checkbox52">
                        Friends
                    </label>
                </div></div>
                <div class="col-lg-6 m-t-10"> <div class="checkbox-color checkbox-default">
                    <input id="checkbox53" type="checkbox" checked="">
                    <label for="checkbox53">
                        Followers
                    </label>
                </div></div>
                <div class="col-lg-6 m-t-10"><div class="checkbox-color checkbox-default">
                    <input id="checkbox54" type="checkbox">
                    <label for="checkbox54">
                        Only me
                    </label>
                </div></div>
            </div>  
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
      </div>
    </div>
  </div>



   <!-- Modal -->
 <div class="modal fade" id="PostModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title">Post</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
            <div class="bg-white">
                <div class="post-new-contain row card-block">
                    <div class="col-md-1 col-xs-1 p-0 m-l-20">
                        <img src="../files/assets/images/user-card/user17.jpg" class="img-fluid img-radius"
                            alt="">
                    </div>
                    <form class="col-md-10 col-xs-10">
                        <div>
                            <textarea id="post-message-popup" class="form-control post-input m-b-10" style="border: 1px solid #ccc;"
                                rows="3" cols="10" required=""
                                placeholder="Write something..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="post-new-footer b-t-muted p-15">
                    <div class="col-sm-11 col-lg-11 m-l-30">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <label class="input-group-text">With</label>
                            </span>
                            <input type="text" class="form-control" placeholder="Who are you with?">
                        </div>
                    </div>
                    <div class="col-sm-11 col-lg-11 m-l-30">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <label class="input-group-text">Location</label>
                            </span>
                            <input type="text" class="form-control" placeholder="Share location">
                        </div>
                    </div>
                            <span class="image-upload m-r-15" data-toggle="tooltip" data-placement="top"
                                title="Upload image">
                                <input type="file" name="files[]" id="filer_input1" multiple="multiple">
                            </span>
                            <div id="post-buttons">
                            <i class="icofont icofont-ui-user text-muted" style="margin-left: 35px!important;" data-toggle="tooltip" data-placement="top"
                            title="Tag"></i>
                            <i class="fa fa-location-arrow text-muted" data-toggle="tooltip" data-placement="top"
                            title="Share location"></i>
                            <select class="options m-l-20">
                                <option value="volvo">Public</option>   
                                <option value="saab">Friends</option>
                                <option value="vw">Followers</option>
                                <option value="audi" selected>Me</option>
                            </select>
                    </div>
                </div>
            </div>
            </div>
      </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn theme-outline-btn float-right">Cancel</button>
            <span><a href="#" id="post-new"
                class="btn theme-btn waves-effect waves-light float-right"
                >Post</a></span>
          </div>
      </div>
      
    </div>
  </div>
  <!--Modal for Delete Confirmation-->
  <div class="modal fade" id="delete-Modal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
              <h5 class="modal-title f-w-500">Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <p></p>
               <p class="text-center"> <img class="img-fluid" src="../files/assets/images/delete.png" alt="Theme-Logo" /></p>
               <h6 class="text-center f-w-500">Do you really want to delete this post ?</h6>
               <!-- <h6 class="text-center">Action cannot be Undone !</h6> -->
               <p></p>
        </div>
        <div class="modal-footer">
                <button class="btn waves-effect waves-light btn-primary theme-outline-btn" data-dismiss="modal">Cancel</button>
                <button  id="clear-all-tasks" type="button" class="btn btn-danger delete-card" data-dismiss="modal">Delete</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('footerscript')

    <style>
        #upload-icon{position: relative;top:25px}
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
            border: 3px solid #0d665c;
        }
        .fbphotobox-main-container{margin-top: 35px;}
        .fa-trash{color: #666;}
        .image-upload img{width: 100%;}
        .input-group-append .input-group-text, .input-group-prepend .input-group-text{background-color: #faf9f8;color: #0d665c;}
        .options{color: #78909c;border: .5px solid #78909c;border-radius: 2px;margin-left: 28px;}
        #post-buttons{position: absolute!important;top: 186px;margin-left: 58px;margin-top: 8px;}
        .upload{margin-left: 46px;}
        .jFiler-theme-dragdropbox{margin-top: 8px;}
        .post-new-footer i{margin-left: 20px;}
        .jFiler-items{margin-top: 20px;}
</style>


 <!-- jquery file upload Frame work -->
<link href="{{ asset('resources/assets/files/assets/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('resources/assets/files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />

<link href="{{ asset('resources/assets/marketplace/css/fbphotobox.css') }}" rel="stylesheet" type="text/css" />


  <!-- jquery file upload js -->
    <script src="{{ asset('resources/assets/files/assets/pages/jquery.filer/js/jquery.filer.min.js') }}"></script>
    <script src="{{ asset('resources/assets/files/assets/pages/filer-modified/custom-filer.js') }}" type="text/javascript"></script>
    <script src="{{ asset('resources/assets/files/assets/pages/filer-modified/jquery.fileuploads.init.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('resources/assets/marketplace/js/fbphotobox.js') }}"></script>
<script>
    $('#PostModal').modal('hide');  
/* $('#PostModal').modal({
    backdrop: 'static',
    keyboard: false
}) */
function OpenEdit()
{
    $("#PostModal").modal("show");
}
function OpenPrivacy()
{
    $("#myModal").modal("show");
}
function OpenDelete()
{
    $("#delete-Modal").modal("show");
}

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

 /* $("#app").on('scroll',function() {

 	alert($(this).innerHeight());
        if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
            alert('end reached');
        }
    }) */

 $(window).scroll(function() {
    if (  document.documentElement.clientHeight + 
          $(document).scrollTop() >= document.body.offsetHeight )
    { 
        alert("You're at the bottom of the page.");
    }
});
</script>

@endsection

@extends('layouts.connect')
@section('title','Connect Timeline')
@section('content')
<!-- Page-body start -->

<div class="page-body m-t-15">

<div class="row">
<div class="col-lg-2"></div>
<div class="col-md-8">




<span><a href="javascript:;" id="post-new-static" onclick="OpenAdd();" class="btn theme-btn waves-effect waves-light float-right back-to-top page-scroll"
>Create post</a></span>

<div id="Post"></div>

@foreach($timeline as $time)

@if($time->privacy == 'only-me')
    @if(Auth::user()->id == $time->user_id)
        @component('connect.timeline.posts', ['time' => $time]) @endcomponent
    @endif
@endif
    
@if($time->privacy == 'friends')
@if(Auth::user()->id == $time->user_id)
    @component('connect.timeline.posts', ['time' => $time]) @endcomponent
@endif
    @foreach($friends as $friend)
        @if($friend->friend_id == $time->user_id)
            @component('connect.timeline.posts', ['time' => $time]) @endcomponent
        @endif
    @endforeach
@endif

@if($time->privacy == 'followers')
@if(Auth::user()->id == $time->user_id)
    @component('connect.timeline.posts', ['time' => $time]) @endcomponent
@endif
    @foreach($follow as $foll)
        @if($foll->follow_user_id == $time->user_id)
            @component('connect.timeline.posts', ['time' => $time]) @endcomponent
        @endif
    @endforeach
@endif

@if($time->privacy == 'public')
    @component('connect.timeline.posts', ['time' => $time]) @endcomponent
@endif





@endforeach
<div id="target"></div>
<div class="text-center hide" id="pre-loader"><img style="height: 50px;" src="{{asset('resources/assets/preloader.gif')}}"></div>
</div>
</div>
<!-- Round card end -->
</div>
<!-- Page-body end -->


<div class="modal fade" id="myModal" role="dialog" style="z-index: 10000;">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header">
                  <h6 class="modal-title">Privacy settings</h6>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            <div class="modal-body m-t-15">
                <div class="row">
                    <div class="form-radio m-l-30">
                        <form id="post-privacy">
                            @csrf
                            <input type="hidden" name="tid" id="postId" value="0">
                <div class="group-add-on" id="privacy_check">
                    <div class="radio radiofill radio-inline">
                        <label>
                            <input type="radio" class="updatePrivacy" name="privacy" id="public" value="public"><i class="helper"></i> Public
                        </label>
                    </div>
                    <div class="radio radiofill radio-inline">
                        <label>
                            <input type="radio" class="updatePrivacy" name="privacy" id="friends" value="friends"><i class="helper"></i> Friends
                        </label>
                    </div>
                    <div class="radio radiofill radio-inline">
                            <label>
                                <input type="radio" class="updatePrivacy" name="privacy" id="followers" value="followers"><i class="helper"></i> Followers
                            </label>
                        </div>
                    <div class="radio radiofill radio-inline">
                        <label>
                            <input type="radio" class="updatePrivacy" name="privacy" id="only-me" value="only-me"><i class="helper"></i> Only Me
                        </label>
                    </div>
                </div>
            </form>
            </div>
                </div>  
            </div>
            <div class="modal-footer">
                <button class="btn waves-effect waves-light btn-primary theme-outline-btn" data-dismiss="modal">Cancel</button>
                <button  id="savePrivacy" type="button" class="btn btn-danger" >Update</button>
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
               <p class="text-center"> <img class="img-fluid" src="{{url('resources/assets/files/assets/images/delete.png') }}" alt="Theme-Logo" /></p>
               <h6 class="text-center f-w-500">Do you really want to delete this post ?</h6>
               <input type="hidden" id="postdelId" value="0">
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


      <!--Modal for Edit comment-->
  <div class="modal fade" id="editComment-Modal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
              <h5 class="modal-title f-w-500">Comment</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form class="form-material right-icon-control" id="UpdateComment">
                @csrf
        <div class="form-group form-default">
            <input type="hidden" id="cid" name="cid" value="0">
            <input type="hidden" id="tid" value="0">
            <textarea class="form-control fill" id="editcomment" name="comment" required=""></textarea>
            <span class="form-bar"></span>
            <label class="float-label">Write something...</label>
        </div>
    </form>
        </div>
        <div class="modal-footer">
                <button class="btn waves-effect waves-light btn-primary theme-outline-btn" data-dismiss="modal">Cancel</button>
                <button id="commentUpdate" type="button" class="btn btn-danger" >Update Comment</button>
        </div>
      </div>
    </div>
  </div>

  <!-- create post -->

   <div class="modal fade bd-example-modal-lg" aria-labelledby="myLargeModalLabel" id="PostModal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content" id="modal-data">
    
    <div class="text-center" id="pre-loader"><img style="height: 50px;" src="{{asset('resources/assets/preloader.gif')}}"></div>
        
      </div>
      <!-- modal content end -->
    </div>
  </div>

<audio id="myAudio" class="hide">
  <!-- <source src="horse.ogg" type="audio/ogg"> -->
  <source src="{{asset('resources/assets/pc.mp3')}}" type="audio/mpeg">
</audio>
@endsection
@section('footerscript')
<script type="text/javascript">
    var URL = '{{url("connect/imageUpload")}}';
    var URL1 = '';
    var CLOSE = '{{asset('resources/assets/marketplace/images/close.png')}}';
</script>
<style>
#upload-icon{position: relative;top:0px}
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
        .options{color: #78909c;border: .5px solid #78909c;border-radius: 2px;margin-left: 28px;float: left;left: 0;position: absolute;}
        #post-buttons{position: absolute!important;top: 186px;margin-left: 58px;margin-top: 8px;}
        .upload{margin-left: 46px;}
        .jFiler-theme-dragdropbox{margin-top: 8px;}
        .post-new-footer i{margin-left: 20px !important;}
        .jFiler-items{margin-top: 20px;}
        #post-new-static{position: fixed;bottom: 10px;right: 6px;}
        .hide{
            display: none;
        }
        .liked{
            color: #0d665b !important
        }
        .nopm{
            padding: 0px !important;
            margin: 0px !important;
        }
</style>


<!-- jquery file upload Frame work -->
<link href="{{ asset('resources/assets/files/assets/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('resources/assets/files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />

<link href="{{ asset('resources/assets/marketplace/css/fbphotobox.css') }}" rel="stylesheet" type="text/css" />



<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('resources/assets/marketplace/js/fbphotobox.js') }}"></script>


<script>
    
$('#PostModal').modal('hide');  
/* $('#PostModal').modal({
backdrop: 'static',
keyboard: false
}) */
function OpenEdit(id){
    var options = {
         backdrop: 'static',
         keyboard: false
    }
$("#PostModal").modal(options);
$("#timeline"+id).slideUp();
$.get("{{url('connect/editAddPost')}}/"+id,function(res){
    $("#modal-data").html(res);
});
}

function closePopup(id){
    $("#PostModal").modal('hide');
    $("#timeline"+id).slideDown();
}

function OpenAdd(){
$("#PostModal").modal("show");
$.get('{{url("connect/showAddPost")}}',function(res){
    $("#modal-data").html(res);
});
}

function OpenPrivacy(id){
$("#myModal").modal("show");
var privacy = $("#privacy-drop"+id).attr('data-privacy');
$("#postId").val(id);
$("#privacy_check #"+privacy).prop('checked',true);
}

function editPopup(cid,tid){
    var comment = $("#commentval"+cid).html();
    $("#editcomment").val(comment);
    $("#cid").val(cid);
    $("#tid").val(tid);
    $("#editComment-Modal").modal('show');
    $("#comment"+cid).hide();
}

function OpenDelete(id){
$("#delete-Modal").modal("show");
$("#postdelId").val(id);
}


$(document).ready(function() {

    $("fbphotobox img").fbPhotoBox({
rightWidth: 360,
leftBgColor: "black",
rightBgColor: "white",
footerBgColor: "black",
overlayBgColor: "#222",
containerClassName: 'fbphotobox',
imageClassName: 'photo',
onImageShow: function() {
$("fbphotobox img").fbPhotoBox("addTags",
[{x:0.3,y:0.3,w:0.3,h:0.3}]
);
$(".fbphotobox-image-content").html('<div class="card-block b-b-theme b-t-theme social-msg"> <a href="#"> <i class="icofont icofont-heart-alt text-muted"> </i> <span class="b-r-theme">Like (20)</span> </a> <a href="#"> <i class="icofont icofont-comment text-muted"> </i> <span class="b-r-theme">Comments (25)</span> </a> </div><div class="card-block user-box"> <div class="p-b-20 m-t-15"> <span class="f-14"><a href="#">Comments (110)</a> </span> <span class="float-right"><a href="#!">See all comments</a></span><hr> </div><div class="media"> <a class="media-left p-r-0" href="#"> <img class="media-object img-radius m-r-20" src="../files/assets/images/avatar-1.jpg" alt="Generic placeholder image"> </a> <div class="media-body b-b-theme social-client-description"> <div class="chat-header">About Marta Williams<span class="text-muted">Jane 04, 2015</span></div><p class="text-muted">Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></div></div><div class="media"> <a class="media-left p-r-0" href="#"> <img class="media-object img-radius m-r-20" src="../files/assets/images/avatar-2.jpg" alt="Generic placeholder image"> </a> <div class="media-body b-b-theme social-client-description"> <div class="chat-header">About Marta Williams<span class="text-muted">Jane 10, 2015</span></div><p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></div></div><div class="media"> <a class="media-left p-r-0" href="#"> <img class="media-object img-radius m-r-20" src="../files/assets/images/avatar-1.jpg" alt="Generic placeholder image"> </a> <div class="media-body"> <form class="form-material right-icon-control"> <div class="form-group form-default"> <textarea class="form-control" required=""></textarea> <span class="form-bar"></span> <label class="float-label">Write something...</label> </div><div class="form-icon "> <button class="btn theme-outline-btn btn-icon waves-effect waves-light"> <i class="fa fa-paper-plane "></i> </button> </div></form> </div></div></div><p><br></p>');
}
});


$(document).on('click','.fbphotobox img',function(){
    var id = $(this).attr('data-id');
    //alert(id);

var photoId = "#fbphotobox"+id;

    $(photoId+" img").fbPhotoBox({
rightWidth: 360,
leftBgColor: "black",
rightBgColor: "white",
footerBgColor: "black",
overlayBgColor: "#222",
containerClassName: 'fbphoto'+id,
imageClassName: 'photo'+id,
onImageShow: function() {
$(photoId+" img").fbPhotoBox("addTags",
[{x:0.3,y:0.3,w:0.3,h:0.3}]
);
$(".fbphotobox-image-content").html('<div class="card-block b-b-theme b-t-theme social-msg"> <a href="#"> <i class="icofont icofont-heart-alt text-muted"> </i> <span class="b-r-theme">Like (20)</span> </a> <a href="#"> <i class="icofont icofont-comment text-muted"> </i> <span class="b-r-theme">Comments (25)</span> </a> </div><div class="card-block user-box"> <div class="p-b-20 m-t-15"> <span class="f-14"><a href="#">Comments (110)</a> </span> <span class="float-right"><a href="#!">See all comments</a></span><hr> </div><div class="media"> <a class="media-left p-r-0" href="#"> <img class="media-object img-radius m-r-20" src="../files/assets/images/avatar-1.jpg" alt="Generic placeholder image"> </a> <div class="media-body b-b-theme social-client-description"> <div class="chat-header">About Marta Williams<span class="text-muted">Jane 04, 2015</span></div><p class="text-muted">Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></div></div><div class="media"> <a class="media-left p-r-0" href="#"> <img class="media-object img-radius m-r-20" src="../files/assets/images/avatar-2.jpg" alt="Generic placeholder image"> </a> <div class="media-body b-b-theme social-client-description"> <div class="chat-header">About Marta Williams<span class="text-muted">Jane 10, 2015</span></div><p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></div></div><div class="media"> <a class="media-left p-r-0" href="#"> <img class="media-object img-radius m-r-20" src="../files/assets/images/avatar-1.jpg" alt="Generic placeholder image"> </a> <div class="media-body"> <form class="form-material right-icon-control"> <div class="form-group form-default"> <textarea class="form-control" required=""></textarea> <span class="form-bar"></span> <label class="float-label">Write something...</label> </div><div class="form-icon "> <button class="btn theme-outline-btn btn-icon waves-effect waves-light"> <i class="fa fa-paper-plane "></i> </button> </div></form> </div></div></div><p><br></p>');
}
});


});





$(document).on('click','#tagging',function(){
    $("#with").toggleClass('hide');
});

$(document).on('click','#locate',function(){
    $("#location").toggleClass('hide');
});

$(document).on('click','#post-new',function(){
    var Data = $("#addPost").serializeArray();

    $.ajax({
        url : '{{url("connect/addPost")}}',
        type : 'POST',
        data : Data,
        beforeSend : function(){
            $(".loader-bg").show();
        },
        success : function(res){
            if(res.error){
                addProductCartOrWishlist('fa-times','error',res.error); 
            }else{
                playAudio();
                $('#PostModal').modal('hide');  
                $("#Post").prepend(res);
                addProductCartOrWishlist('fa-check','success','Post added successfully'); 
            }
            
        },
        complete : function(){
            $(".loader-bg").hide();
        }
    }); 
});

$(document).on('click','#post-update',function(){
    var Data = $("#updatePost").serializeArray();
    var id = $("#timelineid").val();

    $.ajax({
        url : '{{url("connect/updatePost")}}',
        type : 'POST',
        data : Data,
        beforeSend : function(){
            $(".loader-bg").show();
        },
        success : function(res){
            if(res.error){
                addProductCartOrWishlist('fa-times','error',res.error); 
            }else{
                playAudio();
                $("#timeline"+id).remove();
                $('#PostModal').modal('hide');  
                $("#Post").prepend(res);
                addProductCartOrWishlist('fa-check','success','Post updated successfully.'); 
            }
            
        },
        complete : function(){
            $(".loader-bg").hide();
        }
    }); 
});

$(document).on('click','.like-post',function(){
    var timeline_id = $(this).attr('data-id');
    var Data = 'timeline_id='+timeline_id;

    var likeCount = $("#like"+timeline_id).html();
    var addLike = parseInt(likeCount) + 1;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : '{{url("connect/addLike")}}',
        type : 'POST',
        data : Data,
        beforeSend : function(){
            //$(".loader-bg").show();
        },
        success : function(res){
            if(res.error){
                 addProductCartOrWishlist('fa-times','error',res.error); 
            }else{
                $("#like"+timeline_id).html(addLike);
                $("#likable"+timeline_id).find('i').addClass('liked');
            $("#likable"+timeline_id).removeClass('like-post').addClass('unlike-post');
            playAudio();
            addProductCartOrWishlist('fa-check','success',res.success); 
            }
            
        },
        complete : function(){
            //$(".loader-bg").hide();
        }
    }); 
});


$(document).on('click','.unlike-post',function(){
    var timeline_id = $(this).attr('data-id');
    var Data = 'timeline_id='+timeline_id;

    var likeCount = $("#like"+timeline_id).html();
    var removeLike = parseInt(likeCount) - 1;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : '{{url("connect/unLikePost")}}',
        type : 'POST',
        data : Data,
        beforeSend : function(){
            //$(".loader-bg").show();
        },
        success : function(res){
            if(res.error){
                 addProductCartOrWishlist('fa-times','error',res.error); 
            }else{
                $("#like"+timeline_id).html(removeLike);
                $("#likable"+timeline_id).find('i').removeClass('liked');
            $("#likable"+timeline_id).removeClass('unlike-post').addClass('like-post');
                 addProductCartOrWishlist('fa-check','success',res.success); 
            }
            
        },
        complete : function(){
            //$(".loader-bg").hide();
        }
    }); 
});

$(document).on('click','.delete-card',function(){
    var id = $("#postdelId").val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post('{{url("connect/deletePost")}}',{timeline_id: id},function(res){
        if(res.success){
            $("#timeline"+id).remove();
            playAudio();
            addProductCartOrWishlist('fa-check','success',res.success); 
        }else{
            addProductCartOrWishlist('fa-times','error',res.error);
        }
    });
});

$(document).on('click','.submitComment',function(){
    var id = $(this).attr('data-id');
    var Data = $("#AddComment"+id).serializeArray();
    Data.push({'name' : 'timeline_id','value': id});

    var commentCount = $("#commentCount"+id).html();
    var totalCount = parseInt(commentCount) + 1;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url : '{{url("connect/addComment")}}',
        type : 'POST',
        data : Data,
        beforeSend : function(){
            //$(".loader-bg").show();
        },
        success : function(res){
            if(res.error){
                 addProductCartOrWishlist('fa-times','error',res.error); 
            }else{
                addProductCartOrWishlist('fa-check','success','Comment posted successfully.'); 
                playAudio();
                if(commentCount == 0){
                    $("#showComments"+id).html(res);
                }else{
                    $("#showComments"+id).prepend(res);
                }
                $("#AddComment"+id)[0].reset();
                $(".commentCount"+id).html(totalCount);
                if(commentCount == 0){
                $("#comments-div"+id).removeClass('hide');
                }
            }
            
        },
        complete : function(){
            //$(".loader-bg").hide();
        }
    }); 
});


$(document).on('click','#commentUpdate',function(){
    var Data = $("#UpdateComment").serializeArray();
    var tid = $("#tid").val();
    var cid = $("#cid").val();
    $.post('{{url("connect/UpdateComment")}}',Data,function(res){
        if(res.error){
            addProductCartOrWishlist('fa-times','error',res.error);
            $("#comment"+cid).show();
        }else{
            $("#editComment-Modal").modal('hide');
        addProductCartOrWishlist('fa-check','success','Comment updated successfully.'); 
            $("#comment"+cid).remove();
            $("#UpdateComment")[0].reset();
            $("#showComments"+tid).prepend(res);
            playAudio();
            
        }
    });
});


$(document).on('click','#savePrivacy',function(){
    var Data = $("#post-privacy").serializeArray();
    var tid = $("#postId").val();
    var radioValue = $("input[name='privacy']:checked"). val();
    $.post('{{url("connect/savePrivacy")}}',Data,function(res){
        if(res.error){
        addProductCartOrWishlist('fa-times','success',res.error);
        }else{
        addProductCartOrWishlist('fa-check','success',res.success);
        $("#myModal").modal("hide");
        $("#privacy-drop"+tid).attr('data-privacy',radioValue);
        playAudio();
        }
    })
});




});





/*
$(window).scroll(function() {
if (  document.documentElement.clientHeight + 
$(document).scrollTop() >= document.body.offsetHeight )
{ 
    alert("You're at the bottom of the page.");
    var id = $("input.lastId").last().val();
    $.get('url("connect/getData")}}/'+id,function(res){
        $("#target").append(res);
    });
}
}); 
*/
$(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() > $(document).height() - 8) {
    $("#pre-loader").show();
       var id = $("input.lastId").last().val();
       //if(id != 0){
       // alert(id);
        //$("input.lastId").last().removeClass('lastId');
    $.get('{{url("connect/getData")}}/'+id,function(res){
        //$("input.lastId").last().val(0);
        $("#pre-loader").hide();
        $("#target").append(res);
    }); 
    //}
   }
});

/*
window.onscroll = function(ev) {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        alert('bottom');
    }
};
*/
/*
var size_li = 0;
$(document).on('click','.show-more',function () {
    var id = $(this).attr('data-id');
    size_li = $("#photo-library"+id+" a.hide").length;
        alert(size_li);
        x=2;
        x= (x+2 <= size_li) ? x+2 : size_li;
        alert(x);
       $('#photo-library'+id+' a:lt('+x+')').removeClass('hide');

   
});
*/

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

<script>
var x = document.getElementById("myAudio"); 

function playAudio() { 
  x.play(); 
} 

function pauseAudio() { 
  x.pause(); 
} 
</script>

@endsection

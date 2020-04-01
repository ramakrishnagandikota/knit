<?php 
if($time->picture){
    $picture = $time->picture;
}else{
    $picture = 'https://via.placeholder.com/150?text='.$time->first_name;
}
?>

<div id="timeline{{$time->id}}">
<div class="card bg-white p-relative">
<div class="card-block">
<div class="row">
<div class="col-lg-8">
    <div class="media">
        <div class="media-left media-middle friend-box">
            <a href="#">
                <img class="media-object img-radius m-r-20"
                    src="{{$picture}}" alt="{{$time->first_name}}">
            </a>
        </div>
        <div class="media-body">
            <div class="chat-header"><b> {{ucfirst($time->first_name)}} {{ucfirst($time->last_name)}} </b> posted</div>
            <div class="f-13 text-muted">{{ \Carbon\Carbon::parse($time->created_at)->diffForHumans()}}</div>
        </div>
    </div>
</div>

@if(Auth::user()->id == $time->user_id)

<div class="col-lg-4 text-right">
    <div class="dropdown-secondary dropdown d-inline-block">
        <span id="dropdown3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert" style="cursor: pointer;"></i>
        <div class="dropdown-menu" aria-labelledby="dropdown3" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
            <a class="dropdown-item waves-light waves-effect" onclick="OpenEdit({{$time->id}});" href="javascript:;"><i class="icofont icofont-checked m-r-10"></i>Edit</a>
            <a class="dropdown-item waves-light waves-effect " id="privacy-drop{{$time->id}}" onclick="OpenPrivacy({{$time->id}})" data-privacy="{{$time->privacy}}" ><i class="fa fa-gear"></i>Privacy settings</a>
            <a class="dropdown-item waves-light waves-effect" href="javascript:;" onclick="OpenDelete({{$time->id}});"><i class="fa fa-trash m-r-10"></i>Delete</a>
        <!-- end of dropdown menu -->
        </div>
    </div>
</div>
@endif

</div>

<div class="card-block">
<!-- <p>More than five images</p>
<div id="gallery1"></div> -->
 
<?php 
$images = $time->images;
?>

@if($images->count() > 0)
<div class="fbphotobox m-10 text-center fbphoto{{$time->id}}" id="fbphotobox{{$time->id}}"  id="photo-library{{$time->id}}">
<?php $i=1; ?>
    @foreach($images as $image)
<a @if($i > 3) class="hide" @endif>
    <img class="photo{{$time->id}}" data-id="{{$time->id}}" fbphotobox-src="{{ $image->image_path }}" alt="Dummmy Image<br>Very Coool!" src="{{ $image->image_path }}"/>
</a>

<?php $i++; ?>
@endforeach
@if($i > 6)
<div style="color: #bbd6bb;font-size: 16px;text-decoration: underline;"><a href="javascript:;" class="show-more" data-id="{{$time->id}}">Show more</a></div>
@endif

</div>
@endif

<div class="timeline-details">
<!-- <div class="chat-header">Josephin Doe posted</div> -->
<p class="text-muted">{{$time->post_content}}</p>
@if($time->tag_friends)
<p>With {{$time->tag_friends}}</p>
@endif
@if($time->location)
<p>At {{$time->location}}</p>
@endif
</div>
<?php 
$likeCount = $time->likes()->where('user_id',Auth::user()->id)->count();
?>
<div class="card-block b-b-theme b-t-theme social-msg">
<a href="javascript:;" class="@if($likeCount == 0) like-post @else unlike-post @endif" id="likable{{$time->id}}" data-id="{{$time->id}}">
    <i class="icofont icofont-heart-alt text-muted @if($likeCount != 0) liked @endif"></i>
    <span class="b-r-theme">Like (<b id="like{{$time->id}}">{{$time->likes()->count()}}</b>)</span>
</a>
<a href="#">
    <i class="icofont icofont-comment text-muted">

    </i>
    <span class="b-r-theme">Comments (<span class="nopm" id="commentCount{{$time->id}}" class="commentCount{{$time->id}}">{{$time->comments()->count()}}</span>)</span>
</a>
<!-- 
<a href="#">
    <i class="icofont icofont-share text-muted">

    </i>
    <span>Share (10)</span>
</a>
 -->
</div>


<div class="card-block user-box">

<div id="comments-div{{$time->id}}" class="p-b-20 @if($time->comments->count() == 0) hide @endif">
    <span class="f-14"><a href="Javascript:;">Comments (<span class="commentCount{{$time->id}}">{{$time->comments()->count()}}</span>)</a>
    </span>
    <span class="float-right"><a href="Javascript:;">See all comments</a></span>
</div>
    @if($time->comments->count() > 0)
@php
$comments = $time->comments()->leftJoin('users','users.id','timeline_comments.user_id')->select('timeline_comments.*','users.id as uid','users.first_name','users.last_name','users.picture')->where('timeline_comments.status',1)->get();    
@endphp

@foreach($comments as $comment)
@component('connect.timeline.comments',['com' => $comment])

@endcomponent
@endforeach
@endif
<div id="showComments{{$time->id}}"></div>
<!-- add new comment start-->
<div class="media">
<a class="media-left" href="#">
    <img class="media-object img-radius m-r-20"
        src="{{$picture}}"
        alt="Generic placeholder image">
</a>
<div class="media-body">
    <form class="form-material right-icon-control" id="AddComment{{$time->id}}">
        <div class="form-group form-default">
            <textarea class="form-control" name="comment" required=""></textarea>
            <span class="form-bar"></span>
            <label class="float-label">Write something...</label>
        </div>
        <div class="form-icon ">
            <button type="button" 
                class="btn theme-outline-btn btn-icon  waves-effect waves-light submitComment" data-id="{{$time->id}}">
                <i class="fa fa-paper-plane "></i>
            </button>
        </div>
    </form>
</div>
</div>
<!-- add new comment end-->
<input type="hidden" class="lastId" value="{{$time->id}}">
</div>
</div>
</div>
</div>
</div>
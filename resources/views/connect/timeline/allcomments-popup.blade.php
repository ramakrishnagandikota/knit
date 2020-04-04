<div class="card-block b-b-theme b-t-theme social-msg">
	<a href="javascript:;"> <i class="icofont icofont-heart-alt text-muted"> </i>  <span class="b-r-theme">Likes ({{$timeline->likes->count()}})</span> 
	</a>
	<a href="javascript:;"> <i class="icofont icofont-comment text-muted"> </i>  <span class="b-r-theme">Comments ({{$timeline->comments()->count()}})</span> 
	</a>
</div>
<div class="card-block user-box" id="commentsPopupBox" style="height: 410px;overflow-y: scroll;">
	<div class="p-b-20 m-t-15"> 
	<span class=""><a href="javascript:;" id="showMore">See all comments</a></span>
		<hr>
	</div>

	@foreach($comments as $com)

<?php 
if($com->picture){
    $picture1 = $com->picture;
}else{
    $picture1 = 'https://via.placeholder.com/150?text='.$com->first_name;
}
?>
<?php 
if($com->username){
    $username = $com->username;
}else{
    $na = explode('@', $com->email);
    $username = $na[0];
}
?>
	<div class="media hide">
		<a class="media-left p-r-0" href="#">
			<img class="media-object img-radius m-r-20" src="{{$picture1}}" alt="Generic placeholder image">
		</a>
		<div class="media-body b-b-theme social-client-description">
        <div class="chat-header">
        	 @if($com->user_id == Auth::user()->id)
        <a href="{{url('connect/myprofile')}}"> {{$com->first_name}} {{$com->last_name}}</a>
            @else
           <a href="{{url('connect/profile/'.$username.'/'.encrypt($com->uid))}}"> {{$com->first_name}} {{$com->last_name}}</a>
           @endif
        	<span
                class="text-muted">
                @if(strtotime($com->created_at) == strtotime($com->updated_at))
					{{ \Carbon\Carbon::parse($com->created_at)->diffForHumans()}} 
                @else   
                	Edited {{ \Carbon\Carbon::parse($com->updated_at)->diffForHumans()}} 
                @endif
            </span></div>
        <p class="text-muted" id="commentval{{$com->id}}">{{$com->comment}}</p>
    </div>
	</div>
	@endforeach

</div>
<p>
	<br>
</p>
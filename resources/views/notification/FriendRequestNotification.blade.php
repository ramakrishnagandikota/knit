<?php 
if($notification->data['requestSentBy']['picture']){
		$picture = $notification->data['requestSentBy']['picture'];
	}else{
		$picture = 'https://via.placeholder.com/150?text='.$notification->data['requestSentBy']['first_name'];
	}
?>
<li>
<div class="media">
<img class="img-radius" src="{{ $picture }}" alt="">
<div class="media-body">
<a href="{{url('connect/profile/'.$notification->data['requestSentBy']['username'].'/'.$notification->data['requestSentBy']['enc_id'])}}"><h5 class="notification-user">{{ ucfirst($notification->data['requestSentBy']['first_name']) }} {{ $notification->data['requestSentBy']['last_name'] }}</h5></a>
<p class="notification-msg">sent a friend request to connect with you.</p>
<span class="notification-time">{{ \Carbon\Carbon::parse($notification->data['RequestSentAt'])->diffForHumans() }}</span>
</div>
</div>
</li>
<?php 
if($notification->data['followingBy']['picture']){
		$picture = $notification->data['followingBy']['picture'];
	}else{
		$picture = 'https://via.placeholder.com/150?text='.$notification->data['followingBy']['first_name'];
	}
?>
<li>
<div class="media">
<img class="img-radius" src="{{ $picture }}" alt="">
<div class="media-body">
<h5 class="notification-user">{{ ucfirst($notification->data['followingBy']['first_name']) }} {{ $notification->data['followingBy']['last_name'] }}</h5>
<p class="notification-msg">is following you.</p>
<span class="notification-time">{{ \Carbon\Carbon::parse($notification->data['requestTime'])->diffForHumans() }}</span>
</div>
</div>
</li>
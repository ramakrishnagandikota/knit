

<li>
<h6>Notifications</h6>
@if(count(Auth::user()->unreadNotifications) > 0)
<label class="label label-danger">New</label>
@endif
</li>

@if(count(Auth::user()->unreadNotifications) > 0)
  @foreach(Auth::user()->unreadNotifications  as $notification)
    @include('notification.'.class_basename($notification->type))
  @endforeach


@else

<p class="notification-msg text-center">No new notifications found.</p>

@endif



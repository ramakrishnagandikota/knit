
@extends('layouts.connect')
@section('title','My Connections')
@section('content')

<div class="page-body m-t-15">
<div class="row">
<div class="col-lg-3">
<div id="MainMenu" class="card">
<div class="list-group panel" id="collection-filter">

 <a href="#accordion3" class="list-group-item list-group-item f-w-600" data-toggle="collapse" data-parent="#MainMenu"> Filters <i class="fa fa-caret-down"></i></a>
<div class="collapse show" id="accordion3">
<div class="list-group-item" style="border-bottom: none;">
<div class="col-lg-12">
<div class="skills-mutliSelect">
<ul>
<label class="container">Friends
<input type="checkbox" value="friends"> <span class="checkmark"></span>
</label>
<label class="container">Followers
<input type="checkbox" value="followers"> <span class="checkmark"></span>
</label>
</ul>
</div>
</div>
</div>
</div> <a href="#accordion1" class="list-group-item list-group-item f-w-600" data-toggle="collapse" data-parent="#MainMenu"> Skills <i class="fa fa-caret-down"></i></a>
<div class="collapse show" id="accordion1">
<div class="list-group-item" style="border-bottom: none;">
<div class="col-lg-12">
<div class="skills-mutliSelect">
<ul>
@if($skills->count() > 0)
	@foreach($skills as $sk)
		<label class="container"> {{$sk->name}}
			<input type="checkbox" value="{{$sk->slug}}"> <span class="checkmark"></span>
		</label>
	@endforeach
@endif
<label class="container">
<button class="btn btn-default micro-btn waves-effect waves-light pull-right" id="reset1">Clear All</button>
</label>
<br>
</ul>
</div>
</div>
</div>
</div>
<!--New Accordion--> <a href="#accordion4" class="list-group-item list-group-item f-w-600" style="margin-bottom: 10px;" data-toggle="collapse" data-parent="#MainMenu"> Skill level<i class="fa fa-caret-down"></i></a>
<div class="collapse" id="accordion4">
<div class="list-group-item" style="border-bottom: none;">
<div class="col-lg-12">
<div class="ratings-mutliSelect">
<ul>
@if($skill_level->count() > 0)
	@foreach($skill_level as $sl)
	<label class="container">{{$sl->name}}
		<input type="checkbox" value="{{$sl->slug}}"> <span class="checkmark"></span>
	</label>
	@endforeach
@endif
<label class="container">
<button class="btn btn-default micro-btn waves-effect waves-light pull-right" id="reset4">Clear All</button>
</label>
<br>
</ul>
</div>
</div>
</div>
</div>
<!--End of Accordion-->
</div>
</div>
</div>
<div class="col-lg-9">
<div class="row">
<div class="col-lg-12 col-xl-12 col-md-12">
<div class="card">
<form action="{{url("connect/find-connections")}}" method="GET">
<div class="rounded rounded-pill">
<div class="input-group" style="margin-bottom: 1px;">
<input type="search" id="searchconnections" name="search" placeholder="Search for new connections..." aria-describedby="button-addon1" class="form-control border-0" value="{{$search}}">
<div class="input-group-append">
<button id="button-addon1" type="submit" class="btn btn-link text-primary searchresult"><i class="fa fa-search"></i>
</button>
</div>
</div>
</div>
</form>
</div>
</div>
<div class="col-lg-9">
<!-- <h5 class="m-b-25 theme-heading">My connections</h5> -->
@if($search)
<h5 class="m-b-25 theme-heading">Search result : {{ucfirst($search)}}</h5>
@endif
</div>
<div class="col-lg-12">
<div class="row users-card">


@if($users)
@foreach($users as $user)
@php
	if($user->picture){
		$picture = $user->picture;
	}else{
		$picture = 'https://via.placeholder.com/150?text='.$user->first_name;
	}
$friend = App\Models\Friends::where('user_id',Auth::user()->id)->where('friend_id',$user->id)->count();
$follow = App\Models\Follow::where('user_id',Auth::user()->id)->where('follow_user_id',$user->id)->count();
$frequest = App\Models\Friendrequest::where('user_id',Auth::user()->id)->where('friend_id',$user->id)->count();
$myfrequest = App\Models\Friendrequest::where('user_id',$user->id)->where('friend_id',Auth::user()->id)->count();

if($user->username){
	$username = $user->username;
}else{
	$ds = explode('@', $user->email);
	$username = $ds[0];
}
@endphp

<div class="col-lg-4 col-xl-3 col-md-4 hidethis sectionContent @if($follow == 1) followers @endif @if($friend == 1) friends @endif" >
	<div class="rounded-card user-card">
		<div class="card">
			<div class="img-hover">
			<img class="img-fluid img-radius p-10" src="{{$picture}}" alt="round-img">
			<div class="img-overlay img-radius"> 
	
				<span>
					 @if($friend == 1)
			        <a href="#" class="btn btn-sm btn-primary unfriend" id="friend{{$user->id}}" data-toggle="tooltip" data-id="{{$user->id}}" data-placement="top" title="Unfriend"data-popup="lightbox"> <i class="fa fa-user-times"></i></a>

			        @else
			        	@if($frequest == 0)
			        		@if($myfrequest == 0)
					<a href="javascript:;" id="friend{{$user->id}}" class="btn btn-sm btn-primary friendRequest" data-toggle="tooltip" data-placement="top" title="Add Friend" data-id="{{$user->id}}" data-popup="lightbox"> <i class="fa fa-user-plus"></i></a>
							@else
					<a href="javascript:;" id="friend{{$user->id}}" class="btn btn-sm btn-primary acceptRequest" data-toggle="tooltip" data-placement="top" title="Accept Request" data-id="{{$user->id}}" data-popup="lightbox"> <i class="fa fa-user-plus"></i></a>
							@endif
						@else
					<a href="javascript:;" id="friend{{$user->id}}" class="btn btn-sm btn-primary cancelRequest" data-toggle="tooltip" data-placement="top" title="Request Sent" data-id="{{$user->id}}" data-popup="lightbox"> <i class="fa fa-user-plus"></i></a>
						@endif
			        @endif
					
					@if($follow == 1)
			        <a href="javascript:;" id="follow{{$user->id}}" class="btn btn-sm btn-primary unfollow" data-id="{{$user->id}}" data-toggle="tooltip" data-placement="top" title="Unfollow" ><i class="fa icofont icofont-undo"></i></a>
			        @else
					<a href="javascript:;" id="follow{{$user->id}}" class="btn btn-sm btn-primary follow" data-id="{{$user->id}}" data-toggle="tooltip" data-placement="top" title="Follow" ><i class="fa icofont icofont-ui-social-link"></i></a>
			        @endif
			    </span>
			</div>
			</div>
		<div class="user-content"> <a href="{{url('connect/profile/'.$username.'/'.encrypt($user->id))}}"><h4 class="">{{ucfirst($user->first_name)}} {{strtolower($user->last_name)}} </h4></a>
			<p class="m-b-0 text-muted">Pattern makers</p>
		</div>
		<p>
			<!--<div class="row justify-content-center">
				<div class="col-lg-12 text-center"> <i class="ti-location-pin"></i>
					<label class="custom-label">Michigan</label>
				</div>
			</div> -->
		</p>
		</div>
	</div>
</div>
@endforeach

<div class="col-md-12">
	{{$users->links()}}
</div>
@else



@endif

<div class="col-lg-12 col-xl-12 col-md-12 hide" id="noproducts">
    <div class="card custom-card skew-card">
            <div class="user-content card-bg m-l-40 m-r-40 m-b-40">
                    <img src="{{ asset('resources/assets/files/assets/images/arrow.png') }}" id="arrow-img"> 
                <h3 class="m-t-40 text-muted">Let's try searching for connections !</h3>
                <h4 class="text-muted m-t-10 m-b-30">A better way to connect with people<br>
                awaits you right here...</h4>
            </div>
    </div>
</div>

</div>

<div>

</div>
</div>
</div>
</div>
</div>
</div>
@endsection
@section('footerscript')
<style type="text/css">
	.hide{
		display: none;
	}
</style>
<script type="text/javascript">
	var sections = $('.sectionContent');
	$(function(){

		$('[data-toggle="tooltip"]').tooltip();

		var search = '{{$search}}';
		setTimeout(function(){
			var pageLink = $(".page-item a");
			var pageLinks = $(".page-item a").attr('href');
			pageLink.each(function() {
			    var url = $(this).attr('href');
			    $(this).attr('href',url+'&search='+search);
			});
			
		},1000);

		updateContentVisibility();

		$("#collection-filter :checkbox").click(updateContentVisibility);

/* sending friend request */

$(document).on('click','.friendRequest',function(){
	var id = $(this).attr('data-id');

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


	$.ajax({
		url : '{{url("connect/sendFriendRequest")}}',
		type : 'POST',
		data : 'friend_id='+id,
		beforeSend : function(){
			$(".loader-bg").show();
			$("#friend"+id).find('i').removeClass('fa-user-plus').addClass('fa-spinner fa-spin');
		},
		success : function(res){
			if(res.success){
				$("#friend"+id).find('i').removeClass('fa-spinner fa-spin').addClass('fa-user-times');
		$("#friend"+id).attr('data-original-title','Request Sent');
		$("#friend"+id).removeClass('friendRequest').addClass('cancelRequest');
				addProductCartOrWishlist('fa fa-check','success',res.success);
			}else{
				$("#friend"+id).find('i').removeClass('fa-spinner fa-spin').addClass('fa-user-plus');
				addProductCartOrWishlist('fa fa-times','error',res.error);
			}
		},
		complete : function(){
			$(".loader-bg").hide();
		}
	});
});


$(document).on('click','.cancelRequest',function(){
	var id = $(this).attr('data-id');

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

Swal.fire({
  title: '',
  text: "Are you sure want to remove this friend request ?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Remove'
}).then((result) => {
  if (result.value) {

	$.ajax({
		url : '{{url("connect/cancelFriendRequest")}}',
		type : 'POST',
		data : 'friend_id='+id,
		beforeSend : function(){
			$(".loader-bg").show();
			$("#friend"+id).find('i').removeClass('fa-user-times').addClass('fa-spinner fa-spin');
		},
		success : function(res){
			if(res.success){
				$("#friend"+id).find('i').removeClass('fa-spinner fa-spin').addClass('fa-user-plus');
		$("#friend"+id).attr('data-original-title','Add Friend');
		$("#friend"+id).removeClass('cancelRequest').addClass('friendRequest');
				addProductCartOrWishlist('fa fa-check','success',res.success);
			}else{
				$("#friend"+id).find('i').removeClass('fa-spinner fa-spin').addClass('fa-user-times');
				addProductCartOrWishlist('fa fa-times','error',res.error);
			}
		},
		complete : function(){
			$(".loader-bg").hide();
		}
	});
}

});
});



$(document).on('click','.unfriend',function(){
	var id = $(this).attr('data-id');

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


Swal.fire({
  title: '',
  text: "Are you sure want to remove this user from friend list ?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Remove'
}).then((result) => {
  if (result.value) {
    
    $.ajax({
		url : '{{url("connect/removeFriend")}}',
		type : 'POST',
		data : 'friend_id='+id,
		beforeSend : function(){
			$(".loader-bg").show();
			$("#friend"+id).find('i').removeClass('fa-user-times').addClass('fa-spinner fa-spin');
		},
		success : function(res){
			if(res.success){
				$("#friend"+id).find('i').removeClass('fa-spinner fa-spin').addClass('fa-user-plus');
		$("#friend"+id).attr('data-original-title','Add Friend');
		$("#friend"+id).removeClass('unfriend').addClass('friendRequest');
				addProductCartOrWishlist('fa fa-check','success',res.success);
			}else{
				$("#friend"+id).find('i').removeClass('fa-spinner fa-spin').addClass('fa-user');
				addProductCartOrWishlist('fa fa-times','error',res.error);
			}
		},
		complete : function(){
			$(".loader-bg").hide();
		}
	});


  }
});


	
});


$(document).on('click','.acceptRequest',function(){
	var id = $(this).attr('data-id');

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


	$.ajax({
		url : '{{url("connect/acceptRequest")}}',
		type : 'POST',
		data : 'friend_id='+id,
		beforeSend : function(){
			$(".loader-bg").show();
			$("#friend"+id).find('i').removeClass('fa-user-plus').addClass('fa-spinner fa-spin');
		},
		success : function(res){
			if(res.success){
				$("#friend"+id).find('i').removeClass('fa-spinner fa-spin').addClass('fa-user');
		$("#friend"+id).attr('data-original-title','Unfriend');
		$("#friend"+id).removeClass('acceptRequest').addClass('unfriend');
				addProductCartOrWishlist('fa fa-check','success',res.success);
			}else{
				$("#friend"+id).find('i').removeClass('fa-spinner fa-spin').addClass('fa-user-plus');
				addProductCartOrWishlist('fa fa-times','error',res.error);
			}
		},
		complete : function(){
			$(".loader-bg").hide();
		}
	});

});


$(document).on('click','.follow',function(){
	var id = $(this).attr('data-id');

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


	$.ajax({
		url : '{{url("connect/follow")}}',
		type : 'POST',
		data : 'follow_user_id='+id,
		beforeSend : function(){
			$(".loader-bg").show();
			$("#follow"+id).find('i').removeClass('icofont icofont-ui-social-link').addClass('fa-spinner fa-spin');
		},
		success : function(res){
			if(res.success){
				$("#follow"+id).find('i').removeClass('fa-spinner fa-spin').addClass('icofont icofont-undo');
		$("#follow"+id).attr('data-original-title','Unfollow');
		$("#follow"+id).removeClass('follow').addClass('unfollow');
				addProductCartOrWishlist('fa fa-check','success',res.success);
			}else{
				$("#follow"+id).find('i').removeClass('fa-spinner fa-spin').addClass('icofont-undo');
				addProductCartOrWishlist('fa fa-times','error',res.error);
			}
		},
		complete : function(){
			$(".loader-bg").hide();
		}
	});

});


$(document).on('click','.unfollow',function(){
	var id = $(this).attr('data-id');

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


	$.ajax({
		url : '{{url("connect/unfollow")}}',
		type : 'POST',
		data : 'follow_user_id='+id,
		beforeSend : function(){
			$(".loader-bg").show();
			$("#follow"+id).find('i').removeClass('icofont-undo').addClass('fa-spinner fa-spin');
		},
		success : function(res){
			if(res.success){
				$("#follow"+id).find('i').removeClass('fa-spinner fa-spin').addClass('icofont-ui-social-link');
		$("#follow"+id).attr('data-original-title','Follow');
		$("#follow"+id).removeClass('unfollow').addClass('follow');
				addProductCartOrWishlist('fa fa-check','success',res.success);
			}else{
				$("#follow"+id).find('i').removeClass('fa-spinner fa-spin').addClass('icofont-ui-social-link');
				addProductCartOrWishlist('fa fa-times','error',res.error);
			}
		},
		complete : function(){
			$(".loader-bg").hide();
		}
	});

});

	});


	function updateContentVisibility(){
    var checked = $("#collection-filter :checkbox:checked");

    if(checked.length){
        sections.addClass('hide');
        checked.each(function(){
            $("." + $(this).val()).removeClass('hide');

        });
    } else {
        sections.removeClass('hide');
    }

     if ( $("div.sectionContent:visible").length === 0){
        $("#noproducts").removeClass('hide');
     }else{
        $("#noproducts").addClass('hide');
     }
        
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
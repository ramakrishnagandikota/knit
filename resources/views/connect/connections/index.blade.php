
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
<form action="{{url('connect/my-connections')}}" method="GET">
<div class="rounded rounded-pill">
<div class="input-group" style="margin-bottom: 1px;">
<input type="search" id="searchconnections" name="search" placeholder="Search for my connections..." aria-describedby="button-addon1" value="{{$search}}" class="form-control border-0">
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
<h5 class="m-b-25 theme-heading">My connections</h5>
</div>
<div class="col-lg-12">
<div class="row users-card">
@if($friends->count() > 0)
@foreach ($friends as $friend)
<?php 
$follow = App\Models\Follow::where('user_id',Auth::user()->id)->where('follow_user_id',$friend->user_id)->count();

	if($friend->picture){
		$picture = $friend->picture;
	}else{
		$picture = 'https://via.placeholder.com/150?text='.$friend->first_name;
	}

?>

<div class="col-lg-4 col-xl-3 col-md-4 hidethis sectionContent friends @if($follow == 1) followers @endif " id="friend{{$friend->user_id}}">
	<div class="rounded-card user-card">
		<div class="card">
			<div class="img-hover">
			<img class="img-fluid img-radius p-10" src="{{$picture}}" alt="round-img">
			<div class="img-overlay img-radius"> 
				<span>
			        <a href="javascript:;" class="btn btn-sm btn-primary unfriend" data-toggle="tooltip" data-placement="top" title="Unfriend"data-popup="lightbox"  data-id="{{$friend->user_id}}" > <i class="fa fa-user-times"></i></a>
					
					@if($follow == 1)
			        <a href="javascript:;" id="follow{{$friend->user_id}}" class="btn btn-sm btn-primary unfollow" data-id="{{$friend->user_id}}" data-toggle="tooltip" data-placement="top" title="Unfollow" ><i class="fa icofont icofont-undo"></i></a>
			        @else
					<a href="javascript:;" id="follow{{$friend->user_id}}" class="btn btn-sm btn-primary follow" data-id="{{$friend->user_id}}" data-toggle="tooltip" data-placement="top" title="Follow" ><i class="fa icofont icofont-ui-social-link"></i></a>
			        @endif
			    </span>
			</div>
			</div>
		<div class="user-content"> <a href="{{url('connect/profile/'.$friend->username.'/'.$friend->enc_id)}}"><h4 class="">{{ucfirst($friend->first_name)}} {{strtolower($friend->last_name)}}</h4></a>
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
@else

@endif
<div id="noproducts" class="col-md-12 text-center hide" style="margin:auto;">No connections to show for the search</div>

</div>

<div>
{{$friends->links()}}
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
		updateContentVisibility();

		$("#collection-filter :checkbox").click(updateContentVisibility);


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
				$("#friend"+id).remove();
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
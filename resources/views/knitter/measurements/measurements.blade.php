@extends('layouts.knitterapp')
@section('title','Knitter Dashboard')
@section('content')
@if(session('message'))
<div class="alert alert-success">{{session('message')}}</div>
@endif


<div class="pcoded-wrapper" id="dashboard">
  <div class="pcoded-content">
      <div class="pcoded-inner-content">
          <div class="main-body">
              <div class="page-wrapper">
                  <div class="page-body">
                     <div class="row">
                         <div class="col-lg-12">
<section class="section-b-space ratio_asos">
<div class="collection-wrapper">
<div class="container-fluid">
<div class="row">
<div class="collection-content col">
<div class="page-main-content">
<div class="row">
<div class="col-sm-12">
  <div class="collection-product-wrapper">
      <div class="product-wrapper-grid">
          <div class="row card-bg justify-content-center">
              <div class="col-lg-4">
                  <h5 class="theme-heading page-header-title f-w-600">Measurement profile</h5></div>
              <div class="col-lg-8 m-b-10">
                  <button class="btn waves-effect pull-right waves-light btn-primary theme-outline-btn" data-toggle="modal" data-target="#myModal"><i class="icofont icofont-plus"></i>Add measurement profile</button>
              </div>

@if($meas->count() > 0)
    @foreach($meas as $ms)

    <?php 
    if($ms->user_meas_image){
      $img = $ms->user_meas_image;
    }else{
      $img = 'https://via.placeholder.com/200X250';
    }
    ?>
              <div class="col-xl-2 col-md-6 col-grid-box measurementbox id_{{$ms->id}}" id="card{{$ms->id}}">
                  <div class="product-box">
                      <div class="img-wrapper">
                          <div class="front">
                              <a href="#"><img src="{{$img}}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                          </div>

                      </div>
                      <div class="product-detail">
                          <div>
                              <a href="{{url('knitter/measurements/edit/'.base64_encode($ms->id))}}"><h5 class="m-t-10 min-height-heading">{{ $ms->m_title ? ucwords($ms->m_title) : 'No Name' }}</h5></a>
                              <div class="editable-items">
                                  <a href="{{url('knitter/measurements/edit/'.base64_encode($ms->id))}}" ><i class="fa fa-pencil"></i></a>
                                  <i class="fa fa-trash" data-toggle="modal" data-dismiss="modal" data-target="#delete-Modal" data-id="{{base64_encode($ms->id)}}"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              
@endforeach

            @else

            <div class="col-lg-12 col-xl-12 col-md-9">
            <div class="card custom-card skew-card">
                    <div class="user-content card-bg m-l-40 m-r-40 m-b-40">
                            <img src="{{asset('resources/assets/files/assets/images/arrow.png') }}" id="arrow-img"> 
                        <h3 class="m-t-40 text-muted">Let's create your first measurement profile!</h3>
                        <h4 class="text-muted m-t-10 m-b-30">We'll take your measurements and get you ready to generate a custom pattern!</h4>
                    </div>
                
            </div>
        </div>

            @endif

          </div>
      </div>

  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
                         </div>
                      </div>
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
  .custom-control-label::before
            {
                border: .8px solid #0d665c!important;
                background-color: transparent;
            }
            .list-group-item {

                padding: .75rem 0rem;
            }

            select option:hover,
    select option:focus,
    select option:active {
        background: linear-gradient(#000000, #000000);
        background-color: #000000 !important; /* for IE */
        color: #ffed00 !important;
    }
    a:hover{text-decoration: none;}
</style>
<!-- Custom js -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/KnitfitEcommerce/assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/KnitfitEcommerce/assets/css/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/KnitfitEcommerce/assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/files/assets/css/e-commerce.css') }}">
        <!-- Theme css -->
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/KnitfitEcommerce/assets/css/color17.css') }}" media="screen" id="color">
<link rel="stylesheet" type="text/css" href="{{ asset('resources/assets/KnitfitEcommerce/assets/css/left-menu.css') }}">

<!-- slick js-->
<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/slick.js') }}"></script>
<!-- menu js-->
<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/menu.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/lazysizes.min.js') }}"></script>

<script src="{{ asset('resources/assets/KnitfitEcommerce/assets/js/script.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/assets/js/script.js')}}"></script>

<script type="text/javascript">
  $(function(){
	  

    $(document).on('click','.getId',function(){

      var id = $(this).attr('data-id');
      $(".delete-card").attr('data-id',id);
      $("#del_id").val(atob(id));
    });

    $(document).on('click','.delete-card',function(){
      var id = $("#del_id").val();
      
      if(id != 0){
        $(".loading").show();
        $.get( "{{url('knitter/measurements/delete')}}/"+id, function( data ) {
          setTimeout(function(){ $(".loading").hide(); },1000);
          if(data == 0){
            $(".id_"+id).remove();
            if($(".measurementbox").length  == 0){
              $("#nomeasurements").removeClass('hide');
            }
            Swal.fire(
                      'Great!',
                      'Measurement profile removed successfully.',
                      'success'
                    )
          }else{
            Swal.fire(
                      'Oops!',
                      'Unable to remove Measurement profile',
                      'error'
                    )
          }
          
        });
      }else{
        Swal.fire(
                  'Oops!',
                  'Unable to delete.Please refresh the page and try again',
                  'error'
                )
      }
      
    });


//Notifi('fa-check','Success','Good boy');

    setTimeout(function(){ $('.alert-success').hide() },4000);

    $(document).on('change','#file-upload-form',function(e){
  e.preventDefault();
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  }); 
  
    $.ajax({
      url: "{{url('knitter/upload-measurement-picture')}}",
      type: "POST",
      data:  new FormData(this),
      beforeSend: function(){ 
        $(".loading").show();
      },
      contentType: false,
      processData:false,
      success: function(data)
        {
          if(data.path != 0){
        //alert(data.path)
             $("#file-image").attr('src',data.path);
            $("#file-image1").attr('src',data.path);
            $("#imageurl").val(data.path);
            $("#imageurl1").val(data.path);
      //setTimeout(function(){ location.reload(); },1000);
            //swal('Success','Profile picture changed sucessfully','success');
          }else{
            //swal('Fail','Unable to upload file , Try again after some time.','error');
          }
        },
        complete : function(){
        $(".loading").hide();
        },
        error: function() 
        {
        }           
     });

});


    $(document).on('click','#submit',function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    }); 
        var measurement_name = $("#measurement_name").val();
    
        var er = [];
        var cnt = 0;
        
        if(measurement_name == ""){
            $(".measurement_name").css('color','red').html('Please enter measurement name.');
            er+=cnt+1;
        }else{
            $(".measurement_name").css('color','').html('');
        }
    

        
        
        if(er != 0){
            return false;
        }

        //var name = localStorage.getItem('measurement_name');
        //alert(name);

        localStorage.setItem('m_title',measurement_name);
        window.location.assign('{{url("knitter/add-measurementset")}}');
        
     /*   var Data = $("#insert-measurements").serializeArray();
    ////alert(JSON.stringify(Data))
        $.ajax({
          url : 'url("knitter/create-measurements")',
          type : 'POST',
          data : Data,
          beforeSend : function(){

          },
          success : function(res){
        //alert(res)
            if(res.status == 'success'){
              window.location.assign(' url("knitter/measurements/edit")'+'/'+res.id);
            }else{
              alert('unable to upload measurement.Try again later.');
            }
          },
          complete : function(){

          }
        }); */
    });

  });


   function Notifi(icon,m,msg){

     $.notify({
            icon: 'fa '+icon,
            title: m+'!',
            message: msg
        },{
            element: 'body',
            position: null,
            type: "info",
            allow_dismiss: true,
            newest_on_top: true,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 10000,
            style: 'bootstrap',
            delay : 5000,
            animate: {
                enter: 'animated fadeInUp',
                exit: 'animated fadeOutDown'
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
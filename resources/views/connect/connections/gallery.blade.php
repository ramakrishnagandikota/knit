@extends('layouts.connect')
@section('title','My Gallery')
@section('content')

 <!-- Page-body start -->
<div class="page-body m-t-15">
           <!-- Page body start -->
<div class="page-body gallery-page">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
             <a href="#accordion1" class="list-group-item list-group-item f-w-600" style="margin-bottom: 11px;" data-toggle="collapse" data-parent="#MainMenu"> Filter photos <i class="fa fa-caret-down pull-right m-t-5"></i></a>
             <div class="collapse show" id="accordion1">
                 <div class="list-group-item" style="border-bottom: none;">
                     <div class="col-lg-12">
                                     <div class="skills-mutliSelect" id="collection-filter">
                                         <ul>
                                         <label class="container">All
                                             <input type="checkbox" value="all">
                                             <span class="checkmark"></span>
                                         </label>
                                         <label class="container">Posted by me
                                             <input type="checkbox" value="self_posted">
                                             <span class="checkmark"></span>
                                         </label>
                                       <!--  <label class="container">Tagged in
                                         <input type="checkbox" value="tagged_in">
                                             <span class="checkmark"></span>
                                         </label> -->
                                         <label class="container">My project photos
                                         <input type="checkbox" value="my_project">
                                             <span class="checkmark"></span>
                                             </label>
                                         </ul>
                                     </div>
                         </div>
                     </div>
             </div>
            </div>
         </div>
        <!-- image grid -->
        <div class="col-sm-9">
            <!-- Image grid card start -->
            <div class="card">
                <!-- <div class="card-header">
                    <h5>Image Grid</h5>
                </div> -->

                <div class="fbphotobox m-10 text-center">
    	@if($timeline_images->count() > 0)
	    	@foreach($timeline_images as $ti)
	        <a class="self_posted all hide sectionContent"><img class="photo" fbphotobox-src="{{ $ti->image_path }}" alt="Dummmy Image<br>Very Coool!" src="{{ $ti->image_path }}"/></a>
	        @endforeach
        @endif

        @if($project_images->count() > 0)
	    	@foreach($project_images as $pi)
	        <a class="my_project all hide sectionContent"><img class="photo" fbphotobox-src="{{ $pi->image_path }}" alt="Dummmy Image<br>Very Coool!" src="{{ $pi->image_path }}"/></a>
	        @endforeach
        @endif
                    <div style="color: #bbd6bb;font-size: 16px;text-decoration: underline;"><a href="javascript:;" id="show-more">Show more</a></div>
                </div>
            </div>
            <!-- Image grid card end -->
        </div>
    </div>
</div>
                        <!-- Page body end -->
</div>
@endsection
@section('footerscript')
<style>
    
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
        border: 5px solid #0d665b;
    }
    .fbphotobox-container-left{margin-left: -4px;}
    .fbphotobox-main-container{margin-top: 50px;}
    .fbphotobox-close-btn{position: absolute;right: 4px;top: 0px;background-color: black;}
    .hide{
    	display: none;
    }
</style>
<script type="text/javascript">
  var CLOSE = '{{asset('resources/assets/marketplace/images/close.png')}}';
</script>

<script src="{{ asset('resources/assets/files/assets/pages/waves/js/waves.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/modernizr/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/modernizr/js/css-scrollbars.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/files/bower_components/lightbox2/js/lightbox.min.js') }}"></script>

    <link href="{{ asset('resources/assets/marketplace/css/fbphotobox.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('resources/assets/marketplace/js/fbphotobox.js') }}"></script>

    <script>
    	var sections = $('.sectionContent');
        $(document).ready(function() {
        	
        	updateContentVisibility();

            $(".fbphotobox img").fbPhotoBox({
                rightWidth: 0,
                leftBgColor: "black",
                rightBgColor: "white",
                footerBgColor: "black",
                overlayBgColor: "#222",
                containerClassName: 'fbphotobox',
                imageClassName: 'photo',
                onImageShow: function() {
                    // $(".fbphotobox img").fbPhotoBox("addTags",
                    //         [{x:0.3,y:0.3,w:0.3,h:0.3}]
                    // );
                  // $(".fbphotobox-image-content").append('<div style="background-color:black"></div>');
                }
            });
            
            var x = 3;
var totalImages = $(".fbphotobox a").length;
//$(".fbphotobox img").hide();

$(".fbphotobox a:lt("+x+")").removeClass('hide');

$(document).on('click','#show-more',function(){
	var hidden = $(".fbphotobox a.hide").length;
	if(x < hidden){
		x = 3;
	}else{
		x = hidden;
	}
	$(".fbphotobox a.hide:lt("+x+")").removeClass('hide');

	setTimeout(function(){
    var hiddennew = $(".fbphotobox a.hide").length;
    if(hiddennew == 0){
      $("#show-more").addClass('hide');
    }
  },2000);
});


$("#collection-filter :checkbox").click(updateContentVisibility);

        });


function updateContentVisibility(){
    var checked = $("#collection-filter :checkbox:checked");
    //if(sections.length == 0){
               
            //}
    if(checked.length){
        sections.addClass('hide');
        checked.each(function(){
            $("." + $(this).val()).removeClass('hide');

        });
    } else {
        //sections.removeClass('hide');
    }

     if ( $("div.sectionContent:visible").length === 0){
        $("#noproducts").removeClass('hide');
     }else{
        $("#noproducts").addClass('hide');
     }
        
}
    </script>

@endsection
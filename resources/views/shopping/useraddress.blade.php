<section class="regular slider" id="">
@if($address)
<?php $i=0; ?>
@foreach($address as $add)

<div class="col-sm-4 col-md-4 col-xs-12 col-lg-4">
    <div class="box">
        <div class="box-title">
            <h3 class="p-l-10">
<div class="form-radio radio radio-inline" id="radio">
    <label>
        <input type="radio" @if($i ==0) checked @endif name="user_address" id="local-pickup" value="{{$add->id}}">
        <i class="helper"></i>
    </label>
</div>

             {{ucwords($add->first_name)}} {{ucwords($add->last_name)}} </h3><a href="#">Edit</a></div>
        <div class="box-content">
            <h6>{{$add->address}},{{$add->city}}</h6>
            <h6>{{$add->email}}</h6>
            <h6 style="color: #0d665c;font-weight: bold;">{{ ($add->is_default == 1) ? 'Default' : ''  }}</h6></div>
    </div>
</div>
<?php $i++; ?>
@endforeach
@else
<div style="margin: auto;">No address found. </div>
@endif

 
</section>

<style type="text/css">
	#radio .helper::after, #radio .helper::before{
		top: -8px !important;
	}
    .slider {
        width: 100%;
    }

    .slick-slide {
      margin: 0px 20px;
    }
.slick-prev, .slick-next{
        background: #0d665c !important;
    border-radius: 13px !important;
}
    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }
    
    .slick-active {
      opacity: 1;
    }

    .slick-current {
      opacity: 1;
    }
</style>
<script type="text/javascript">
    $(".regular").slick({
        dots: false,
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 3
    });
</script>
@if($address)
<?php $i=0; ?>
@foreach($address as $add)
<div class="col-sm-4">
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
            <h6><a href="#">Set as default </a></h6></div>
    </div>
</div>
<?php $i++; ?>
@endforeach
@else
<div style="margin: auto;">No address found. </div>
@endif

<style type="text/css">
	#radio .helper::after, #radio .helper::before{
		top: -8px !important;
	}
</style>

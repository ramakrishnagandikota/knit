@extends('layouts.admin')
@section('breadcrum')
<div class="col-md-12 col-12 align-self-center">
    <h3 class="text-themecolor">Dashboard</h3>
    <ol class="breadcrumb" style="position: absolute;right: 0;top: 12px;">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
    </ol>
</div>
@endsection

@section('section1')



 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Coming soon</h4>
                               <!-- <ul class="list-inline text-right">
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5 text-inverse"></i>iPhone</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5 text-info"></i>iPad</h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-circle m-r-5 text-success"></i>iPod</h5>
                                    </li>
                                </ul>
                                <div id="morris-area-chart"></div>-->
                            </div> 
                        </div>
                    </div>
                    <div class="clearfix"></div>

@endsection

@section('section2')

@endsection

@section('footerscript')


<script type="text/javascript">
	$(function(){

	});
</script>
@endsection
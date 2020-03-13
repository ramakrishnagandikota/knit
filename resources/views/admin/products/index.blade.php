@extends('layouts.admin')
@section('breadcrum')
<div class="col-md-12 col-12 align-self-center">
    <h3 class="text-themecolor">Patterns</h3>
    <ol class="breadcrumb" style="position: absolute;right: 0;top: 12px;">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Patterns</li>
    </ol>
</div>
@endsection

@section('section1')
<div class="card col-12">
                            <div class="card-body">

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @if(Session::has('fail'))
        <div class="alert alert-success">
            {{Session::get('fail')}}
        </div>
    @endif

                                <!-- 
<a class="btn waves-effect waves-light btn-success pull-right" href="{{url('admin/add-new-pattern')}}">Add New Pattern</a> -->

<div class="pull-left"> 
    <p class="text-left">Apply Filters :  </p> 
<select class="form-control" onchange="changeTabledata(this.value)" id="filter">
    <option value="all">All</option>
    <option value="active">Active</option>
    <option value="inactive">InActive</option>
</select>
</div>

 <div class="btn-group pull-right">
    


          <button type="button" class="btn btn-success dropdown-toggle waves-effect waves-light " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Add New Product
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{url('admin/add-new-pattern')}}">Add Pattern</a>
            <a class="dropdown-item" href="#">Add Yarn</a>
          </div>
        </div>
<div class="clearfix"></div>

<div class="table-responsive">
    <table id="myTable" class="table table-bordered table-striped">
        <thead>
            <tr>
            	<th>Id</th>
                <th>Name</th>
                <th>Price($)</th>
                <th>Sale Price($)</th>
                <th>Sku</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php $i=1; ?>
        	@foreach($products as $da)
            <tr>
                <td>{{$i}}</td>
                <td>{{Str::limit($da->product_name,20)}}</td>
                <td>@if($da->price == 0) FREE @else {{$da->price}} @endif</td>
                <td>@if($da->sale_price == 0) NO @else {{$da->sale_price}} @endif</td>
                <td>{{$da->sku}}</td>
                <td>@if($da->status == 1) <span style="color:green;">Active</span> @else <span style="color: red;"> In Active</span> @endif</td>
                <td>
                	<a href="{{url('admin/products-edit/'.$da->pid)}}" class="fa fa-pencil" data-toggle="tooltip" title="Edit"></a> | <a href="javascript:;" data-toggle="tooltip" title="Delete" class="fa fa-trash-o delete-product" data-id="{{$da->id}}"></a> | <a href="{{url('admin/create-pattern/'.$da->pid)}}" class="mdi mdi-chemical-weapon"  data-toggle="tooltip" title="Setup Pattern Template" ></a>
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
</div>
                            </div>
                        </div>

@endsection

@section('section2')

@endsection

@section('footerscript')
    <script src="{{ asset('resources/assets/connect/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>

<script type="text/javascript">
	$(function(){
        var stor = localStorage.getItem('filter');
        $("select#filter").val(stor);


		$('#myTable').DataTable();

        $(document).on('click','.delete-product',function(){
            var id = $(this).attr('data-id');
            if(confirm('Are you sure want to remove this product ?')){
                $(".loadings").show();
                $.get('{{url("admin/delete-product")}}/'+id,function(res){
                    if(res.status == 'Success'){
                        location.reload();
                    }else{
                        alert('unable to remove product , Try again after some time.');
                    }
                    setTimeout(function(){ $(".loadings").hide(); },1000);
                });
            }
        });
	});

    function changeTabledata(val){
        localStorage.setItem('filter',val);
            if(val == 'all'){
                window.location.assign('{{url("admin/browse-patterns")}}/'+val);
            }else if(val == 'active'){
                window.location.assign('{{url("admin/browse-patterns")}}/'+val);
            }else{
                window.location.assign('{{url("admin/browse-patterns")}}/'+val);
            }
    }
</script>
@endsection
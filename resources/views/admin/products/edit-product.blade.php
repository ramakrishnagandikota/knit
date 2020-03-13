@extends('layouts.admin')
@section('breadcrum')
<div class="col-md-12 col-12 align-self-center">
    <h3 class="text-themecolor">Add Pattern</h3>
    <ol class="breadcrumb" style="position: absolute;right: 0;top: 12px;">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Add Pattern</li>
    </ol>
</div>
@endsection

@section('section1')
<div class="card col-md-12 col-lg-12 col-xlg-12 col-sm-12 col-xs-12">

    <div class="progress m-t-20">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>

    <div class="">
        <div class="card-body">
            
        <form class="form-horizontal" id="product-insert">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$product->id}}">
            <div class="step">

                <span class="steptext">Step 1</span>
      
    <h4>Enter Product Details</h4>
    <hr>
                
            <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Design Type*</label>
          <div class="col-sm-7">
              <select  name="sub_category_name" id="sub_category_name" class="form-control" required>
                    <option value="">Please Select Design Type</option>
                    @foreach($subcategory as $sub)
                    <option value="{{$sub->id}}" @if($product->design_type == $sub->id) selected @endif >{{$sub->subcat_name}}</option>
                    @endforeach
                  </select>
                  <div class="clearfix"></div>
                  <span>This Design Type is used for differentiating armhole shaping measurements for pattern.</span>
          </div>
      </div>

      <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Product Name*</label>
          <div class="col-sm-7">
              <input type="text" name="name" id="name" class="form-control" required placeholder="Please enter product name" value="{{$product->product_name}}" >
          </div>
      </div>

            </div>

            <div class="step">

                <span class="steptext"> Step 2</span>
            <h4>Designer recommendations</h4>
            <hr>    
                  
                        <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Skill Level*</label>
                    <div class="col-sm-7">
                        <select name="skill_level" required id="skill_level" class="form-control">
                        <option value="0">Please select skill level</option>
                        <option value="Basic" @if($product->skill_level == 'Basic') selected @endif >Basic</option>
                        <option value="Easy" @if($product->skill_level == 'Easy') selected @endif >Easy</option>
                        <option value="Intermediate" @if($product->skill_level == 'Intermediate') selected @endif >Intermediate</option>
                        <option value="Complex" @if($product->skill_level == 'Complex') selected @endif >Complex</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Product Type*</label>
                    <div class="col-sm-7">
                        <select name="is_custom" required id="is_custom" class="form-control">
                        <option value="" disabled >Please select type of product</option>
                        <option value="1" @if($product->is_custom == 1) selected @endif >Custom</option>
                        <option value="0" @if($product->is_custom == 0) selected @endif >Non Custom</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Recommended yarn*</label>
                    <div class="col-sm-7">
                        <input type="text" name="recommended_yarn" required id="recommended_yarn" class="form-control" value="{{$product->recommended_yarn}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Recommended fiber type*</label>
                    <div class="col-sm-7">
                        <input type="text" name="recommended_fiber_type" id="recommended_fiber_type" class="form-control" required  value="{{$product->recommended_fiber_type}}">
                    </div>
                </div>
               

                

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Recommended yarn weight*</label>
                    <div class="col-sm-7">
                        <select name="recommended_yarn_weight" id="recommended_yarn_weight"  required class="form-control" >
                        <option value="Lace" @if($product->recommended_yarn_weight == 'Lace') selected @endif >Lace</option>
                        <option value="Super Fine" @if($product->recommended_yarn_weight == 'Super Fine') selected @endif >Super Fine</option>
                        <option value="Fine" @if($product->recommended_yarn_weight == 'Fine') selected @endif >Fine</option>
                        <option value="Light" @if($product->recommended_yarn_weight == 'Light') selected @endif >Light</option>
                        <option value="Meduim" @if($product->recommended_yarn_weight == 'Meduim') selected @endif >Meduim</option>
                        <option value="Bulky" @if($product->recommended_yarn_weight == 'Bulky') selected @endif >Bulky</option>
                        <option value="Super Bulky" @if($product->recommended_yarn_weight == 'Super Bulky') selected @endif >Super Bulky</option>
                        <option value="Jumbo" @if($product->recommended_yarn_weight == 'Jumbo') selected @endif >Jumbo</option>
                        </select>
                    </div>
                </div>

  

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Additional tools needed</label>
                    <div class="col-sm-7">
                        <input type="text" name="additional_tools" id="additional_tools" class="form-control" value="{{$product->additional_tools}}">
                    </div>
                </div>

                

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Needle size*</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="recommended_needle_size" id="recommended_needle_size" required >
                            <option selected>Select needle size</option>
                            @foreach($needlesizes as $ns)
                                <option value="{{$ns->id}}" @if($product->recommended_needle_size == $ns->id) selected @endif >US {{$ns->us_size}}  {{ $ns->mm_size ? '- '.$ns->mm_size.' mm' : '' }}</option>
                            @endforeach
                          </select>
                    </div>
                </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Recommended units of measure</label>
            <div class="col-sm-7">
                <select class="form-control" id="designer_recommended_uom" name="designer_recommended_uom">
                  <option value="0">Recommended units of measure</option>
                  <option value="in" @if($product->designer_recommended_uom == 'in') selected @endif >Inches</option>
                  <option value="cm" @if($product->designer_recommended_uom == 'cm') selected @endif >Centimeters</option>
                </select>
            </div>
        </div>

        <div class="form-group row inches">
            <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Recommended ease preference</label>
            <div class="col-sm-7">
                <select class="form-control" id="designer_recommended_ease_in" name="designer_recommended_ease_in">
                  <option value="0">Select value (inches)</option>
                  @for($j=1;$j<= 20;$j+= 0.25)
                      <option value="{{$j}}" @if($product->designer_recommended_ease_in == $j) selected @endif >{{$j}}"</option>
                  @endfor
                </select>
            </div>
        </div>

        <div class="form-group row inches">
            <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Recommended stitch gauge</label>
            <div class="col-sm-7">
                <select class="form-control" id="recommended_stitch_gauge_in" name="recommended_stitch_gauge_in">
                  <option value="0">Select value (inches)</option>
                  @foreach($gaugeconversion as $gc2)
                  <option value="{{$gc2->id}}" @if($product->recommended_stitch_gauge_in == $gc2->id) selected @endif  >{{$gc2->row_gauge_inch .' / 1 inches'}}</option>
                  @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row inches">
            <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Recommended row gauge</label>
            <div class="col-sm-7">
                <select class="form-control" id="recommended_row_gauge_in" name="recommended_row_gauge_in">
                  <option value="0">Select value (inches)</option>
                  @foreach($gaugeconversion as $gc2)
                  <option value="{{$gc2->id}}" @if($product->recommended_row_gauge_in == $gc2->id) selected @endif  >{{$gc2->row_gauge_inch .' / 1 inches'}}</option>
                  @endforeach
                </select>
            </div>
        </div>

        
        <div class="form-group row cms hide">
            <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Recommended ease preference</label>
            <div class="col-sm-7">
                <select class="form-control" id="designer_recommended_ease_cm" name="designer_recommended_ease_cm">
                  <option value="0">Select value (cm)</option>
                  @for($i=1;$i <= 20;$i++)
                  <option value="{{$i}}" @if($product->designer_recommended_ease_cm == $i) selected @endif >{{$i}} cm</option>
                  @endfor
                </select>
            </div>
        </div>

        <div class="form-group row cms hide">
            <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Recommended stitch gauge</label>
            <div class="col-sm-7">
                <select class="form-control" id="recommended_stitch_gauge_cm" name="recommended_stitch_gauge_cm">
                  <option value="0">Select value (cm)</option>
                  @foreach($gaugeconversion as $gc3)
                  <option value="{{$gc3->id}}" @if($product->recommended_stitch_gauge_cm == $gc3->id) selected @endif >{{$gc3->rows_10_cm .' / 10cm'}}</option>
                  @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row cms hide">
            <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Recommended row gauge</label>
            <div class="col-sm-7">
                <select class="form-control" id="recommended_row_gauge_cm" name="recommended_row_gauge_cm">
                  <option value="0">Select value (cm)</option>
                  @foreach($gaugeconversion as $gc3)
                  <option value="{{$gc3->id}}" @if($product->recommended_row_gauge_cm == $gc3->id) selected @endif >{{$gc3->rows_10_cm .' / 10cm'}}</option>
                  @endforeach
                </select>
            </div>
        </div>

               
            </div>


      <div class="step">
        <span class="steptext">Step 3</span>
        <h4>Product Information</h4>

        

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Product Description*</label>
                    <div class="col-sm-7">
                        <textarea type="text" name="description" id="description" class="form-control" required >{{$product->product_description}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Details*</label>
                    <div class="col-sm-7">
                        <textarea type="text" name="short_description" required id="short_description" class="form-control">{{$product->short_description}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Additional Information*</label>
                    <div class="col-sm-7">
                        <textarea type="text" name="additional_information" required id="additional_information" class="form-control">{{$product->additional_information}}</textarea>
                    </div>
                </div>
               
                

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">SKU*</label>
                    <div class="col-sm-7">
                        <input type="text" name="sku" id="sku"  required class="form-control" value="{{$product->sku}}">
                    </div>
                </div>




                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Product GoLive Date</label>
                    <div class="col-sm-7">
                        <input type="text" name="set_product_new_to_date" placeholder="Please select date" id="set_product_new_to_date" class="form-control" value="{{date('m/d/Y',strtotime($product->product_go_live_date))}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Status*</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="status" id="status" required >
                              <option value="" disabled >Please select status</option>
                          <option value="0" @if($product->status == 0) selected @endif >In Active</option>
                            <option value="1" @if($product->status == 1) selected @endif >Active</option>
                          </select>
                    </div>
                </div>


         <div class="form-group row">
          <?php 
          $exp = explode(',',$product->garment_type);
          ?>
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Garment type*</label>
                    <div class="col-sm-7">
                       <select class="select" multiple="multiple" required id="garment_type" name="garment_type[]" style="width: 100%;">
                @foreach($garmentType as $gt)
                <option value="{{ $gt->slug }}" @for($k=0;$k<count($exp);$k++) @if($exp[$k] == $gt->slug) selected @endif @endfor >{{ $gt->name }}</option>
                @endforeach
                </select>
                    </div>
                </div>

                <div class="form-group row">
                  <?php 
          $exp1 = explode(',',$product->garment_construction);
          ?>
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Garment construction*</label>
                    <div class="col-sm-7">
                       <select class="select" multiple="multiple" required id="garment_construction" name="garment_construction[]" style="width: 100%;">
                @foreach($garmentConstruction as $gc)
                <option value="{{ $gc->slug }}" @for($l=0;$l<count($exp1);$l++) @if($exp1[$l] == $gc->slug) selected @endif @endfor >{{ $gc->name }}</option>
                @endforeach
                </select>
                    </div>
                </div>
      </div>


      <div class="step">

            <span class="steptext"> Step 4</span>
      <h4>Measurements</h4>
      <hr>

      <button class="btn btn-primary pull-right" id="addNew">Add new variable</button>
      <br>

<table class="table table-responsive-md table-sm table-bordered" >
     <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image </th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="tbody">
      @if($measurements->count() > 0)
      <?php $i=1; ?>
      @foreach($measurements as $ms)
      <?php 
      $mname = str_replace('_',' ',ucfirst($ms->measurement_name));
      ?>
      <tr class="trs" id="trs{{$i}}">
        <td>{{$i}}<input type="hidden" name="measurement_id[]" value="{{$ms->id}}"></td>
        <td><input type="text" name="measurement_name[]" class="form-control" placeholder="Measurement Name" value="{{$mname}}" ></td>
        <td><input type="text" name="measurement_description[]" class="form-control" value="{{$ms->measurement_description}}" placeholder="Measurement Notes"></td>
        <td>
          <div class="row">
      <div class="col-md-9">
          <input type="file" id="uploadImage1" class="uploadImage" data-id="1" ><input type="hidden" name="measurement_image[]" id="measurement_image1">
      </div>
        <div class="col-md-3"><span class="mytooltip tooltip-effect-2"> <span class="tooltip-item">?</span> <span class="tooltip-content clearfix"> <img src="{{asset($ms->measurement_image) }}" />  <span class="tooltip-text">{{ucfirst($ms->measurement_description)}}</span></span> </span>
        </div>
        </div>
      </td>
        <td><a href="javascript:;" data-id="{{$i}}" data-mid="{{$ms->id}}" class="deleteM"><i class="fa fa-trash"></i></td>
      </tr>
      <?php $i++; ?>
      @endforeach
      @else
      <tr class="trs" id="trs1">
        <td>1<input type="hidden" name="measurement_id[]" value="0"></td>
        <td><input type="text" name="measurement_name[]" class="form-control" value="" placeholder="Measurement Name" ></td>
        <td><input type="text" name="measurement_description[]" class="form-control" value="" placeholder="Measurement Notes"></td>
        <td><input type="file" id="uploadImage1" class="uploadImage" data-id="1" ><input type="hidden" name="measurement_image[]" id="measurement_image1"></td>
        <td><a href="javascript:;" data-id="1" data-mid="0" class="deleteM"><i class="fa fa-trash"></i></td>
      </tr>
      @endif
    </tbody>
  </table>

    </div>

            <div class="step">

                    <span class="steptext"> Step 5</span>
            <h4>Enter Price</h4>
            <hr>
                
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Price</label>
                    <div class="col-sm-7">
                        <input type="number" name="price" id="price" class="form-control" required placeholder="Please enter price" value="{{$product->price}}" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Sale Price</label>
                    <div class="col-sm-7">
                        <input type="number" name="special_price" id="special_price" class="form-control" placeholder="Please enter sale price"  value="{{$product->sale_price}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Sale Price Start Date</label>
                    <div class="col-sm-7">
                        <input type="text" name="special_price_start_date" id="special_price_start_date" class="form-control" value="{{date('m/d/Y',strtotime($product->sale_price_start_date))}}">
                    </div>

                </div>


                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Sale Price End Date</label>
                    <div class="col-sm-7">
                        <input type="text" name="special_price_end_date" id="special_price_end_date" class="form-control" value="{{date('m/d/Y',strtotime($product->sale_price_end_date))}}">
                    </div>

                </div>

            </div>




        
        

        <div class="step">

                <span class="steptext"> Step 6</span>
      <h4>Images</h4>
      <hr>
            
       <input type="file" name="file[]" id="filer_input1" multiple="multiple">
            
      <div id="ajaxDiv"></div>


@if($product_images->count() > 0)
          <div class="jFiler-items jFiler-row">
    <ul class="jFiler-items-list jFiler-items-grid">
      @foreach($product_images as $pi)
        <li class="jFiler-item" data-jfiler-index="0" style="" id="image{{$pi->id}}">
            <div class="jFiler-item-container">
                <div class="jFiler-item-inner">
                    <div class="jFiler-item-thumb">
                        <div class="jFiler-item-thumb-image">
                          <img src="{{$pi->image_medium}}" draggable="false" style="margin-top: 0px !important;">
                        </div>
                    </div>
                    <div class="jFiler-item-assets jFiler-row">
                        <ul class="list-inline pull-right">
                            <li>
                                <a class="icon-jfi-trash deleteImage jFiler-item-trash-action" data-id="{{$pi->id}}"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endif

        </div>  

    </form>




    <div class="clearfix"></div>
 <div style="margin-top:30px;">
<button class="action back btn btn-info">Back</button>
<button class="action next btn btn-info">Next</button>
<button class="action submit btn btn-success" type="button" id="submit-product">Submit</button>
</div>   
        </div>
    </div>
</div>
@endsection

@section('section2')

@endsection

@section('footerscript')
<script type="text/javascript">
  var URL = '{{url("admin/product-images")}}';
  var PAGE = 'adminProducts';
  var URL1 = '{{url('admin/remove-product-image')}}';
</script>

<!-- select 2 -->
    <link href="{{asset('resources/assets/connect/assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('resources/assets/connect/assets/plugins/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{asset('resources/assets/connect/assets/plugins/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('resources/assets/connect/assets/plugins/multiselect/js/jquery.multi-select.js') }}"></script>
<link href="{{ asset('resources/assets/connect/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
<script src="{{ asset('resources/assets/connect/assets/plugins/moment/moment.js') }}"></script>
 <script src="{{ asset('resources/assets/connect/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>


<link href="{{ asset('resources/assets/files/assets/pages/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('resources/assets/files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />

<script src="{{ asset('resources/assets/files/assets/pages/jquery.filer/js/jquery.filer.min.js') }}"></script>
<script src="{{ asset('resources/assets/files/assets/pages/filer/project-images.fileupload.init.js') }}" type="text/javascript"></script>

<style type="text/css">
  .select2-container--default .select2-selection--multiple .select2-selection__clear{
    position: absolute;
    right: 0;
  }
  .jFiler-item .jFiler-item-container .jFiler-item-thumb img{
      margin-top: -136px !important;
    }
</style>

<script type="text/javascript">
    $(function(){

        $('#set_product_new_to_date,#special_price_start_date,#special_price_end_date').bootstrapMaterialDatePicker({ format: 'MM/DD/YYYY', weekStart : 0, time: false });

            /* ckeditor */
        
        $(document).on('click','#designer_recommended_uom',function(){
            var value = $(this).val();
            if(value == 'in'){
              $(".inches").removeClass('hide');
              $(".cms").addClass('hide');
            }else if(value == 'cm'){
              $(".inches").addClass('hide');
              $(".cms").removeClass('hide');
            }
        });


        
         $("#garment_type").select2({
            placeholder: "Please Select Garment Type",
            allowClear: true
        });
    
        $("#garment_construction").select2({
            placeholder: "Please Select Garment Construction",
            allowClear: true
        });
        
        $("#country_of_manufacture,#sub_category_name").select2();
        /* for multi select */




    });
</script>

<script>
    $(document).ready(function(){
    var current = 1;
    
    widget      = $(".step");
    btnnext     = $(".next");
    btnback     = $(".back"); 
    btnsubmit   = $(".submit");
 
    // Init buttons and UI
    widget.not(':eq(0)').hide();
    hideButtons(current);
    setProgress(current);
 
    // Next button click action
    btnnext.click(function(){
        if(current < widget.length){            
                   widget.show();           
                   widget.not(':eq('+(current++)+')').hide();
           setProgress(current); 
           }        
               hideButtons(current);    
       })   
       // Back button click action  
       btnback.click(function(){        
                if(current > 1){
            current = current - 2;
            btnnext.trigger('click');
        }
        hideButtons(current);
    });
        
    
    btnsubmit.click(function(){
        var Data = $("#product-insert").serializeArray();

        $.ajax({
           url : '{{ url("admin/update-product") }}',
           type : 'POST',
           data : Data,
            beforeSend : function(){
              $(".loadings").show();
            },
            success : function(res){

              if(res.status == 'Success'){
                Swal.fire(
                      'Great!',
                      'Product Added Successfully',
                      'success'
                    )
                setTimeout(function(){ window.location.assign('{{url("admin/browse-patterns")}}'); },2000);
              }else{
                Swal.fire(
                      'Oops!',
                      'Unable to add product, Try again after some time.',
                      'fail'
                    )
              }

            },
            complete : function(){
             setTimeout(function(){ $(".loadings").hide(); },1000) 
            }
        });
    });

$(document).on('click','#addNew',function(){
  var length = $('tr.trs').length;
  length = length + 1;
  var dd = '<tr class="trs" id="trs'+length+'"><td>'+length+'<input type="hidden" name="measurement_id[]" value="0"></td><td><input type="text" name="measurement_name[]" class="form-control" value="" placeholder="Measurement Name" ></td><td><input type="text" name="measurement_description[]" class="form-control" value="" placeholder="Measurement Notes"></td><td><input type="file" id="uploadImage'+length+'" class="uploadImage" data-id="'+length+'" ><input type="hidden" name="measurement_image[]" id="measurement_image'+length+'"></td><td><a href="javascript:;" data-id="'+length+'" data-mid="0" class="deleteM"><i class="fa fa-trash"></i></td></tr>';
  $("#tbody").append(dd);
});

$(document).on('click','.deleteM',function(){
  var id = $(this).attr('data-id');
  var mid = $(this).attr('data-mid');
  if(mid != 0){
    $.get('{{url("admin/delete-measurement")}}/'+mid);
  }
  $("#trs"+id).remove();
});


/* image upload */

$(document).on('change', '.uploadImage', function(){
  var id = $(this).attr('data-id');
  var name = document.getElementById("uploadImage"+id).files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("uploadImage"+id).files[0]);
  var f = document.getElementById("uploadImage"+id).files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

   form_data.append("file", document.getElementById("uploadImage"+id).files[0]);
   $.ajax({
    url:"{{url('admin/upload-image')}}",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('.loadings').show();
    },   
    success:function(data)
    {
     if(data){
      $("#measurement_image"+id).val(data.path);
     }
    },
    complete : function(){
      $('.loadings').hide();
    }
   });
  }
 });


$(document).on('click','.deleteImage',function(){
  var id = $(this).attr('data-id');
  if(confirm('Aer you sure want to delete this image ?')){
    $.post(URL1,{id:id},function(res){
    if(res.status == 'Success'){
      $("#image"+id).remove();
    }
  });
  }
});

});
 
// Change progress bar action
setProgress = function(currstep){
    var percent = parseFloat(100 / widget.length) * currstep;
    percent = percent.toFixed();
    $(".progress-bar")
        .css("width",percent+"%")
        .html(percent+"% Completed");       
}
 
// Hide buttons according to the current step
hideButtons = function(current){
    var limit = parseInt(widget.length); 
 
    $(".action").hide();
 
    if(current < limit) btnnext.show();     if(current > 1) btnback.show();
    if (current == limit) { btnnext.hide(); btnsubmit.show(); }
}

</script>
@endsection
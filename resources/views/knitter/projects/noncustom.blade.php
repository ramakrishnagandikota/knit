<!--Section for non-custom Patterns Starts here-->
<div class="card-block non-custom-pattern">
    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <!--First Accordion Starts here-->
            <div class="row theme-row m-b-10">
                <div class="card-header accordion active col-lg-12 col-sm-12" data-toggle="collapse" data-target="#non-custom-design">
                    <h5 class="card-header-text">Design
</h5><i class="fa fa-caret-down pull-right micro-icons"></i>
                </div>
            </div>
            <div class="card-block collapse show" id="non-custom-design">

                <div class="form-group row m-b-zero">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="col-form-label">Name
                            </label>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                                    @if($product_image)
                                    <input type="hidden" name="image" value="{{$product_image->image_medium}}">
                                    @endif
                                    <select  name="project_name" id="project_name" class="form-control form-control-default">
                                        <option value="0" selected>--Select Pattern--</option>
                                        @foreach($orders as $or)
                                        <option value="{{$product->product_name}}" @if($product->id == $or->pid) selected @endif >{{$product->product_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="project_name red hide">Project name is required.</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="col-form-label">Skill level
                            </label>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="skill_level" name="" value="{{$product->skill_level}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-12 p-15">
                        <div class="form-group">
                            <label class="col-form-label">Description
                            </label>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea readonly rows="3" cols="1" name="description" class="form-control" placeholder="">{{$product->product_description}}</textarea>
                                    <span class="description red hide">Description is required.</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of First Accordion-->

            <!--Second Accordion Starts here-->
            <div class="row theme-row m-b-10">
                <div class="card-header accordion col-lg-12" data-toggle="collapse" data-target="#yarn-n-tools">
                    <h5 class="card-header-text">Yarn and tools</h5>
                    <i class="fa fa-caret-down pull-right micro-icons"></i>
                </div>

            </div>
            <div class="card-block collapse" id="yarn-n-tools">
                <div class="row form-group">
                    <div class="col-md-12 m-t-20 grey-box p-15 m-b-custom">
                        <h5 class="m-b-10">Designer recommendations</h5>
                        <span class="m-b-30 f-12">Here's what the designer recommended for this pattern</span>
                        <div class="form-group grey-box row m-b-zero">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Recommended yarn
                                    </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="recommended_yarn"  value="{{$product->recommended_yarn}}" disabled>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Recommended fiber type
                                    </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="recommended_fiber_type" value="{{$product->recommended_fiber_type}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Recommended yarn weight
                                    </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="recommended_yarn_weight" value="{{$product->recommended_yarn_weight}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group grey-box row m-b-zero">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Recommended needle size
                                    </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="recommended_needle_size" value="{{$product->recommended_needle_size}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-form-label">Additional tools needed
                                        <span class="mytooltip tooltip-effect-2">
<span class="tooltip-item">?</span>
                                        <span class="tooltip-content clearfix">
<span class="tooltip-text" style="width: 100%;">List any additional items you needed for this project (i.e. tapestry needle, stitch markers…)</span>
                                        </span>
                                        </span>
                                    </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea disabled rows="1" cols="1" id="additional_tools" class="form-control" placeholder="">{{$product->additional_tools}}</textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-group row m-b-zero">
                    <div class="col-md-12 p-15">
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="m-b-10">Your choices</h5>
                                <span class="m-b-10 f-12">Note everything you used so you can make it again!</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row m-b-zero" id="yarn-row-noncustom">
                    <div class="col-lg-8 row-bg">
                        <h6 class="m-b-10">Yarn</h6>
                    </div>
                    <div class="col-lg-4 text-right row-bg">
                        <button type="button" class="btn small-btn add-yarn f-12 theme-outline-btn btn-primary waves-effect waves-light" id="noncustom"><i class="icofont icofont-plus f-12"></i>Add yarn</button>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group m-b-zero">
                            <label class="col-form-label">Yarn used
                                <span class="mytooltip tooltip-effect-2">
<span class="tooltip-item">?</span>
                                <span class="tooltip-content clearfix">
<span class="tooltip-text" style="width:100%">Enter the yarn you used for this pattern.</span>
                                </span>
                                </span>
                            </label>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="yarn_used1" name="yarn_used[]" value="">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label">Fiber type used
                                <span class="mytooltip tooltip-effect-2">
<span class="tooltip-item">?</span>
                                <span class="tooltip-content clearfix">
<span class="tooltip-text" style="width:100%">Enter the fiber content of the yarns used.</span>
                                </span>
                                </span>
                            </label>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="fiber_type1" name="fiber_type[]" value="">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label">Yarn weight used
                                <span class="mytooltip tooltip-effect-2">
<span class="tooltip-item">?</span>
                                <span class="tooltip-content clearfix">
<span class="tooltip-text" style="width:100%">Select the yarn weight from the dropdown.</span>
                                </span>
                                </span>
                            </label>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control" id="yarn_weight1" name="yarn_weight[]">
                                        <option value="Lace">Lace</option>
                                        <option value="Super Fine">Super Fine</option>
                                        <option value="Fine">Fine</option>
                                        <option value="Light">Light</option>
                                        <option value="Meduim">Meduim</option>
                                        <option value="Bulky">Bulky</option>
                                        <option value="Super Bulky">Super Bulky</option>
                                        <option value="Jumbo">Jumbo</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label">Colorway
                                <span class="mytooltip tooltip-effect-2">
<span class="tooltip-item">?</span>
                                <span class="tooltip-content clearfix">
<!-- <img src="../../files/assets/images/tooltip/yarn.jpg" alt="Ecluid.png"> -->
<span class="tooltip-text" style="width: 100%;">Please enter colorway</span>
                                </span>
                                </span>
                            </label>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="colourway1" name="colourway[]">

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label">Dye lot
                                <span class="mytooltip tooltip-effect-2">
<span class="tooltip-item">?</span>
                                <span class="tooltip-content clearfix">
<!-- <img src="../../files/assets/images/tooltip/yarn.jpg" alt="Ecluid.png"> -->
<span class="tooltip-text" style="width: 100%;">Please enter dye lot</span>
                                </span>
                                </span>
                            </label>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="dye_lot1" name="dye_lot[]">

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label">Skeins
                                <span class="mytooltip tooltip-effect-2">
<span class="tooltip-item">?</span>
                                <span class="tooltip-content clearfix">
<!-- <img src="../../files/assets/images/tooltip/yarn.jpg" alt="Ecluid.png"> -->
<span class="tooltip-text" style="width: 100%;">Please enter skeins</span>
                                </span>
                                </span>
                            </label>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="skeins" name="skeins[]">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row m-b-zero" id="needle-row-noncustom">
                    <div class="col-lg-8 row-bg">
                        <h6 class="m-b-10">Needle size</h6>
                    </div>
                    <div class="col-lg-4 text-right row-bg">
                        <button type="button" class="btn small-btn add-needle f-12 theme-outline-btn btn-primary waves-effect waves-light" id="noncustom"><i class="icofont icofont-plus f-12"></i>Add Needle</button>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="col-form-label">Select needle size
                                <span class="mytooltip tooltip-effect-2">
<span class="tooltip-item">?</span>
                                <span class="tooltip-content clearfix">
<span class="tooltip-text" style="width: 100%;">Select the needle size from the dropdown.</span>
                                </span>
                                </span>
                            </label>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control" id="needle_size" name="needle_size[]">
                                        <option selected>Select needle size</option>
                                        @foreach($needlesizes as $ns)
                                            <option value="{{$ns->id}}">US {{$ns->us_size}}  {{ $ns->mm_size ? '- '.$ns->mm_size.' mm' : '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!--End of Second Accordion-->

            <!--Third Accordion Starts here-->
            <div class="row theme-row m-b-10">
                <div class="card-header accordion col-lg-12" data-toggle="collapse" data-target="#gauge">
                    <h5 class="card-header-text">Gauge</h5>
                    <i class="fa fa-caret-down pull-right micro-icons"></i>
                </div>
            </div>
            <div class="card-block collapse" id="gauge">
                <div class="form-radio">
                    <h6 class="text-muted m-b-10">Unit of measurement</h6>
                    
                        <div class="radio radio-inline m-r-10">
                            <label>
                                <input type="radio" id="inches-non-custom" name="uom" checked="checked" value="in">
                                <i class="helper"></i>Inches
                            </label>
                        </div>
                        <div class="radio radio-inline">
                            <label>
                                <input type="radio" name="uom" id="cm-non-custom" value="cm">
                                <i class="helper"></i>Centimeters
                            </label>
                        </div>

                    
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-6 grey-box">
                        <label class="col-form-label f-w-600 black">Designer's gauge
                            <span class="mytooltip tooltip-effect-2">
<span class="tooltip-item">?</span>
                            <span class="tooltip-content clearfix">
<!-- <img src="../../files/assets/images/tooltip/Knitting-Needle-Sizes.jpg" alt="Ecluid.png"> -->
<span class="tooltip-text f-w-200 f-14" style="width: 100%;">The designer's gauge is only provided for the reference of curious knitters. Only your own gauge matters for custom patterns!</span>
                            </span>
                            </span>
                        </label>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Stitch gauge
                                    </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" id="sts-stitch-non-custom" class="form-control" placeholder="" disabled value="{{$product->recommended_stitch_gauge_in}} sts / 1 inches">

                                            <input type="text" id="cm-stitch-non-custom" class="form-control" placeholder="" disabled value="{{$product->recommended_stitch_gauge_cm}} sts / 10 cm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Row gauge
                                    </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input disabled type="text" id="sts-row-non-custom" class="form-control" placeholder="" value="{{$product->recommended_row_gauge_in}} sts / 1 inches">

                                            <input disabled type="text" id="cm-row-non-custom" class="form-control" placeholder="" value="{{$product->recommended_row_gauge_cm}} sts / 10 cm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label class="col-form-label f-w-600 black">Your gauge
                            <span class="mytooltip tooltip-effect-2">
<span class="tooltip-item">?</span>
                            <span class="tooltip-content clearfix">
<span class="tooltip-text f-w-200 f-14" style="width: 100%;">Use the dropdown to select the number of stitches per 4 inches or 10 cm. This is the minimum swatch size to get a good idea of your gauge and a well-fitting project!</span>
                            </span>
                            </span>
                        </label>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Stitch gauge
                                        <span class="mytooltip tooltip-effect-2">
<span class="tooltip-item">?</span>
                                        <span class="tooltip-content clearfix">
<span class="tooltip-text" style="width: 100%;">Stitch gauge refers to the number of stitches counted horizontally across your 4-inch or 10 cm swatch.</span>
                                        </span>
                                        </span>

                                    </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select class="form-control" id="sts-stitch-non-custom" name="stitch_gauge_in" >
                                                <option selected>Select value (inches)</option>
                                                @foreach($gaugeconversion as $gc2)
                            <option value="{{$gc2->id}}">{{$gc2->row_gauge_inch .' / 1 inches'}}</option>
                            @endforeach
                                            </select>

                                            <select class="form-control" id="cm-stitch-non-custom" name="stitch_gauge_cm">
                                                <option selected>Select value (cm)</option>
                                                 @foreach($gaugeconversion as $gc3)
                            <option value="{{$gc3->id}}">{{$gc3->rows_10_cm .' / 10cm'}}</option>
                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Row gauge
                                        <span class="mytooltip tooltip-effect-2">
<span class="tooltip-item">?</span>
                                        <span class="tooltip-content clearfix">
<span class="tooltip-text" style="width: 100%;">Row gauge refers to the number of stitches counted vertically across your 4-inch or 10 cm swatch.</span>
                                        </span>
                                        </span>
                                    </label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <select class="form-control" name="row_gauge_in" id="sts-row-non-custom">
                                                <option>Select value (inches)</option>
                                                @foreach($gaugeconversion as $gc2)
                            <option value="{{$gc2->id}}">{{$gc2->row_gauge_inch .' / 1 inches'}}</option>
                            @endforeach
                                            </select>

                                            <select class="form-control" name="row_gauge_cm" id="cm-row-non-custom" name="" >
                                                <option selected>Select value (cm)</option>
                                                @foreach($gaugeconversion as $gc3)
                            <option value="{{$gc3->id}}">{{$gc3->rows_10_cm .' / 10cm'}}</option>
                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--End of Third Accordion-->

            <!--Fourth Accordion Starts here-->
            <div class="row theme-row m-b-10">
                <div class="card-header accordion col-lg-12" data-toggle="collapse" data-target="#section4-NC">
                    <h5 class="card-header-text">Measurement profile and ease</h5>
                    <i class="fa fa-caret-down pull-right micro-icons"></i>
                </div>
            </div>
            <div class="card-block collapse" id="section4-NC">
                <div class="row form-group">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="col-form-label">
                                Reference a measurement profile
                                <span class="mytooltip tooltip-effect-2">
<span class="tooltip-item">?</span>
                                <span class="tooltip-content clearfix">
<span class="tooltip-text" style="width:100%">Add a measurement profile for reference--this will not affect the available sizes in an external or non-custom pattern.</span>
                                </span>
                                </span>
                            </label>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control" name="measurement_profile" id="sel1">
                                    <option value="0">Select measurement profile</option>
                                    @if($measurements->count() > 0)
                                        @foreach($measurements as $ms)
                                            <option value="{{$ms->id}}">For {{$ms->m_title}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="col-form-label">Your ease preference
                                <span class="mytooltip tooltip-effect-2">
<span class="tooltip-item">?</span>
                                <span class="tooltip-content clearfix">
<span class="tooltip-text" style="width:100%">Enter the amount of ease for reference. It will not affect pattern instructions in external or non-custom patterns.</span>
                                </span>
                                </span>
                            </label>
                            <div class="row">
                                <div class="col-md-12">
                                     <select id="inches-ease-prefer-non-custom" name="ease_in" class="form-control">
                                    <option value="0" selected disabled >Select value (inches)</option>
                                    @for($j=1;$j<= 20;$j+= 0.25)
                                        <option value="{{$j}}">{{$j}}"</option>
                                    @endfor
                                </select>

                                    <select id="sts-ease-prefer-non-custom" name="ease_cm" class="form-control">
                                    <option value="0" selected disabled >Select value (cm)</option>
                                    @for($i=1;$i <= 20;$i++)
                                    <option value="{{$i}}">{{$i}} cm</option>
                                    @endfor
                                    
                                </select>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--End of Fourth Accordion-->

        </div>
        <div class="col-lg-4 col-sm-12">

            <div class="form-group row">
                <!-- <label class="col-sm-12 col-lg-12 col-form-label">Knitted For</label> -->
                <div class="col-sm-12 col-lg-12">
                    <img src="../../files/assets/images/user-card/Off-the-Shoulder Ruffle Top.jpg" alt="" style="width:100%; ">
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-6 col-sm-12">

    </div>

    <div class="form-group m-t-20">
        <div class="col-sm-12">
            <div class="text-center m-b-10">
                <a href="#!" id="edit-cancel" class="btn theme-outline-btn btn-primary waves-effect waves-light m-r-10">Cancel</a>
                <!-- <a href="#!"
class="btn theme-outline-btn btn-primary waves-effect waves-light">Save</a> -->
                <button type="button"
    class="btn theme-btn btn-primary waves-effect waves-light m-l-10" id="save" >Create Project
</button>
            </div>
        </div>
    </div>
</div>
<!--Section for non-custom Patterns Ends here-->
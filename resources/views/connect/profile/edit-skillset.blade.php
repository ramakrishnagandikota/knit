<p class="text-right">
    <button id="" onclick="getSkillset();" type="button" class="btn btn-sm waves-effect waves-light">
<i class="icofont icofont-close"></i>
</button></p>
<form id="UpdateskillSet">
<?php $exp = explode(',', Auth::user()->profile->professional_skills); ?>
@if($master_list->count() > 0)
        <ul class="checked-edit-list">
@php $i=1; @endphp
    @foreach($master_list as $ml)
        <li><input type="checkbox" @for($k=0;$k<count($exp);$k++) @if($ml->name == $exp[$k]) checked @endif @endfor id="cb{{$i}}" name="professional_skills[]" value="{{$ml->name}}" />
            <label for="cb{{$i}}">
                <img src="{{ asset('resources/assets/files/assets/icon/custom/'.$ml->name.'.png') }}" />
                <div class="text-center">{{$ml->name}}</div>
            </label>
        </li>
@php $i++; @endphp
    @endforeach
        </ul>
@endif
        <p></p>
        <hr>
        <h5 class="m-l-30 m-b-20">As a Knitter I am </h5>
        <div class="form-radio m-l-30">
                <div class="group-add-on">
                    <div class="radio radiofill radio-inline">
                        <label>
                            <input type="radio" name="as_a_knitter_i_am" checked value="Still learning"><i class="helper"></i> Still learning
                        </label>
                    </div>
                    <div class="radio radiofill radio-inline">
                        <label>
                            <input type="radio" name="as_a_knitter_i_am" value="A Designer"><i class="helper"></i> A Designer
                        </label>
                    </div>
                    <div class="radio radiofill radio-inline">
                            <label>
                                <input type="radio" name="as_a_knitter_i_am" value="A Teacher"><i class="helper"></i> A Teacher
                            </label>
                        </div>
                </div>
            </div>
            <p></p>
            <hr>
     
            <h5 class="m-l-30 m-b-20">Rate yourself</h5>
            <div class="m-l-30">
            <div class="stars-example-css review-star">
                    <label for="checkbox3">Knitting Skills</label>&nbsp;&nbsp;
                    <div id="demo"></div>
                    <input type="hidden" id="rating" name="rate_yourself" value="0">
                    <label for="checkbox3">&nbsp; (1- Beginner , 2- Advance beginner, 3- Experienced, 4- Very experienced, 5-Expert )</label>
            </div>
            </div>
<p></p>
<p></p>
<hr>
             </form>
<!-- end of row --><p></p><p></p>
<div class="text-center">
<a href="javascript:;" id="saveskillSet" class="btn btn-primary waves-effect waves-light theme-btn">Save</a>
<a href="javascript:;" id="edit-cancel1" class="btn btn-default waves-effect" onclick="getSkillset();" >Cancel</a>
</div>
<p></p>

<script type="text/javascript">
    var rate = '{{ Auth::user()->profile->rate_yourself ? Auth::user()->profile->rate_yourself : 0 }}';
    $("#demo").stars({
        stars: 5,
        emptyIcon  : 'fa-star-o',
        filledIcon : 'fa-star',
        color      : '#0d665c',
        value      : rate,
        text : [],
        click: function(index) {
            $("#rating").val(index);
        }
    });
</script>
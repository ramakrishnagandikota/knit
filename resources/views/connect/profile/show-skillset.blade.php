<div class="row m-l-5 m-r-5 m-b-0" id="second-card" style="position: absolute;right: 0px;top: -1pc;">
<div class="col-lg-12 text-right">
<button id="editSkillset" type="button" class="btn btn-sm waves-effect waves-light">
<i class="fa fa-pencil"></i>
</button>
</div>
</div>

@if(Auth::user()->profile->professional_skills)
<?php 
$exp = explode(',', Auth::user()->profile->professional_skills);
?>
 <ul class="skills-list">
            @for($i=0;$i<count($exp);$i++)
                <li>
                    <img class="checked-img" src="{{ asset('resources/assets/files/assets/icon/custom/'.$exp[$i].'.png') }}" />
                        <div class="text-center">{{$exp[$i]}}</div>
                    </li>
            @endfor
            </ul>
@else
<p>Please add some skill set to your profile.</p>
@endif
            <p></p>
            <hr>
            <h5 class="m-l-30 m-b-20">As a Knitter I am </h5>
            <div class="form-radio m-l-30">
                @if(Auth::user()->profile->as_a_knitter_i_am)
                <ul>
                    <li><i class="fa fa-check m-r-10"></i>{{Auth::user()->profile->as_a_knitter_i_am}}</li>
                </ul>
                @else
                <p>Please add some data.</p>
                @endif
                </div>
                <p></p>
                <hr>
                <h5 class="m-l-30 m-b-20">Your Rating</h5>
                <div class="m-l-30">
                <div class="stars-example-css review-star">
                        
    <?php $rating = Auth::user()->profile->rate_yourself; ?>
    @if($rating)
    <label for="checkbox3">Knitting Skills</label>&nbsp;&nbsp;
                        <?php
                        for($x=1;$x<=$rating;$x++) {
                            echo '<i class="fa fa-star" aria-hidden="true"></i> &nbsp;';
                        }
                        
                        while ($x<=5) {
                            echo '<i class="fa fa-star-o" aria-hidden="true"></i> &nbsp;';
                            $x++;
                        }
                    ?>
        <label for="checkbox3">&nbsp; (1- Beginner , 2- Advance beginner, 3- Experienced, 4- Very experienced, 5-Expert )</label>
    @else
    <p>Please add some rating.</p>
    @endif
                </div>
                </div>
                <p></p>
                <hr>  
<style type="text/css">
    .fa-star{
       color: #0d665c !important
    }
</style>

<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">

{!! Form::hidden('probability',3, ['id'=>'probability']) !!}
{!! Form::hidden('impact',3, ['id'=>'impact']) !!}
{!! Form::hidden('target_probability',3, ['id'=>'target_probability']) !!}
{!! Form::hidden('target_impact',3, ['id'=>'target_impact']) !!}

<fieldset>

    <section>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('title', null, ['placeholder'=>"title"] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter the Title for the Risk Or Issue</b> </label>
    </section>

    <label>Risk or Issue</label>
    <div class="inline-group">
        <section>
            <label class="radio ">{!! Form::radio('is_an_issue', 0, true) !!}<i></i>Risk</label>
            <label class="radio ">{!! Form::radio('is_an_issue', 1, false) !!}<i></i>Issue</label>

        </section>
    </div>

</fieldset>


<fieldset>
    <label>Status</label>
    <div class="inline-group">
        <section>
            <label class="radio ">{!! Form::radio('status', 'Open', true) !!}<i></i>Open</label>
            <label class="radio ">{!! Form::radio('status', 'Closed', false) !!}<i></i>Closed</label>
        </section>
    </div>
</fieldset>

<fieldset>
    <label>Owner</label>
    <section>
        {!! Form::select('owner', isset($risk) ? [  $risk->owner => $risk->OwnerName] : [], isset($risk) ? $risk->owner :  null ,['class'=>"form-control", 'id'=>"owner"] ) !!}
    </section>

    <section>

        <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
            {!! Form::text('NextReviewDate', isset($risk) ? $risk->NextReviewDate->format('d F Y') : null, ['id'=>'NextReviewDate', 'placeholder'=>"Next Review Date"] ) !!}
            <b class="tooltip tooltip-bottom-right">Date of next review for the risk or issue</b> </label>

    </section>
</fieldset>

<fieldset>
    <div class="row">
        <div class="col col-6">
                <label>Current Probability</label>
                <div   id="probabilityslider"></div>
                <small><div id="probabilitydescription" ></div></small>
      </div>

        <div class="col col-6">
            <label>Target Probability</label>
            <div   id="targetprobabilityslider"></div>
            <small><div id="targetprobabilitydescription" ></div></small>
        </div>
    </div>
</fieldset>


<fieldset>
    <div class="row">
        <div class="col col-6">
            <label>Current Impact</label>
            <div   id="impactslider"></div>
            <small><div id="impactdescription" ></div></small>
        </div>

        <div class="col col-6">
            <label>Target Impact</label>
            <div   id="targetimpactslider"></div>
            <small><div id="targetimpactdescription" ></div></small>
        </div>
    </div>
</fieldset>



<fieldset>
    <section>
        <label class="textarea">
            {!! Form::textarea('description', null, ['rows'=>'5','placeholder'=>"Description"] ) !!}
            <b class="tooltip tooltip-top-left">Describe the risk or issue here.  What is the risk?</b>
        </label>
    </section>

</fieldset>

<fieldset>
    <section>
        <label class="textarea">
            {!! Form::textarea('cause_description', null, ['rows'=>'5','placeholder'=>"Cause of Risk or Issue"] ) !!}
            <b class="tooltip tooltip-top-left">Describe the cause of the risk/issue.  There is a risk/issue because of...</b>
        </label>
    </section>

</fieldset>

<fieldset>
    <section>
        <label class="textarea">
            {!! Form::textarea('impact_description', null, ['rows'=>'5','placeholder'=>"Impact of the Risk or Issue"] ) !!}
            <b class="tooltip tooltip-top-left">Describe the impact of the risk/issue.  This risk/issue will result in...</b>
        </label>
    </section>

</fieldset>

<fieldset>
    <section>

        <label>Response Strategy</label>
        {!! Form::select('response_strategy', ['Mitigate'=>'Mitigate', 'Contigency'=>'Contigency','Transfer'=>'Transfer', 'Avoid'=>'Avoid', 'Accept'=>'Accept' ] , isset($risk) ? $risk->response_strategy :  null ,['class'=>"form-control", 'id'=>"mitigation_strategy"] ) !!}
    </section>

    <section>
        <label class="textarea">
            {!! Form::textarea('response_notes', null, ['rows'=>'5','placeholder'=>"Response Notes"] ) !!}
            <b class="tooltip tooltip-top-left">Describe the method by which this risk or issue is being mitigated</b>
        </label>
    </section>
</fieldset>

<footer>
    <button type="submit" class="btn btn-block btn-primary">
        Submit Form
    </button>
</footer>

@section('readyfunction')

    var slider = document.getElementById('probabilityslider');

    noUiSlider.create(slider, {
    start: 3,
    step: 1,
    connect: 'lower',
    range: { 'min':  1, 'max':  5 },
    pips: {
    mode: 'positions',
    values: [1,25.5,50,74.5,99],
    density: 30
    }
    });

    @if(isset($risk))
        slider.noUiSlider.set({{$risk->probability}});
    @endif

    slider.noUiSlider.on('update', function(){

        var score =  document.getElementById('probabilityslider').noUiSlider.get();
        $('#probability').val( score );
        SetClass('probabilityslider', score);
        SetProbabilityText('probabilitydescription', score);

    });

    var slider = document.getElementById('impactslider');

    noUiSlider.create(slider, {
    start: 3,
    step: 1,
    connect: 'lower',
    range: { 'min':  1, 'max':  5 },
    pips: {
    mode: 'positions',
    values: [1,25.5,50,74.5,99],
    density: 30
    }
    });

    slider.noUiSlider.on('update', function(){
        var score =  document.getElementById('impactslider').noUiSlider.get();
        $('#impact').val( score );
        SetClass('impactslider', score);

        SetImpactText('impactdescription', score);

    });

    @if(isset($risk))
        slider.noUiSlider.set({{$risk->impact}});
    @endif

    var slider = document.getElementById('targetprobabilityslider');

    noUiSlider.create(slider, {
    start: 3,
    step: 1,
    connect: 'lower',
    range: { 'min':  1, 'max':  5 },
    pips: {
    mode: 'positions',
    values: [1,25.5,50,74.5,99],
    density: 30
    }
    });

    slider.noUiSlider.on('update', function(){

    var score =  document.getElementById('targetprobabilityslider').noUiSlider.get();
    $('#target_probability').val( score );
    SetClass('targetprobabilityslider', score);
    SetProbabilityText('targetprobabilitydescription', score);

    });

    @if(isset($risk))
        slider.noUiSlider.set({{$risk->target_probability}});
    @endif

    var slider = document.getElementById('targetimpactslider');

    noUiSlider.create(slider, {
    start: 3,
    step: 1,
    connect: 'lower',
    range: { 'min':  1, 'max':  5 },
    pips: {
    mode: 'positions',
    values: [1,25.5,50,74.5,99],
    density: 30
    }
    });

    slider.noUiSlider.on('update', function(){

    var score =  document.getElementById('targetimpactslider').noUiSlider.get();
    $('#target_impact').val( score );
    SetClass('targetimpactslider', score);
    SetImpactText('targetimpactdescription', score);

    });

    @if(isset($risk))
        slider.noUiSlider.set({{$risk->target_impact}});
    @endif

    @include('RisksAndIssues.partials.datefieldsetup')

    @include('RisksAndIssues.partials.dropdownsetup')

    var $MyForm = $('#RiskForm').validate({
    // Rules for form validation
    rules : {
    title : {
    required : true
    },
    owner : {
    required : true
    },
    NextReviewDate : {
    required : true
    },
    description : {
    required : true
    }
    },

    // Messages for form validation
    messages : {
    title : {
    required : 'Please enter a title for the change request'
    },
    owner : {
    required : 'Please enter the owner of the risk'
    },
    NextReviewDate : {
    required : 'Pleae select a date when the risk or issue will next be reviewed'
    },
    description : {
    required : 'Please enter a description'
    }
    },

    // Do not change code below
    errorPlacement : function(error, element) {
    error.insertAfter(element.parent());
    }
    });

@endsection

@section('scripts')

            <!-- Slider -->
        <script src="{{ URL::asset('js/plugins/nouslider/nouislider.min.js') }}"></script>

    <script>

        function SetClass(id, score)
        {
            switch(parseInt(score))
            {

                case 1:
                    $('#'+id).addClass('bar-normal');
                    $('#'+id).removeClass('bar-warning');
                    $('#'+id).removeClass('bar-danger');
                    break;
                case 2:
                    $('#'+id).addClass('bar-normal');
                    $('#'+id).removeClass('bar-warning');
                    $('#'+id).removeClass('bar-danger');
                    break;
                case 3:
                    $('#'+id).removeClass('bar-normal');
                    $('#'+id).addClass('bar-warning');
                    $('#'+id).removeClass('bar-danger');
                    break;
                case 4:
                    $('#'+id).removeClass('bar-normal');
                    $('#'+id).removeClass('bar-warning');
                    $('#'+id).addClass('bar-danger');
                    break;
                case 5:
                    $('#'+id).removeClass('bar-normal');
                    $('#'+id).removeClass('bar-warning');
                    $('#'+id).addClass('bar-danger');
                    break;
            }

        }

        function SetProbabilityText(id, score)
        {
            switch(parseInt(score))
            {
                case 1:
                    $('#'+id).html("<p class='text-navy'><strong>Very Low</strong> - very unlikely the risk will occur</p>");
                    break;
                case 2:
                    $('#'+id).html("<p class='text-navy'><strong>Low</strong> - not likely the risk will occur</p>");
                    break;
                case 3:
                    $('#'+id).html("<p class='text-warning'><strong>Moderate</strong> - some likelihood the risk will occur</p>");
                    break;
                case 4:
                    $('#'+id).html("<p class='text-danger'><strong>High</strong> - likely the risk will occur</p>");
                    break;
                case 5:
                    $('#'+id).html("<p class='text-danger'><strong>Very High</strong> - Very likely the risk will occur</p>");
                    break;
                default:
                    $('#'+id).html(score);
                    break;
            }
        }

        function SetImpactText(id, score)
        {
            switch(parseInt(score))
            {
                case 1:
                    $('#'+id).html("<p class='text-navy'><strong>Negligible</strong> - no effect on the program. all requirements will be met.</p>");
                    break;
                case 2:
                    $('#'+id).html("<p class='text-navy'><strong>Minor</strong> - the program will encounter small cost/schedule increases. minimum acceptable requirements will be met. most secondary requirements will be met.</p>");
                    break;
                case 3:
                    $('#'+id).html("<p class='text-warning'><strong>Moderate</strong> - the program will encounter moderate cost/schedule increases. Minimum acceptable requirements will be met. Some secondary requirements may not be met.</p>");
                    break;
                case 4:
                    $('#'+id).html("<p class='text-danger'><strong>Serious</strong> - the program will encounter major cost/schedule increases. Minimum acceptable requirements will be met. Secondary requirements may not be met</p>");
                    break;
                case 5:
                    $('#'+id).html("<p class='text-danger'><strong>Critical</strong> - the program will fail. Minimum acceptable requirements will not be met</p>");
                    break;
                default:
                    $('#'+id).html(score);
                    break;
            }
        }
    </script>
    @endsection
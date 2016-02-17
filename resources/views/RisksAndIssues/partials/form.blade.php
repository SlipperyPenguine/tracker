<input type="hidden" name="redirect" value="{{$redirect}}">
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">

{!! Form::hidden('probability',3, ['id'=>'probability']) !!}
{!! Form::hidden('impact',3, ['id'=>'impact']) !!}
{!! Form::hidden('target_probability',3, ['id'=>'target_probability']) !!}
{!! Form::hidden('target_impact',3, ['id'=>'target_impact']) !!}

<div class="form-group">
    <label class="col-lg-2 control-label">Risk for</label>
    <div class="col-lg-10">
        <p class="form-control-static">{{$subjecttype}}
        </p>
    </div>
</div>
<div class="hr-line-dashed"></div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="title">Title</label>
    <div class="col-lg-10">
        {!! Form::text('title', null, ['placeholder'=>"Title for the risk or issue", 'class'=>"form-control required"] ) !!}
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="is_an_issue">Risk or Issue</label>
    <div class="col-lg-10">
        <div class="i-checks"><label> {!! Form::radio('is_an_issue', '0', true) !!}  <i></i> Risk </label></div>
        <div class="i-checks"><label> {!! Form::radio('is_an_issue', '1') !!}  <i></i> Issue </label></div>
        <span class="help-block m-b-none">A risk is something that might happen, an issue is something that is already a problem</span>
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="status">Status</label>
    <div class="col-lg-10">
        <div class="i-checks"><label> {!! Form::radio('status', 'Open', true) !!}  <i></i> Open </label></div>
        <div class="i-checks"><label> {!! Form::radio('status', 'Closed') !!}  <i></i> Closed </label></div>
    </div>

</div>

<hr/>
<div class="form-group" style="height: 40px">

    <label class="col-lg-2 control-label" for="probabilityslider">Current Probability</label>
    <div class="col-lg-10">
        <div   id="probabilityslider"></div>

    </div>

</div>
<div class="col-lg-2">

</div>
<div class="col-lg-10">
    <small><div id="probabilitydescription" ></div></small>
</div>
<br/>
<br/>

<div class="form-group" style="height: 40px">

    <label class="col-lg-2 control-label" for="targetprobabilityslider">Target Probability</label>
    <div class="col-lg-10">
        <div  id="targetprobabilityslider"></div>
    </div>

</div>
<hr/>
<div class="form-group" style="height: 40px">

    <label class="col-lg-2 control-label" for="impactslider">Current Impact</label>
    <div class="col-lg-10">
        <div   id="impactslider"></div>

    </div>

</div>
<div class="col-lg-2">

</div>
<div class="col-lg-10">
    <small><div id="impactdescription" ></div></small>
</div>
<br/>
<br/>

<div class="form-group" style="height: 40px">

    <label class="col-lg-2 control-label" for="impactslider">Target Impact</label>
    <div class="col-lg-10">
        <div  id="targetimpactslider"></div>
    </div>

</div>

<hr/>

<div class="form-group">

    <label class="col-lg-2 control-label" for="owner">Risk Owner</label>
    <div class="col-lg-10">
        {!! Form::select('owner', isset($risk) ? [  $risk->owner => $risk->OwnerName] : [], isset($risk) ? $risk->owner :  null ,['class'=>"form-control", 'id'=>"owner"] ) !!}
    </div>

</div>


<div class="form-group">

    <label class="col-lg-2 control-label" for="description">Description</label>
    <div class="col-lg-10">
        {!! Form::textarea('description', null, ['rows'=>'4','placeholder'=>"Enter a description of the risk or issue here", 'class'=>"form-control required"] ) !!}
    </div>

</div>

<div class="hr-line-dashed"></div>

<div class="form-group" id="reviewdate">
    <label class="col-lg-2 control-label" for="NextReviewDate">Next Review Date</label>
    <div class="input-group date col-lg-10">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> {!! Form::text('NextReviewDate', isset($risk) ? null : \Carbon\Carbon::now()->addDay(14)->format('d F Y')  , ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="owner">Response Strategy</label>
    <div class="col-lg-10">
        {!! Form::select('response_strategy', ['Mitigate'=>'Mitigate', 'Contigency'=>'Contigency','Transfer'=>'Transfer', 'Avoid'=>'Avoid', 'Accept'=>'Accept' ] , isset($risk) ? $risk->response_strategy :  null ,['class'=>"form-control", 'id'=>"mitigation_strategy"] ) !!}
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="description">Response Notes</label>
    <div class="col-lg-10">
        {!! Form::textarea('response_notes', null, ['rows'=>'4','placeholder'=>"Enter further information relevant to the Response Streategy here", 'class'=>"form-control required"] ) !!}
    </div>

</div>

<input type="submit" value="Submit" class="btn btn-block btn-primary ">

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

        switch(parseInt(score))
        {
    case 1:
    $('#impactdescription').html("<p class='text-navy'><strong>Negligible</strong> - no effect on the program. all requirements will be met.</p>");
    break;
    case 2:
    $('#impactdescription').html("<p class='text-navy'><strong>Minor</strong> - the program will encounter small cost/schedule increases. minimum acceptable requirements will be met. most secondary requirements will be met.</p>");
    break;
    case 3:
    $('#impactdescription').html("<p class='text-warning'><strong>Moderate</strong> - the program will encounter moderate cost/schedule increases. Minimum acceptable requirements will be met. Some secondary requirements may not be met.</p>");
    break;
    case 4:
    $('#impactdescription').html("<p class='text-danger'><strong>Serious</strong> - the program will encounter major cost/schedule increases. Minimum acceptable requirements will be met. Secondary requirements may not be met</p>");
    break;
    case 5:
    $('#impactdescription').html("<p class='text-danger'><strong>Critical</strong> - the program will fail. Minimum acceptable requirements will not be met</p>");
    break;
        default:
        $('#impactdescription').html(score);
        break;
        }

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

    });

    @if(isset($risk))
        slider.noUiSlider.set({{$risk->target_impact}});
    @endif

    @include('RisksAndIssues.partials.datefieldsetup')

    @include('RisksAndIssues.partials.dropdownsetup')


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
    </script>
    @endsection
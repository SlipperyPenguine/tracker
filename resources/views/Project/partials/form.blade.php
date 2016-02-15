<input type="hidden" name="redirect" value="{{$redirect}}">
<input type="hidden" name="program_id" value="{{$program_id}}">
<input type="hidden" name="work_stream_id" value="{{$work_stream_id}}">

<div class="form-group">

    <label class="col-lg-2 control-label" for="title">Project Name</label>
    <div class="col-lg-10">
        {!! Form::text('name', null, ['placeholder'=>"Enter project name here", 'class'=>"form-control required"] ) !!}
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="status">Status</label>
    <div class="col-lg-10">
        <div class="i-checks"><label> {!! Form::radio('status', 0, true) !!}  <i></i> Pre Gate 1' </label></div>
        <div class="i-checks"><label> {!! Form::radio('status', 1, false) !!}  <i></i> Post Gate 1, concept paper approved </label></div>
        <div class="i-checks"><label> {!! Form::radio('status', 2, false) !!}  <i></i> Post Review 1, concept paper and SDD approved </label></div>
        <div class="i-checks"><label> {!! Form::radio('status', 3, false) !!}  <i></i> Post Gate 2, in build </label></div>
        <div class="i-checks"><label> {!! Form::radio('status', 4, false) !!}  <i></i> Post Gate 3, Rolling out </label></div>
        <div class="i-checks"><label> {!! Form::radio('status', 5, false) !!}  <i></i> Closed </label></div>
        <div class="i-checks"><label> {!! Form::radio('status', 6, false) !!}  <i></i> Cancelled </label></div>
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="title">PI</label>
    <div class="col-lg-10">
        {!! Form::text('PI', null, ['placeholder'=>"Enter the SmartChoice PI here", 'class'=>"form-control required"] ) !!}
    </div>

</div>

<div class="form-group" id="StartDate">
    <label id="datelabel" class="col-lg-2 control-label" for="StartDate">Start Date</label>
    <div class="input-group date col-lg-10">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> {!! Form::text('StartDate', isset($subject) ? $subject->StartDate->format('d F Y') : null  , ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group" id="EndDate">
    <label class="col-lg-2 control-label" for="NextReviewDate">End Date</label>
    <div class="input-group date col-lg-10">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> {!! Form::text('EndDate', isset($subject) ? isset($subject->EndDate) ? $subject->EndDate->format('d F Y'): null : null  , ['class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">

    <label class="col-lg-2 control-label" for="description">Description</label>
    <div class="col-lg-10">
        {!! Form::textarea('description', null, ['rows'=>'4','placeholder'=>"Enter a description of the risk or issue here", 'class'=>"form-control required"] ) !!}
    </div>

</div>

<input type="submit" value="Submit" class="btn btn-block btn-primary ">

@section('readyfunction')

    @include('Project.partials.datefieldsetup')



@endsection


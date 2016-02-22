<input type="hidden" name="redirect" value="{{$redirect}}">
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">
<input type="hidden" name="subject_name" value="{{$subjectname}}">

<div class="form-group">

    <label class="col-lg-2 control-label" for="title">Title</label>
    <div class="col-lg-10">
        {!! Form::text('title', null, ['placeholder'=>"Title for the Change Request", 'class'=>"form-control required"] ) !!}
    </div>
</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="external_id">Reference</label>
    <div class="col-lg-10">
        {!! Form::text('external_id', null, ['placeholder'=>"Bugzilla / Jira Reference", 'class'=>"form-control required"] ) !!}
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="status">Status</label>
    <div class="col-lg-10">
        <div class="i-checks"><label> {!! Form::radio('status', 'Open', true) !!}  <i></i> Open </label></div>
        <div class="i-checks"><label> {!! Form::radio('status', 'Complete') !!}  <i></i> Complete </label></div>
        <div class="i-checks"><label> {!! Form::radio('status', 'Cancelled') !!}  <i></i> Cancelled </label></div>
        <div class="i-checks"><label> {!! Form::radio('status', 'Rejected') !!}  <i></i> Rejected </label></div>

    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="ranking">Ranking</label>
    <div class="col-lg-10">
        <div class="i-checks"><label> {!! Form::radio('ranking', 4, true) !!}  <i></i> Critical </label></div>
        <div class="i-checks"><label> {!! Form::radio('ranking', 3) !!}  <i></i> High </label></div>
        <div class="i-checks"><label> {!! Form::radio('ranking', 2) !!}  <i></i> Medium </label></div>
        <div class="i-checks"><label> {!! Form::radio('ranking', 1) !!}  <i></i> Low </label></div>

    </div>

</div>

<div class="form-group">

<label class="col-lg-2 control-label" for="sponsor">Sponsor</label>
<div class="col-lg-10">
    {!! Form::text('sponsor', null, ['placeholder'=>"Business Sponsor for change", 'class'=>"form-control"] ) !!}
</div>
</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="contact">Contact</label>
    <div class="col-lg-10">
        {!! Form::select('contact', isset($changerequest) ? [  $changerequest->contact => $changerequest->Contact->name] : [], isset($changerequest) ? $changerequest->contact :  null ,['class'=>"form-control", 'id'=>"contact"] ) !!}
    </div>

</div>

<div class="form-group" id="submission_date">
    <label id="datelabel" class="col-lg-2 control-label" for="submission_date">Submission Date</label>
    <div class="input-group date col-lg-10">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> {!! Form::text('submission_date', isset($changerequest) ? $changerequest->submission_date->format('d F Y') : null  , ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group" id="required_by">
    <label id="datelabel" class="col-lg-2 control-label" for="required_by">Required By</label>
    <div class="input-group date col-lg-10">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> {!! Form::text('required_by', isset($changerequest) ? $changerequest->required_by->format('d F Y') : null  , ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">

<label class="col-lg-2 control-label" for="lead_time">Lead Time</label>
<div class="col-lg-10">
    {!! Form::text('lead_time', null, ['placeholder'=>"Lead Time in Days", 'class'=>"form-control"] ) !!}
</div>
</div>

<div class="form-group" id="implementation_date">
    <label id="datelabel" class="col-lg-2 control-label" for="submission_date">Implementation Date</label>
    <div class="input-group date col-lg-10">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> {!! Form::text('implementation_date', isset($changerequest) ? $changerequest->implementation_date->format('d F Y') : null  , ['class'=>'form-control']) !!}
    </div>
</div>


<div class="form-group">

    <label class="col-lg-2 control-label" for="description">Description</label>
    <div class="col-lg-10">
        {!! Form::textarea('description', null, ['rows'=>'4','placeholder'=>"Enter a description of the change request here", 'class'=>"form-control"] ) !!}
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="description">Business Benefit</label>
    <div class="col-lg-10">
        {!! Form::textarea('business_benefit', null, ['rows'=>'4','placeholder'=>"Enter the business benefits of making the change", 'class'=>"form-control"] ) !!}
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="description">Business Impact</label>
    <div class="col-lg-10">
        {!! Form::textarea('business_impact', null, ['rows'=>'4','placeholder'=>"Enter the business impact if the change is NOT implemented here", 'class'=>"form-control"] ) !!}
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="description">Impact Analysis</label>
    <div class="col-lg-10">
        {!! Form::textarea('impact_analysis', null, ['rows'=>'4','placeholder'=>"Enter the impact analysis here.  To be finalized by the product manager", 'class'=>"form-control"] ) !!}
    </div>

</div>

<input type="submit" value="Submit" class="btn btn-block btn-primary ">

@section('readyfunction')

    @include('ChangeRequests.partials.datefieldsetup')

    @include('ChangeRequests.partials.dropdownsetup')

@endsection



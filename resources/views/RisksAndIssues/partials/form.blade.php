<input type="hidden" name="redirect" value="{{$redirect}}">
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">

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

<div class="form-group">

    <label class="col-lg-2 control-label" for="probability">Probability</label>
    <div class="col-lg-10">
        <div class="i-checks"><label> {!! Form::radio('probability', '1', true) !!}  <i></i> Low </label></div>
        <div class="i-checks"><label> {!! Form::radio('probability', '2') !!}  <i></i> Medium </label></div>
        <div class="i-checks"><label> {!! Form::radio('probability', '3') !!}  <i></i> High </label></div>
    </div>

</div>
<div class="form-group">
    <label class="col-lg-2 control-label" for="impact">Impact</label>
    <div class="col-lg-10">
        <div class="i-checks"><label> {!! Form::radio('impact', '1', true) !!}  <i></i> Low </label></div>
        <div class="i-checks"><label> {!! Form::radio('impact', '2') !!}  <i></i> Medium </label></div>
        <div class="i-checks"><label> {!! Form::radio('impact', '3') !!}  <i></i> High </label></div>
    </div>
</div>

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

    @include('RisksAndIssues.partials.datefieldsetup')

    @include('RisksAndIssues.partials.dropdownsetup')


@endsection
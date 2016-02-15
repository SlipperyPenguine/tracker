<input type="hidden" name="redirect" value="{{$redirect}}">
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">

<div class="form-group">

    <label class="col-lg-2 control-label" for="title">Title</label>
    <div class="col-lg-10">
        {!! Form::text('title', null, ['placeholder'=>"Title for the Action", 'class'=>"form-control required"] ) !!}
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="status">Status</label>
    <div class="col-lg-10">
        <div class="i-checks"><label> {!! Form::radio('status', 'Open', true) !!}  <i></i> Open </label></div>
        <div class="i-checks"><label> {!! Form::radio('status', 'Complete') !!}  <i></i> Complete </label></div>
        <div class="i-checks"><label> {!! Form::radio('status', 'Cancelled') !!}  <i></i> Cancelled </label></div>
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="actionee">Actionee</label>
    <div class="col-lg-10">
        {!! Form::select('actionee', isset($action) ? [  $action->actionee => $action->Actionee->name] : [], isset($action) ? $action->actionee :  null ,['class'=>"form-control", 'id'=>"actionee"] ) !!}
    </div>

</div>


<div class="form-group" id="DueDate">
    <label id="datelabel" class="col-lg-2 control-label" for="DueDate">Due Date</label>
    <div class="input-group date col-lg-10">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> {!! Form::text('DueDate', isset($action) ? $action->DueDate->format('d F Y') : null  , ['class'=>'form-control']) !!}
    </div>
</div>



<div class="form-group">

    <label class="col-lg-2 control-label" for="description">Description</label>
    <div class="col-lg-10">
        {!! Form::textarea('description', null, ['rows'=>'4','placeholder'=>"Enter a description of the risk or issue here", 'class'=>"form-control required"] ) !!}
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="raised">Raised</label>
    <div class="col-lg-10">
        {!! Form::text('raised', null, ['placeholder'=>"Where this action origniate, e.g. Program Board Meeting", 'class'=>"form-control required"] ) !!}
    </div>

</div>

<input type="submit" value="Submit" class="btn btn-block btn-primary ">

@section('readyfunction')

    @include('Actions.partials.datefieldsetup')

    @include('Actions.partials.dropdownsetup')


@endsection


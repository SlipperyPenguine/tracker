<input type="hidden" name="redirect" value="{{$redirect}}">
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">

<div class="form-group">

    <label class="col-lg-2 control-label" for="title">Title</label>
    <div class="col-lg-10">
        {!! Form::text('title', null, ['placeholder'=>"Title for the Task", 'class'=>"form-control required"] ) !!}
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

    <label class="col-lg-2 control-label" for="action_owner">Action Owner</label>
    <div class="col-lg-10">
        {!! Form::select('action_owner', isset($task) ? [  $task->action_owner => $task->ActionOwner->name] : [], isset($task) ? $task->action_owner :  null ,['class'=>"form-control", 'id'=>"action_owner"] ) !!}
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="milestone">Milestone</label>
    <div class="col-lg-10">
        <div class="i-checks"><label> {!! Form::checkbox('milestone', 1, null, ['id' => 'milestone']) !!}   <i></i>  </label></div>
    </div>

</div>



<div class="form-group" id="StartDate">
    <label id="datelabel" class="col-lg-2 control-label" for="StartDate">Start Date</label>
    <div class="input-group date col-lg-10">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> {!! Form::text('StartDate', isset($task) ? $task->StartDate->format('d F Y') : null  , ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group" id="EndDate">
    <label class="col-lg-2 control-label" for="EndDate">End Date</label>
    <div class="input-group date col-lg-10">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> {!! Form::text('EndDate', isset($task) ? isset($task->EndDate) ? $task->EndDate->format('d F Y'): null : null  , ['class'=>'form-control']) !!}
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

    @include('Tasks.partials.datefieldsetup')

    @include('Tasks.partials.dropdownsetup')

    $('#milestone').on('ifChecked', function(event){
        $('#EndDate').fadeOut('400');
        $('#datelabel').text("Date");
    });

    $('#milestone').on('ifUnchecked', function(event){
        $('#EndDate').fadeIn('400');
        $('#datelabel').text("Start Date");
    });

    @if(isset($task) && $task->milestone==1)
        $('#EndDate').fadeOut('400');
        $('#datelabel').text("Date");
    @endif

@endsection


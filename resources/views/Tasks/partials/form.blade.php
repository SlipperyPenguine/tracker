
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">

<fieldset>

    <section>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('title', null, ['placeholder'=>"title"] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter the Title for the Task</b> </label>
    </section>

    <label>Status</label>
    <div class="inline-group">
        <section>
            <label class="radio ">{!! Form::radio('status', 'Open', true) !!}<i></i>Open</label>
            <label class="radio ">{!! Form::radio('status', 'Complete', false) !!}<i></i>Complete</label>
            <label class="radio ">{!! Form::radio('status', 'Cancelled', false) !!}<i></i>Cancelled</label>

        </section>
    </div>

</fieldset>


<fieldset>
    <label>Owner</label>
    <section>
        {!! Form::select('action_owner', isset($task) ? [  $task->action_owner => $task->ActionOwner->name] : [], isset($task) ? $task->action_owner :  null ,['class'=>"form-control", 'id'=>"action_owner"] ) !!}
    </section>

</fieldset>


<fieldset>

    <section>
        <label class="checkbox">
            {!! Form::checkbox('milestone', 1, null, ['id' => 'milestone']) !!}
            <i></i>Milestone</label>
    </section>

    <section>

        <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
            {!! Form::text('StartDate', isset($task) ? $task->StartDate->format('d F Y') : null, ['id'=>'StartDate', 'placeholder'=>"Start Date"] ) !!}
            <b class="tooltip tooltip-bottom-right">Date the task starts</b> </label>

    </section>

    <section>

        <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
            {!! Form::text('EndDate', isset($task) ? isset($task->EndDate) ? $task->EndDate->format('d F Y') : null : null, ['id'=>'EndDate', 'placeholder'=>"End Date"] ) !!}
            <b class="tooltip tooltip-bottom-right">Date the task ends</b> </label>

    </section>

</fieldset>



<fieldset>
    <section>
        <label class="textarea">
            {!! Form::textarea('description', null, ['rows'=>'5','placeholder'=>"Description"] ) !!}
            <b class="tooltip tooltip-top-left">Describe the task here</b>
        </label>
    </section>

</fieldset>

<footer>
    <button type="submit" class="btn btn-block btn-primary">
        Submit Form
    </button>
</footer>
@section('readyfunction')

    @include('Tasks.partials.datefieldsetup')

    @include('Tasks.partials.dropdownsetup')



    $('#milestone').click(function() {
    if ($(this).is(':checked'))
    {
        $('#EndDate').fadeOut('400');
        $('#StartDate').attr("placeholder","Milestone Date");
    }
    else
    {
        $('#EndDate').fadeIn('400');
        $('#StartDate').attr("placeholder","Start Date");
    }
    });

    @if(isset($task) && $task->milestone==1)
        $('#EndDate').fadeOut('400');
        $('#datelabel').text("Date");
    @endif

    var $MyForm = $('#TaskForm').validate({
    // Rules for form validation
    rules : {
    title : {
    required : true
    },
    action_owner : {
    required : true
    },
    StartDate : {
    required : true
    },
    EndDate: {
    required: function(element) {
        return !$("#milestone").is(':checked');
    }
    },
    description : {
    required : true
    }
    },

    // Messages for form validation
    messages : {
    title : {
    required : 'Please enter a title for the Task'
    },
    action_owner : {
    required : 'Please enter the owner of the task'
    },
    StartDate : {
    required : 'Please select a date when the task will start'
    },
    EndDate : {
    required : 'Please select a date when the task will end'
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


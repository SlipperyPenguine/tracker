<input type="hidden" name="redirect" value="{{$redirect}}">
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">
<input type="hidden" name="subject_name" value="{{$subjectname}}">

<fieldset>
    <section>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('title', null, ['placeholder'=>"Action Title"] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter a title for the action here</b> </label>
    </section>

</fieldset>

<fieldset>
    <section>
        <label class="label">Status</label>

        <label class="radio ">{!! Form::radio('status', 'Open', true) !!}<i></i>Open</label>
        <label class="radio ">{!! Form::radio('status', 'Complete', false) !!}<i></i>Complete</label>
        <label class="radio ">{!! Form::radio('status', 'Cancelled', false) !!}<i></i>Cancelled</label>
    </section>

</fieldset>

<fieldset>

<section>

        <label>Actionee</label>

        {!! Form::select('actionee', isset($action) ? [  $action->actionee => $action->Actionee->name] : [], isset($action) ? $action->actionee :  null ,['class'=>"form-control", 'id'=>"actionee"] ) !!}


</section>

    <section>

        <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
            {!! Form::text('DueDate', isset($action) ? $action->DueDate->format('d F Y') : null, ['id'=>'DueDate', 'placeholder'=>"Due Date"] ) !!}
            <b class="tooltip tooltip-bottom-right">Due</b> </label>

    </section>
</fieldset>


<fieldset>
    <section>
        <label class="textarea">
            {!! Form::textarea('description', null, ['rows'=>'5','placeholder'=>"Description"] ) !!}
            <b class="tooltip tooltip-top-left">Describe the action here</b>
        </label>
    </section>

    <section>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('raised', null, ['placeholder'=>"Action Originate from"] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter where the action was originally raised</b> </label>
    </section>
</fieldset>


<footer>
    <button type="submit" class="btn btn-block btn-primary">
        Submit Form
    </button>
</footer>

@section('readyfunction')

    @include('Actions.partials.datefieldsetup')

    @include('Actions.partials.dropdownsetup')

    var $MyForm = $('#actionsform').validate({
    // Rules for form validation
    rules : {
    title : {
    required : true
    },
    actionee : {
    required : true
    },
    DueDate : {
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
    actionee : {
    required : 'Please enter the assigned person for the action'
    },
    DueDate : {
    required : 'Pleae select a Due date'
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


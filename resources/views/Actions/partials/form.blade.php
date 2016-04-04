
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
</fieldset>

<fieldset>
    @if ( $meetings )

        <section id="selectsection">
            <label class="label">Meeting Action Originated from</label>

            {!! Form::select('meeting_id',$meetings, $meetingid , ['class'=>"form-control", 'id' => 'meeting_id']) !!}
        </section>

    @endif

    <section id="raisedsection">
        <label class="label">Or</label>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('raised', null, ['placeholder'=>"Action Originate from", 'id' => 'raised'] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter where the action was raised when not related to a meeting</b> </label>
    </section>
</fieldset>


<footer>
    <button type="submit" class="btn btn-block btn-primary">
        Submit Form
    </button>
</footer>

@section('scripts')

    <script>
        $('#meeting_id').change(function() {
            if ($(this).val()>0)
            {
                //$('#raised').fadeOut('400');
                //$('#raisedsection').fadeOut('400');
                $('#raised').attr('disabled', 'disabled');
            }
            else
            {
                //$('#raised').fadeIn('400');
                //$('#raisedsection').fadeIn('400');
                $('#raised').removeAttr('disabled');
            }
        });

        $('#raised').keyup(function() {
            if ($(this).val().length>0)
            {
                //$('#selectsection').fadeOut('400');
                $('#meeting_id').attr('disabled', 'disabled');
            }
            else
            {
                //$('#selectsection').fadeIn('400');
                $('#meeting_id').removeAttr('disabled');
            }
        });

        @if($meetingid>0 )
            //$('#raised').hide();
            //$('#raisedsection').hide();
            $('#raised').attr('disabled', 'disabled');
        @endif

        if($('#raised').val().length > 0)
        {
            //$('#selectsection').hide();
            $('#meeting_id').attr('disabled', 'disabled');
        }

    </script>

@endsection

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


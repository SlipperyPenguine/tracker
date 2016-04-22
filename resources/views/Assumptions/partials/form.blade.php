
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">
<input type="hidden" name="subject_name" value="{{$subjectname}}">

<fieldset>
    <section>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('title', null, ['placeholder'=>"Assumption Title"] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter a title for the assumption here</b> </label>
    </section>

</fieldset>

<fieldset>
    <section>
        <label class="label">Status</label>

        <label class="radio ">{!! Form::radio('status', 'Open', true) !!}<i></i>Open</label>
        <label class="radio ">{!! Form::radio('status', 'Closed', false) !!}<i></i>Closed</label>
    </section>

</fieldset>

<fieldset>

<section>

        <label>Owner</label>

        {!! Form::select('owner', isset($item) ? [  $item->owner => $item->Owner->name] : [], isset($item) ? $item->owner :  null ,['class'=>"form-control", 'id'=>"owner"] ) !!}


</section>

    <section>

        <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
            {!! Form::text('DueDate', isset($item) ? $item->DueDate->format('d F Y') : null, ['id'=>'DueDate', 'placeholder'=>"Due Date"] ) !!}
            <b class="tooltip tooltip-bottom-right">Due</b> </label>

    </section>
</fieldset>


<fieldset>
    <section>
        <label class="textarea">
            {!! Form::textarea('description', null, ['rows'=>'5','placeholder'=>"Description"] ) !!}
            <b class="tooltip tooltip-top-left">Describe the assumption here</b>
        </label>
    </section>
</fieldset>

<fieldset>
    @if ( $meetings )

        <section id="selectsection">
            <label class="label">Meeting Assumption Originated from</label>

            {!! Form::select('meeting_id',$meetings, $meetingid , ['class'=>"form-control", 'id' => 'meeting_id']) !!}
        </section>

    @endif

    <section id="raisedsection">
        <label class="label">Or</label>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('raised', null, ['placeholder'=>"Assumption Originate from", 'id' => 'raised'] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter where the assumption was raised when not related to a meeting</b> </label>
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
                $('#raised').attr('disabled', 'disabled');
            }
            else
            {
                $('#raised').removeAttr('disabled');
            }
        });

        $('#raised').keyup(function() {
            if ($(this).val().length>0)
            {
                $('#meeting_id').attr('disabled', 'disabled');
            }
            else if($("#meeting_id option").length > 1)
            {
                $('#meeting_id').removeAttr('disabled');
            }
        });

        @if($meetingid>0 )
            $('#raised').attr('disabled', 'disabled');
        @endif

        if($("#meeting_id option").length == 1)
        {
            //only one item in the list so disable it
            $('#meeting_id').attr('disabled', 'disabled');
        }

        if($('#raised').val().length > 0)
        {
            $('#meeting_id').attr('disabled', 'disabled');
        }

    </script>

@endsection

@section('readyfunction')

    @include('Assumptions.partials.datefieldsetup')

    @include('Assumptions.partials.dropdownsetup')

    var $MyForm = $('#assumptionsform').validate({
    // Rules for form validation
    rules : {
    title : {
    required : true
    },
    owner : {
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
    owner : {
    required : 'Please enter the assigned owner for the assumption'
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


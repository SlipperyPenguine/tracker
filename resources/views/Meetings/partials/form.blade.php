
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">
<input type="hidden" name="subject_name" value="{{$subjectname}}">

<fieldset>
    <section>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('title', null, ['placeholder'=>"Meeting Title"] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter a title for the meeting here</b> </label>
    </section>

</fieldset>

<fieldset>

    <section>
        <label class="checkbox">
            {!! Form::checkbox('all_day_event', 1, null, ['id' => 'all_day_event']) !!}
            <i></i>All Day Event</label>
    </section>

    <section>
        <div class="row">
            <div class="col col-6">
                <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    {!! Form::text('start_date', isset($meeting) ? $meeting->start_date->format('d F Y') : null, ['id'=>'start_date', 'placeholder'=>"Start Date"] ) !!}
                    <b class="tooltip tooltip-bottom-right">Start Date and Time</b> </label>
            </div>

            <div class="col col-6">
                <div class="input-group">
                    <span  id="start_time_icon"  class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                    <input class="form-control" name="start_time" id="start_time" type="text" placeholder="Select time" @if(isset($meeting)) value="{{$meeting->start_date->toTimeString()}}"  @endif >

                </div>
            </div>
        </div>

    </section>

    <section id="durationsection">

            {!! Form::text('duration', null , ['placeholder'=>"Meeting duration", 'id'=>'duration'] ) !!}

    </section>

</fieldset>

<fieldset>

    <section>

        <label>Owner</label>

        {!! Form::select('owner', $userlist , isset($meeting) ? $meeting->owner :  null ,['class'=>"form-control", 'id'=>"owner"] ) !!}


    </section>

    <section>
        <label>Attendees</label>
        {!! Form::select('attendees[]', $userlist, isset($meeting) ? $meeting->AttendeeList : null ,['class'=>"form-control", 'id'=>"attendees", 'multiple' => 'multiple'] ) !!}
    </section>

    <section>
        <label class="textarea">
            {!! Form::textarea('description', null, ['rows'=>'5','placeholder'=>"Description"] ) !!}
            <b class="tooltip tooltip-top-left">Describe the meeting here</b>
        </label>
    </section>

</fieldset>


<footer>
    <button type="submit" class="btn btn-block btn-primary">
        Submit Form
    </button>
</footer>

@section('scripts')

    <script>
        $('#all_day_event').click(function() {
            if ($(this).is(':checked'))
            {
                $('#start_time').fadeOut('400');
                $('#start_time_icon').fadeOut('400');
                $('#durationsection').fadeOut('400');
            }
            else
            {
                $('#start_time').fadeIn('400');
                $('#start_time_icon').fadeIn('400');
                $('#durationsection').fadeIn('400');
            }
        });

        @if(isset($meeting) && $meeting->all_day_event==1)
            $('#start_time').hide();
        $('#start_time_icon').hide();
        $('#durationsection').hide();
        @endif

    </script>

@endsection

@section('readyfunction')

    @include('Meetings.partials.datefieldsetup')

    @include('Meetings.partials.dropdownsetup')

    var $MyForm = $('#meetingsform').validate({
    // Rules for form validation
    rules : {
        title : {
        required : true
        },
        start_date : {
        required : true
        }
    },

    // Messages for form validation
    messages : {
        title : {
        required : 'Please enter a title for the meeting'
        },
        start_date : {
        required : 'Pleae select a start date'
        }
    },

    // Do not change code below
    errorPlacement : function(error, element) {
    error.insertAfter(element.parent());
    }
    });


@endsection


<input type="hidden" name="redirect" value="{{$redirect}}">
<input type="hidden" name="program_id" value="{{$program_id}}">
<input type="hidden" name="work_stream_id" value="{{$work_stream_id}}">

<fieldset>
    <section>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('name', null, ['placeholder'=>"Project Name"] ) !!}
            <b class="tooltip tooltip-bottom-right">Project Name goes here</b> </label>
    </section>

    <section>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('PI', null, ['placeholder'=>"PI"] ) !!}
            <b class="tooltip tooltip-bottom-right">Smartchoice PI Here</b> </label>
    </section>

</fieldset>

<fieldset>
    <section>
        <label class="label">Status</label>
        <div class="row">
            <div class="col col-4">
                <label class="radio ">{!! Form::radio('status', 0, true) !!}<i></i>Pre Gate 1</label>
                <label class="radio ">{!! Form::radio('status', 1, false) !!}<i></i>Post Gate 1, concept paper approved</label>
                <label class="radio ">{!! Form::radio('status', 2, false) !!}<i></i>Post Review 1, concept paper and SDD approved</label>
            </div>
            <div class="col col-4">
                <label class="radio ">{!! Form::radio('status', 3, false) !!}<i></i>Post Gate 2, in build</label>
                <label class="radio ">{!! Form::radio('status', 4, false) !!}<i></i>Post Gate 3, Rolling out</label>
            </div>
            <div class="col col-4">
                <label class="radio ">{!! Form::radio('status', 5, false) !!}<i></i>Closed</label>
                <label class="radio ">{!! Form::radio('status', 6, false) !!}<i></i>Cancelled</label>
            </div>
        </div>
    </section>
</fieldset>

<fieldset>
    <section>
        <div class="row">

                <div class="col col-6">
                    <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                        {!! Form::text('StartDate', isset($subject) ? $subject->StartDate->format('d F Y') : null, ['id'=>'StartDate'] ) !!}
                        <b class="tooltip tooltip-bottom-right">Project Start Date</b> </label>
                </div>

            <div class="col col-6">
                <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    {!! Form::text('EndDate', isset($subject) ? $subject->EndDate->format('d F Y') : null, ['id'=>'EndDate'] ) !!}
                    <b class="tooltip tooltip-bottom-right">Project End Date</b> </label>
            </div>
        </div>
    </section>

</fieldset>


<fieldset>
    <section>
        <label class="textarea">
            {!! Form::textarea('description', null, ['rows'=>'5','placeholder'=>"Description"] ) !!}
            <b class="tooltip tooltip-top-left">Describe the project here</b>
        </label>
    </section>
</fieldset>

<footer>
    <button type="submit" class="btn btn-block btn-primary">
        Submit Form
    </button>
</footer>

@section('readyfunction')

    @include('Project.partials.datefieldsetup')


    var $MyForm = $('#projectform').validate({
    // Rules for form validation
    rules : {
    name : {
        required : true
        },
    PI : {
    required : true
    },
    StartDate : {
    required : true
    },
    EndDate : {
    required : true
    },
    description : {
    required : true
    }
    },

    // Messages for form validation
    messages : {
    name : {
    required : 'Please enter a project name'
    },
    PI : {
    required : 'Please enter a SmartChoice PI'
    },
    StartDate : {
    required : 'Please enter a start date'
    },
    EndDate : {
    required : 'Pleae enter an end date'
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


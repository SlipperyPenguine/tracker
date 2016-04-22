
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">
<input type="hidden" name="subject_name" value="{{$subjectname}}">
<input type="hidden" name="dependent_on_type" id="dependent_on_type" @if (isset($dependency)) value="{{$dependency->dependent_on_type}}" @endif >

<fieldset>
    <section>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('title', null, ['placeholder'=>"Title"] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter a title for the dependency here</b> </label>
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
{{--    @if(isset($dependency))

        <p class="form-control-static">Dependent on: {{$dependency->dependent_on_name}} (  @if($dependency->unlinked) External @else {{$dependency->dependent_on_type}} @endif )</p>

    @else--}}

        <label>Internal Dependency</label>
        <section>
            {!! Form::select('dependent_on_id',  isset($dependency) ? ($dependency->unlinked==0) ? [$dependency->dependent_on_id => $dependency->dependent_on_name]  : [] : [] ,  isset($dependency) ? ($dependency->unlinked==0)? $dependency->dependent_on_id : null : null ,['class'=>"form-control dependency_group", 'id'=>"dependent_on_id"] ) !!}
        </section>


        <section>
            <label>Or</label>
            <label class="input"> <i class="icon-prepend fa fa-link"></i>
                {!! Form::text('freetextdependency', isset($dependency) ? ($dependency->unlinked==1) ? $dependency->dependent_on_name : null : null , ['placeholder'=>"External Dependency", 'class' => 'dependency_group', 'id' => 'freetextdependency'] ) !!}
                <b class="tooltip tooltip-bottom-right">Enter any links external to the program here</b> </label>
        </section>

{{--    @endif--}}
</fieldset>

<fieldset>
    <label>Owner</label>
    <section>
        {!! Form::select('owner', isset($dependency) ? [  $dependency->owner => $dependency->Owner->name ] : [], isset($dependency) ? $dependency->owner :  null ,['class'=>"form-control", 'id'=>"owner"] ) !!}
    </section>

    <section>
        <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
            {!! Form::text('NextReviewDate', isset($dependency) ? $dependency->NextReviewDate->format('d F Y') : null, ['id'=>'NextReviewDate', 'placeholder'=>"Next Review Date"] ) !!}
            <b class="tooltip tooltip-bottom-right">Next Review Date</b> </label>
    </section>
</fieldset>

<hr/>

<fieldset>
    <section>
        <label class="textarea">
            {!! Form::textarea('description', null, ['rows'=>'5','placeholder'=>"Description"] ) !!}
            <b class="tooltip tooltip-top-left">Describe the Dependency here</b>
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
        $('#dependent_on_id').change(function() {
            if ($(this).val()>0)
            {
                $('#freetextdependency').attr('disabled', 'disabled');
            }
            else
            {
                $('#freetextdependency').removeAttr('disabled');
            }
        });

        $('#freetextdependency').keyup(function() {
            if ($(this).val().length>0)
            {
                $('#dependent_on_id').attr('disabled', 'disabled');
                $('#dependent_on_id').valid();
            }
            else
            {
                $('#dependent_on_id').removeAttr('disabled');
            }
        });


        if($('#freetextdependency').val().length > 0)
        {
            $('#dependent_on_id').attr('disabled', 'disabled');
        }

        if ($('#dependent_on_id').val()>0)
        {
            $('#freetextdependency').attr('disabled', 'disabled');
        }

    </script>

@endsection

@section('readyfunction')

    @include('Dependencies.partials.datefieldsetup')

    @include('Dependencies.partials.dropdownsetup')


    var $MyForm = $('#Dependenciesform').validate({
    //ignore: [],
    // errorClass: "state-error",
    // Rules for form validation
    rules : {
    dependent_on_id: {
     required: "#freetextdependency:blank"
    },
    freetextdependency: {
    required: "#dependent_on_id:empty"
    },
    title : {
    required : true
    },
    owner : {
    required : true
    },
    NextReviewDate : {
    required : true
    },
    description : {
    required : true
    }
    },

    // Messages for form validation
    messages : {
    title : {
    required : 'Please enter a title for the Dependency'
    },
    dependent_on_id: {
    required: 'Either an Internal or External Dependency must be entered'
    },
    freetextdependency: {
    required: 'Either an Internal or External Dependency must be entered'
    },
    owner : {
    required : 'Pleae select an owner for the dependency'
    },
    NextReviewDate : {
    required : 'Pleae select a review date'
    },
    description : {
    required : 'Please enter a description'
    }
    },

    errorPlacement: function (error, element) {
        if ($(element).hasClass('select2-hidden-accessible'))
        {
            $(element).next().children().children().addClass('error');
            error.insertAfter(element.next('span'));
        }
        else
        {
            error.insertAfter(element.parent());
        }
    }
    });


@endsection



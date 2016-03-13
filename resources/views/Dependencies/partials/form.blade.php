<input type="hidden" name="redirect" value="{{$redirect}}">
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">
<input type="hidden" name="subject_name" value="{{$subjectname}}">
<input type="hidden" name="dependent_on_type" id="dependent_on_type" >

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
    @if(isset($dependency))

        <p class="form-control-static">Dependent on: {{$dependency->dependent_on_name}} (  @if($dependency->unlinked) External @else {{$dependency->dependent_on_type}} @endif )</p>

    @else

        <label>Internal Dependency</label>
        <section>
            {!! Form::select('dependent_on_id',  [],   null ,['class'=>"form-control", 'id'=>"dependent_on_id"] ) !!}
        </section>

        <label>Or</label>
        <section>
            <label class="input"> <i class="icon-prepend fa fa-link"></i>
                {!! Form::text('freetextdependency', null, ['placeholder'=>"External Dependency"] ) !!}
                <b class="tooltip tooltip-bottom-right">Enter any links external to the program here</b> </label>
        </section>

    @endif
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
            <b class="tooltip tooltip-top-left">Describe the Change request here</b>
        </label>
    </section>
</fieldset>

<footer>
    <button type="submit" class="btn btn-block btn-primary">
        Submit Form
    </button>
</footer>


@section('readyfunction')

    @include('Dependencies.partials.datefieldsetup')

    @include('Dependencies.partials.dropdownsetup')


    var $MyForm = $('#Dependenciesform').validate({
    // Rules for form validation
    rules : {
    title : {
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
    NextReviewDate : {
    required : 'Pleae select a review date'
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



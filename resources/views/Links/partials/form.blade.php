
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">

<fieldset>
    <section>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('title', null, ['placeholder'=>"title"] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter the Title for the Link</b> </label>
    </section>

    <section>
        <label class="input"> <i class="icon-prepend fa fa-external-link"></i>
            {!! Form::url('url', null, ['placeholder'=>"External url"] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter the url for the Link</b> </label>
    </section>

</fieldset>

<footer>
    <button type="submit" class="btn btn-block btn-primary">
        Submit Form
    </button>
</footer>

@section('readyfunction')


    @include('Members.partials.dropdownsetup')

    var $MyForm = $('#LinkForm').validate({
    // Rules for form validation
    rules : {
        title : { required : true },
        url : { required : true , url : true }
    },

    // Messages for form validation
    messages : {
        title : { required : 'Please enter a title'},
        url : { required : 'Please enter a valid url for the link' ,
                url      : 'Please enter a valid URL'}
    },

    // Do not change code below
    errorPlacement : function(error, element) {
    error.insertAfter(element.parent());
    }
    });


@endsection
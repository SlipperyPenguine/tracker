<input type="hidden" name="redirect" value="{{$redirect}}">
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">

<fieldset>
    <section>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('title', null, ['placeholder'=>"title"] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter the Title for the RAG</b> </label>
    </section>

</fieldset>


<fieldset>

    <label class="label">Status</label>
    <section>
    <label class="radio ">{!! Form::radio('value', 'R', true) !!}<i></i>Red</label>
    <label class="radio ">{!! Form::radio('value', 'A', false) !!}<i></i>Amber</label>
    <label class="radio ">{!! Form::radio('value', 'G', false) !!}<i></i>Green</label>
    </section>
</fieldset>

<footer>
    <button type="submit" class="btn btn-block btn-primary">
        Submit Form
    </button>
</footer>

@section('readyfunction')


    @include('Members.partials.dropdownsetup')

    var $MyForm = $('#RAGForm').validate({
    // Rules for form validation
    rules : {
    title : {
    required : true
    } },

    // Messages for form validation
    messages : {
    title : {
    required : 'Please enter a title'
    } },

    // Do not change code below
    errorPlacement : function(error, element) {
    error.insertAfter(element.parent());
    }
    });


@endsection

<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">

<fieldset>

        @if(isset($member))
            <p class="form-control-static"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($member->User->avatar) }}" /> {{$member->User->name}}</p>
        @else
            <label>User</label>
            <section>
                {!! Form::select('user_id',  [],   null ,['class'=>"form-control", 'id'=>"user_id"] ) !!}
            </section>
        @endif


</fieldset>

<fieldset>
    <section>
        <label class="input"> <i class="icon-prepend fa fa-star"></i>
            {!! Form::text('role', null, ['placeholder'=>"Role"] ) !!}
            <b class="tooltip tooltip-bottom-right">Enter the Role the person is performing</b> </label>
    </section>

</fieldset>

<footer>
    <button type="submit" class="btn btn-block btn-primary">
        Submit Form
    </button>
</footer>

@section('readyfunction')


    @include('Members.partials.dropdownsetup')

    var $MyForm = $('#MemberFormCreate').validate({
    // Rules for form validation
    rules : {
    user_id : {
    required : true
    },
    role : {
    required : true
    } },

    // Messages for form validation
    messages : {
    user_id : {
    required : 'Please select the person'
    },
    role : {
    required : 'Please describe the role this person is performing'
    } },

    // Do not change code below
    errorPlacement : function(error, element) {
    error.insertAfter(element.parent());
    }
    });

    var $MyFormEdit = $('#MemberFormEdit').validate({
    // Rules for form validation
    rules : {
    role : {
    required : true
    } },

    // Messages for form validation
    messages : {
    role : {
    required : 'Please describe the role this person is performing'
    } },

    // Do not change code below
    errorPlacement : function(error, element) {
    error.insertAfter(element.parent());
    }
    });

@endsection


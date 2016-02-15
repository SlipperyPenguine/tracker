<input type="hidden" name="redirect" value="{{$redirect}}">
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">

<div class="form-group">

    <label class="col-lg-2 control-label" for="user_id">Person</label>
    <div class="col-lg-10">
        @if(isset($member))
            <p class="form-control-static"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($member->User->avatar) }}" /> {{$member->User->name}}</p>
            @else
                {!! Form::select('user_id', [], null ,['class'=>"form-control", 'id'=>"user_id"] ) !!}
            @endif
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="role">Role</label>
    <div class="col-lg-10">
        {!! Form::text('role', null, ['placeholder'=>"Role the person is performing", 'class'=>"form-control required"] ) !!}
    </div>

</div>


<input type="submit" value="Submit" class="btn btn-block btn-primary ">

@section('readyfunction')


    @include('Members.partials.dropdownsetup')


@endsection


<input type="hidden" name="redirect" value="{{$redirect}}">
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">
<input type="hidden" name="subject_name" value="{{$subjectname}}">
<input type="hidden" name="dependent_on_type" id="dependent_on_type" >
<div class="form-group">

    <label class="col-lg-2 control-label" for="title">Title</label>
    <div class="col-lg-10">
        {!! Form::text('title', null, ['placeholder'=>"Title for the Dependency", 'class'=>"form-control required"] ) !!}
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="status">Status</label>
    <div class="col-lg-10">
        <div class="i-checks"><label> {!! Form::radio('status', 'Open', true) !!}  <i></i> Open </label></div>
        <div class="i-checks"><label> {!! Form::radio('status', 'Complete') !!}  <i></i> Complete </label></div>
        <div class="i-checks"><label> {!! Form::radio('status', 'Cancelled') !!}  <i></i> Cancelled </label></div>
    </div>

</div>

<hr/>



<div class="form-group">

    <label class="col-lg-2 control-label" for="dependent_on_id">Dependent On</label>

    <div class="col-lg-10">

        @if(isset($dependency))

            <p class="form-control-static">{{$dependency->dependent_on_name}} (  @if($dependency->unlinked) External @else {{$dependency->dependent_on_type}} @endif )</p>

        @else


            {!! Form::select('dependent_on_id',  [], null ,['class'=>"form-control", 'id'=>"dependent_on_id"] ) !!}

            <br/><br/>

            <input type="text" class="form-control" name="freetextdependency" id="freetextdependency" placeholder="Enter any links external to the program here">

        @endif

    </div>

</div>


<hr/>

<div class="form-group" id="NextReviewDate">
    <label id="datelabel" class="col-lg-2 control-label" for="NextReviewDate">Review Date</label>
    <div class="input-group date col-lg-10">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> {!! Form::text('NextReviewDate', isset($dependency) ? $dependency->NextReviewDate->format('d F Y') : null  , ['class'=>'form-control']) !!}
    </div>
</div>



<div class="form-group">

    <label class="col-lg-2 control-label" for="description">Description</label>
    <div class="col-lg-10">
        {!! Form::textarea('description', null, ['rows'=>'4','placeholder'=>"Enter a description of the risk or issue here", 'class'=>"form-control required"] ) !!}
    </div>

</div>

<input type="submit" value="Submit" class="btn btn-block btn-primary ">

@section('readyfunction')

    @include('Dependencies.partials.datefieldsetup')

    @include('Dependencies.partials.dropdownsetup')

@endsection



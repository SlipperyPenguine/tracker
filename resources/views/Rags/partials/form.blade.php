<input type="hidden" name="redirect" value="{{$redirect}}">
<input type="hidden" name="subject_id" value="{{$subjectid}}">
<input type="hidden" name="subject_type" value="{{$subjecttype}}">

<div class="form-group">

    <label class="col-lg-2 control-label" for="title">Title</label>
    <div class="col-lg-10">
        {!! Form::text('title', null, ['placeholder'=>"Title for the RAG", 'class'=>"form-control required"] ) !!}
    </div>

</div>

<div class="form-group">

    <label class="col-lg-2 control-label" for="value">Status</label>
    <div class="col-lg-10">
        <div class="i-checks"><label> {!! Form::radio('value', 'R', true) !!}  <i></i> Red </label></div>
        <div class="i-checks"><label> {!! Form::radio('value', 'A') !!}  <i></i> Amber </label></div>
        <div class="i-checks"><label> {!! Form::radio('value', 'G') !!}  <i></i> Green </label></div>
    </div>

</div>


<div class="form-group">

    <label class="col-lg-2 control-label" for="comments">Comments</label>
    <div class="col-lg-10">
        {!! Form::textarea('comments', null, ['rows'=>'4','placeholder'=>"Enter any comments you would like to record about this RAG", 'class'=>"form-control"] ) !!}
    </div>

</div>


<input type="submit" value="Submit" class="btn btn-block btn-primary ">



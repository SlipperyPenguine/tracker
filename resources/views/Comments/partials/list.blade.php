<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5><i class="fa fa-history"></i> Comments</h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#">Config option 1</a>
                </li>
                <li><a href="#">Config option 2</a>
                </li>
            </ul>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>

    <div class="ibox-content">

        <div id="contents">

            <table class="table table-hover no-margins">
                <thead>
                <tr>
                    <th>When</th>
                    <th>Who</th>
                    <th>Comment</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($subject->Comments as $comment)

                    <tr>

                        <td class="text-nowrap"> <i class="fa fa-clock-o"></i> {{$comment->pivot->created_at->diffForHumans()}}<br/> &nbsp;&nbsp;&nbsp; <small>( {{$comment->pivot->created_at->format('d M y')}} )</small> </td>
                        <td> <img alt="image" height="30" class="img-circle" src="{{ URL::asset($comment->avatar) }}" /> {{ $comment->name }} </td>
                        <td> {{ $comment->pivot->comment }} </td>
                        <td><a href="#" class="btn btn-white btn-sm"><i class="fa fa-trash"></i> Delete </a></td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>

    <div class="ibox-footer">
        {!! Form::open(['class'=>'form-horizontal', 'url'=>'comments', 'id'=>'commentform']) !!}

        <input type="hidden" name="subject_id" value="{{$subject->id}}">
        <input type="hidden" name="subject_type" value="{{$subject->subjecttype}}">

        <div class="form-group">

            <label class="col-lg-2 control-label" for="comment">New Comment</label>
            <div class="col-lg-8">
                {!! Form::text('comment',  null ,['class'=>"form-control", 'id'=>'comment'] ) !!}
            </div>
            <div class="col-lg-2">
                <input type="submit" value="Add" class="btn btn-primary ">
            </div>

        </div>

        {!! Form::close() !!}
    </div>
</div>


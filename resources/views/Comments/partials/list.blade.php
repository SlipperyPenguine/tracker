<div class="jarviswidget jarviswidget-color-darken" id="wid-id-comments" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-comments"></i> </span>
        <h2>Comments</h2>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body no-padding">

            <div id="contents">

                <table id="dt_comments" class="table table-striped table-bordered table-hover" width="100%">
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

                            <td class="text-nowrap">{{$comment->pivot->created_at->format('d M Y')}}</td>
                            <td> <img alt="image" height="30" class="img-circle" src="{{ URL::asset($comment->avatar) }}" /> {{ $comment->name }} </td>
                            <td> {{  $comment->pivot->comment }} </td>
                            <td>
                                @if( auth()->check() )
                                    @if((auth()->user()->id == $comment->id) || (auth()->user()->isAdmin()) )
                                        <a class="btn btn-default"
                                           href="{{action('CommentController@destroy', $comment->pivot->id)}}"
                                           data-delete=""
                                           data-title="Delete Comment"
                                           data-message="Are you sure you want to delete this comment?"
                                           data-button-text="Confirm Delete"><i style="color: black" class="fa fa-trash-o"></i> </a>
                                    @endif
                                @endif
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

            </div>

            @if(auth()->check())

            <div class="widget-footer">
                {!! Form::open(['class'=>'smart-form', 'url'=>'comments', 'id'=>'commentform']) !!}

                <input type="hidden" name="subject_id" value="{{$subject->id}}">
                <input type="hidden" name="subject_type" value="{{$subject->subjecttype}}">

                <fieldset>
                    <section>

                        <div class="row">
                            <div class="col col-10">
                                <label class="input"> <i class="icon-prepend fa fa-comment"></i>
                                    {!! Form::text('comment', null, ['placeholder'=>"New Comment", 'id'=>'comment'] ) !!}
                                    <b class="tooltip tooltip-bottom-right">Enter a new comment here</b> </label>
                            </div>
                            <div class="col col-2">
                                <button style="height: 32px" type="submit" class="btn btn-primary btn-block">
                                    Add
                                </button>
                            </div>
                        </div>

                    </section>


                </fieldset>

                {!! Form::close() !!}

            </div>

            @endif

        </div>

    </div>

</div>

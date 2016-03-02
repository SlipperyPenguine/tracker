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

    @foreach($comments as $comment)

        <tr>

            <td class="text-nowrap">{{$comment->pivot->created_at->format('d M Y')}}</td>
            <td> <img alt="image" height="30" class="img-circle" src="{{ URL::asset($comment->avatar) }}" /> {{ $comment->name }} </td>
            <td> {{ $comment->pivot->comment }} </td>
            <td>
                @if((auth()->user()->id == $comment->id) || (auth()->user()->isAdmin()) )
                    <a class="btn btn-default btn-sm"
                       href="{{action('CommentController@destroy', $comment->pivot->id)}}"
                       data-delete=""
                       data-title="Delete Comment"
                       data-message="Are you sure you want to delete this comment?"
                       data-button-text="Confirm Delete"><i class="fa fa-trash-o"></i> </a>
                @endif
            </td>
        </tr>

    @endforeach

    </tbody>
</table>

<script>
    deleter.init();
</script>
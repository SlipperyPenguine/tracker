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

    @foreach($comments as $comment)

        <tr>

            <td class="text-nowrap"> <i class="fa fa-clock-o"></i> {{$comment->pivot->created_at->diffForHumans()}}<br/> &nbsp;&nbsp;&nbsp; <small>( {{$comment->pivot->created_at->format('d M y')}} )</small> </td>
            <td> <img alt="image" height="30" class="img-circle" src="{{ URL::asset($comment->avatar) }}" /> {{ $comment->name }} </td>
            <td> {{ $comment->pivot->comment }} </td>
            <td>
                @if((auth()->user()->id == $comment->id) || (auth()->user()->isAdmin()) )
                    <a class="btn btn-white btn-sm"
                       href="{{action('CommentController@destroy', $comment->pivot->id)}}"
                       data-delete=""
                       data-title="Delete Comment"
                       data-message="Are you sure you want to delete this comment?"
                       data-button-text="Confirm Delete"><i class="fa fa-trash"></i> Delete </a>
                @endif
            </td>
        </tr>

    @endforeach

    </tbody>
</table>

<script>
    deleter.init();
</script>
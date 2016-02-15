<script type="text/javascript">
    // DOM element where the Timeline will be attached
    var container = document.getElementById('tasktimeline');

    // Create a DataSet (allows two way data-binding)
    var items = new vis.DataSet([
        //Add the background
        @if(isset($subject->StartDate))
            {id: 'A','className': 'blacktext', content: '{{$subject->name}}', start: '{{ date_format($subject->StartDate,'Y-m-d')}}', end: '{{date_format($subject->EndDate,'Y-m-d')}}', type: 'background'},
        @endif

        @foreach($subject->Tasks as $task)
        {id: {{$task->id}}, @if($task->status!='Open') className: 'graybackground', @endif content: '<a style="color:white" href="#">{{$task->title}}</a>', start: '{{date_format($task->StartDate,'Y-m-d')}}' @if($task->milestone==0) , end: '{{date_format($task->EndDate,'Y-m-d')}}'  @endif  },
        @endforeach

    ]);

    // Configuration for the Timeline
    var options = {};

    // Create a Timeline
    var timeline = new vis.Timeline(container, items, options);
</script>
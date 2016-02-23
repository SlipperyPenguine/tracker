<script type="text/javascript">
    // DOM element where the Timeline will be attached
    var container = document.getElementById('timeline');

    // Create a DataSet (allows two way data-binding)
    var items = new vis.DataSet([
            @foreach($workstreams as $workstream)
        {id: {{$workstream->id}}, @if($workstream->status>0) className: 'graybackground', @endif content: '<a  style="color:white" href="{{ URL::asset('programs/') }}/{{$subject['id']}}/workstreams/{{$workstream['id']}}">{{$workstream->name}}</a>', start: '{{date_format($workstream->StartDate,'Y-m-d')}}', end: '{{date_format($workstream->EndDate,'Y-m-d')}}'},
        @endforeach

        //Add the background
        {id: 'A','className': 'blacktext', content: '{{$subject->name}}', start: '{{ date_format($subject->StartDate,'Y-m-d')}}', end: '{{date_format($subject->EndDate,'Y-m-d')}}', type: 'background'}
    ]);

    // Configuration for the Timeline
    var options = {};

    // Create a Timeline
    var timeline = new vis.Timeline(container, items, options);
</script>
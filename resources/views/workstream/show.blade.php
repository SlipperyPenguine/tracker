{{\tracker\Helpers\Session::SetRedirect(action('WorkstreamController@show', [$program['id'], $subject->id]))}}

@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li>
        <a href="{{ URL::asset('programs') }}">Programs</a>
    </li>
    <li>
        <strong><a href="{{ URL::asset('programs/') }}/{{$program['id']}}">{{$program->name}}</a></strong>
    </li>
    <li>
        Workstreams
    </li>
    <li class="active">
        <strong><a href="{{ URL::asset('programs/') }}/{{$program->id}}/workstreams/{{$subject->id}}">{{$subject->name}}</a></strong>
    </li>
    @endsection

    @section('content')

            <!-- widget grid -->
    <section id="widget-grid" class="">

        <div class="row">
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                @include('workstream.partials.showdetail')

            </article>

        </div>

        <div class="row">
            <article class="col-lg-6">


                @include('Project.partials.list')

                @include('Dependencies.partials.list')

                @include('Links.partials.list')

                @include('Assumptions.partials.list')

            </article>

            <article class="col-lg-6">

                @include('RisksAndIssues.partials.list')

                @include('Rags.partials.list')

                @include('Members.partials.list')

                @include('Meetings.partials.list')

                @include('Actions.partials.list')


            </article>
        </div>

        <div class="row">
            <article class="col-lg-12">

                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-projectstimeline" data-widget-editbutton="false" data-widget-deletebutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-tasks"></i> </span>
                        <h2>Projects</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body">

                            <div id="milestonetimeline"></div>

                        </div>

                    </div>

                </div>

            </article>
        </div>

    </section>

@endsection

@section('scripts')

    <script type="text/javascript">
        // DOM element where the Timeline will be attached
        var container = document.getElementById('projecttimeline');

        // Create a DataSet (allows two way data-binding)
        var items = new vis.DataSet([
                @foreach($subject->Projects as $project)
            {id: {{$project->id}}, @if($project->Status==0) className: 'graybackground', @endif @if($project->Status>6) className: 'graybackground', @endif   content: '<a style="color:white" href="{{ URL::asset('programs/') }}/{{$program['id']}}/workstreams/{{$subject['id']}}/projects/{{$project['id']}}">{{$project->name}}</a>', start: '{{date_format($project->StartDate,'Y-m-d')}}', end: '{{date_format($project->EndDate,'Y-m-d')}}'},
            @endforeach

            //Add the background
            {id: 'A','className': 'blacktext', content: '{{$subject->name}}', start: '{{ date_format($subject->StartDate,'Y-m-d')}}', end: '{{date_format($subject->EndDate,'Y-m-d')}}', type: 'background'}
        ]);

        // Configuration for the Timeline
        var options = {};

        // Create a Timeline
        var timeline = new vis.Timeline(container, items, options);
    </script>

    <script type="text/javascript">
        // DOM element where the Timeline will be attached
        var container = document.getElementById('milestonetimeline');

        // Create a DataSet (allows two way data-binding)
        var items = new vis.DataSet([
                @foreach($subject->Projects as $project)

                @foreach($project->Tasks as $task)
                @if($task->milestone==1) {id: {{$task->id}},'className': 'pointblacktext', content: '{{$task->title}}', start: '{{date_format($task->StartDate,'Y-m-d')}}', group: {{$project->id}}    }, @endif
            @endforeach

            @endforeach

        ]);

        var groups = new vis.DataSet([

                @foreach($subject->Projects as $project)
            {id: {{$project->id}}, content: '{{$project->name}}' },
            @endforeach
        ]);
        // Configuration for the Timeline
        var options = {
            // Set global item type. Type can also be specified for items individually
            // Available types: 'box' (default), 'point', 'range', 'rangeoverflow'
            type: 'point'
        };
        // Create a Timeline
        var timeline = new vis.Timeline(container, items, groups, options);
    </script>

@endsection


@section('readyfunction')

    @include('Project.partials.listreadtyfunction')

    @include('Actions.partials.listreadtfunction')

    @include('RisksAndIssues.partials.listreadtyfunction')

    @include('Rags.partials.listreadtyfunction')

    @include('Members.partials.listreadtyfunction')

    @include('Dependencies.partials.listreadtyfunction')

    @include('Meetings.partials.listreadtfunction')

    @include('Links.partials.listreadtyfunction')

    @include('Assumptions.partials.listreadtfunction')

@endsection


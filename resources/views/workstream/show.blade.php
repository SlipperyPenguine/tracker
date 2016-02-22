@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading'){{ $subject->name }} @endsection
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

    <div class="row">
        <div class="col-lg-3">
            <div class="widget style1 blue-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Active Projects </span>
                        <h2 class="font-bold">{{$subject->ActiveProjectCount}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-thumbs-o-down fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Risks</span>
                        <h2 class="font-bold">{{$subject->ActiveRiskCount}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="widget style1 lazur-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-warning fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Issues </span>
                        <h2 class="font-bold">{{$subject->ActiveIssueCount}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="widget style1 yellow-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-calendar-o fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Active Tasks </span>
                        <h2 class="font-bold">{{$subject->getActiveTasks()->count()}}</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-8">

            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <table width="100%">
                        <tr>
                            <td>
                                <H3>{{$subject['name']}}  </H3>
                                <H4>part of {{$program['name']}}, Phase {{$subject['phase']}}</H4>
                                <div class="">
                                    <H4><i class="glyphicon glyphicon-road"></i> {{$subject->StatusText}}</H4>
                                </div>
                            </td>
                            <td valign="centre" class="text-right">
                                <a href="{{action('ProgramController@edit', [$subject->id])}}" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{$subject['description']}}</div>
                            </td>
                            <td valign="bottom" class="text-right">
                                <i class="fa fa-clock-o"></i> Created {!! $formater::StandardDateHTML($subject->created_at, true) !!} <br>
                                <i class="fa fa-clock-o"></i> Last Updated {!! $formater::StandardDateHTML($subject->updated_at, true) !!}
                            </td>
                        </tr>
                    </table>

                </div>
            </div>

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-tasks"></i> Projects</h5>
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
                <div class="ibox-content ">
                    <div id="timeline"></div>
                    <br/>
                    <table class="table table-hover no-margins">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>PI</th>
                            <th>RAG</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($subject->Projects as $project)

                            <tr>

                                <td class="project-title">
                                    <a href="{{ URL::asset('programs/') }}/{{$program['id']}}/workstreams/{{$subject['id']}}/projects/{{$project->id}}">{{$project['name']}}</a>
                                </td>
                                <td>{{$project['PI']}}</td>

                                <td class="project-status">

                                    <div class="tooltip-demo">

                                        @foreach($project->RAGs as $rag)



                                            @if($rag['value']=='R')
                                                <span class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="{{$rag['title']}}">R</span>
                                            @elseif($rag['value']=='A')
                                                <span class="badge badge-warning  " data-toggle="tooltip" data-placement="top" title="{{$rag['title']}}">A</span>
                                            @else
                                                <span class="badge badge-primary  " data-toggle="tooltip" data-placement="top" title="{{$rag['title']}}">G</span>
                                            @endif

                                        @endforeach

                                    </div>


                                </td>

                                <td><i class="fa fa-check text-navy"></i> {{$project['StatusText']}} </td>

                                <td class="project-actions">
                                    <a href="{{ URL::asset('programs/') }}/{{$program['id']}}/workstreams/{{$subject['id']}}/projects/{{$project->id}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                    <a href="{{ URL::asset('programs/') }}/{{$program['id']}}/workstreams/{{$subject['id']}}/projects/{{$project->id}}/edit" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>


                </div>
                <div class="ibox-footer">
                    <a href="{{action('ProjectController@create', ['WorkStream', $subject->id])}}" class="btn btn-primary btn-sm">Add new Project</a>

                </div>
            </div>

            @include('Dependencies.partials.list')

            @include('Tasks.partials.list')
        </div>

        <div class="col-lg-4">

            @include('RisksAndIssues.partials.list')

            @include('Rags.partials.list')

            @include('Members.partials.list')

            @include('Actions.partials.list')


        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a class="darktext" href="#"><h5 ><i class="fa fa-calendar"></i> Example Milestone Timeline</h5></a>
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
                <div class="ibox-content ">
                    <div id="milestonetimeline"></div>
                </div>

            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <script type="text/javascript">
        // DOM element where the Timeline will be attached
        var container = document.getElementById('timeline');

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

    @include('Tasks.partials.timelinescript')


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


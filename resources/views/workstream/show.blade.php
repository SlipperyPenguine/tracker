@extends('layouts.main')

@section('heading'){{ $workstream->name }} @endsection
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
        <strong><a href="{{ URL::asset('programs/') }}/{{$program->id}}/workstreams/{{$workstream->id}}">{{$workstream->name}}</a></strong>
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
                        <h2 class="font-bold">{{$workstream->ActiveProjectCount}}</h2>
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
                        <h2 class="font-bold">{{$workstream->ActiveRiskCount}}</h2>
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
                        <h2 class="font-bold">{{$workstream->ActiveIssueCount}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="widget style1 yellow-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-chain fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Dependencies </span>
                        <h2 class="font-bold">4</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-8">

            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <span class="widget style1 navy-bg pull-right">Active</span>
                    <H3>{{$workstream['name']}}</H3>
                    <div class="">
                        <H4>part of {{$program['name']}}, Phase {{$workstream['phase']}}</H4>
                        <div>{{$workstream['description']}}</div>
                    </div>
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
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($workstream->Projects as $project)

                            <tr>

                                <td><strong>{{$project['name']}}</strong></td>
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

                                <td><span class="label   @if($project['Status']==0) label-default
                                                         @elseif($project['Status']==1) label-primary
                                                         @elseif($project['Status']==2) label-primary
                                                         @elseif($project['Status']==3) label-primary
                                                         @elseif($project['Status']==4) label-default
                                                         @elseif($project['Status']==5) label-default
                                                         @elseif($project['Status']==6) label-default @endif ">{{$project['StatusText']}}</span>  </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>


                </div>
                <div class="ibox-footer">
                    <a href="" class="btn btn-primary btn-sm">Add new Project</a>
                </div>
            </div>

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a class="darktext" href="{{ URL::asset('programs/') }}/{{$program->id}}/workstreams/{{$workstream->id}}/tasks"><h5 ><i class="fa fa-calendar"></i> Tasks and Milestones</h5></a>
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
                    <div id="tasktimeline"></div>
                    <br/>
                    <table class="table table-hover no-margins">
                        <thead>
                        <tr>

                            <th>Actionee</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Start</th>
                            <th>End</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($workstream->Tasks as $task)

                            <tr>

                                <td><img alt="image" height="30" class="img-circle" src="{{ URL::asset($task->ActionOwner->avatar) }}" /> {{$task->ActionOwner->name}}</td>

                                <td>{{$task['title']}}</td>
                                <td>{{$task['status']}}</td>
                                <td><i class="fa fa-clock-o"></i> {{ ($task['StartDate']->diff(\Carbon\Carbon::now())->days < 1) ? 'today' : $task['StartDate']->diffForHumans()}} <br/> &nbsp;&nbsp;&nbsp; <small>( {{$task['StartDate']->format('d M y')}} )</small></td>
                                <td>@if($task->milestone==0)<i class="fa fa-clock-o"></i> {{ ($task['EndDate']->diff(\Carbon\Carbon::now())->days < 1) ? 'today' : $task['EndDate']->diffForHumans()}} <br/>&nbsp;&nbsp;&nbsp;<small>( {{$task['EndDate']->format('d M y')}} )</small> @endif</td>
                                <td><a href="{{action('TaskController@editTask', [$task->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a></td>


                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="ibox-footer">
                    <div class="pull-right">
                        <a href="{{action('TaskController@indexWorkstreamTask', [$program->id, $workstream->id])}}" class="btn btn-white"><i class="fa fa-folder"></i> View All </a>
                    </div>
                    <a href="{{action('TaskController@createTask', ['WorkStream', $workstream->id])}}" class="btn btn-primary btn-sm">Add new Task</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-warning"></i> Risks & Issues</h5>
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
                    <table class="table table-hover no-margins">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Imp</th>
                            <th>Sev</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($workstream->Risks as $risk)

                            <tr>
                                <td>@if($risk['is_an_issue'])<span class="label label-danger">Issue</span> @else <span class="label label-warning">Risk</span> @endif </td>
                                <td>{{$risk['title']}}</td>
                                <td> {!! tracker\Helpers\HtmlFormating::FormatHML($risk->probability, true, $risk->previous_probability) !!}   </td>
                                <td> {!! tracker\Helpers\HtmlFormating::FormatHML($risk->impact, true, $risk->previous_impact)  !!} </td>
                                <td><a href="{{action('RiskAndIssueController@editWorkstreamRiskOrIssue', [$program->id, $workstream->id, $risk->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a></td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                </div>
                <div class="ibox-footer">
                    <a href="{{action('RiskAndIssueController@createWorkstreamRiskOrIssue', [$program->id, $workstream->id])}}" class="btn btn-primary btn-sm">Add new Risk or Issue</a>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-bullseye"></i> RAGs</h5>
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
                <div class="ibox-content no-padding">

                    <table class="table table-hover no-margins">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Status</th>
                            <th>trend</th>
                            <th>Comments</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($workstream->RAGs as $rag)

                            <tr>
                                <td>{{$rag['title']}}</td>
                                <td>
                                    @if($rag['value']=='R')
                                        <span class="badge badge-danger">R</span>
                                    @elseif($rag['value']=='A')
                                        <span class="badge badge-warning  " >A</span>
                                    @else
                                        <span class="badge badge-primary  " >G</span>
                                    @endif
                                </td>
                                <td></td>
                                <td>{{$rag['comments']}}</td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-user"></i> Members</h5>
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
                    <table class="table table-hover no-margins">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Role</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($workstream->Members as $member)

                            <tr>
                                <td><img alt="image" height="30" class="img-circle" src="{{ URL::asset($member->User->avatar) }}" /></td>
                                <td>{{$member->User->name}}</td>
                                <td>{{$member->role}}</td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                </div>
                <div class="ibox-footer">
                    <a href="" class="btn btn-primary btn-sm">Add new Member</a>
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
                @foreach($workstream->Projects as $project)
            {id: {{$project->id}}, content: '<a style="color:white" href="{{ URL::asset('programs/') }}/{{$program['id']}}/workstreams/{{$workstream['id']}}/projects/{{$project['id']}}">{{$project->name}}</a>', start: '{{date_format($project->StartDate,'Y-m-d')}}', end: '{{date_format($project->EndDate,'Y-m-d')}}'},
            @endforeach

            //Add the background
            {id: 'A','className': 'blacktext', content: '{{$workstream->name}}', start: '{{ date_format($workstream->StartDate,'Y-m-d')}}', end: '{{date_format($workstream->EndDate,'Y-m-d')}}', type: 'background'}
        ]);

        // Configuration for the Timeline
        var options = {};

        // Create a Timeline
        var timeline = new vis.Timeline(container, items, options);
    </script>

    <script type="text/javascript">
        // DOM element where the Timeline will be attached
        var container = document.getElementById('tasktimeline');

        // Create a DataSet (allows two way data-binding)
        var items = new vis.DataSet([
                @foreach($workstream->Tasks as $task)
            {id: {{$task->id}}, @if($task->status!='Open') className: 'graybackground', @endif content: '<a style="color:white" href="{{ URL::asset('programs/') }}/{{$program['id']}}/workstreams/{{$workstream['id']}}/tasks/{{$task['id']}}">{{$task->title}}</a>', start: '{{date_format($task->StartDate,'Y-m-d')}}' @if($task->milestone==0) , end: '{{date_format($task->EndDate,'Y-m-d')}}'  @endif  },
            @endforeach

        ]);

        // Configuration for the Timeline
        var options = {};

        // Create a Timeline
        var timeline = new vis.Timeline(container, items, options);
    </script>
@endsection


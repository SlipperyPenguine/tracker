@extends('layouts.main')

@section('heading') {{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="row">
        <div class="col-lg-6">

            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <table width="100%">
                        <tr>
                            <td>
                                <H3>{{$risk['title']}} </H3>
                                <H4>@if($risk['is_an_issue'])<span class="label label-danger">Issue</span> @else <span class="label label-warning">Risk</span> @endif </H4>
                                <div class="">
                                    <H4><i class="glyphicon glyphicon-road"></i> {{$risk->status}}</H4>
                                    <div>{{$risk['description']}}</div>
                                    <div>Probability {!! tracker\Helpers\HtmlFormating::FormatHML($risk->probability, true, $risk->previous_probability) !!}   </div>
                                    <div>Impact {!! tracker\Helpers\HtmlFormating::FormatHML($risk->impact, true, $risk->previous_impact)  !!} </div>
                                </div>
                            </td>
                            <td valign="centre" class="text-right">
                                <a href="{{action('RiskAndIssueController@editRisk', [$risk->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5 ><i class="fa fa-calendar"></i> Tasks and Milestones</h5>
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

                        @foreach($risk->getActiveTasks() as $task)

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
                        <a href="{{action('TaskController@indexTask', ['Risk', $risk->id])}}" class="btn btn-white"><i class="fa fa-folder"></i> View All </a>
                    </div>
                    <a href="{{action('TaskController@createTask', ['Risk', $risk->id])}}" class="btn btn-primary btn-sm">Add new Task</a>
                </div>
            </div>

        </div>

        <div class="col-lg-6">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-history"></i> Audit Trail</h5>
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
                            <th>When</th>
                            <th>Changes</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($risk->AuditTrail as $change)

                            <tr>

                                <td> <i class="fa fa-clock-o"></i> {{$change->pivot->created_at->diffForHumans()}}<br/> &nbsp;&nbsp;&nbsp; <small>( {{$change->pivot->created_at->format('d M y')}} )</small> </td>
                                <td> {!!   tracker\Helpers\HtmlFormating::FormatRiskHistory( $change->pivot->before, $change->pivot->after )  !!} </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')


    <script type="text/javascript">
        // DOM element where the Timeline will be attached
        var container = document.getElementById('tasktimeline');

        // Create a DataSet (allows two way data-binding)
        var items = new vis.DataSet([

                @foreach($risk->getActiveTasks() as $task)
            {id: {{$task->id}}, @if($task->status!='Open') className: 'graybackground', @endif content: '<a style="color:white" href="#">{{$task->title}}</a>', start: '{{date_format($task->StartDate,'Y-m-d')}}' @if($task->milestone==0) , end: '{{date_format($task->EndDate,'Y-m-d')}}'  @endif  },
            @endforeach

        ]);

        // Configuration for the Timeline
        var options = {};

        // Create a Timeline
        var timeline = new vis.Timeline(container, items, options);
    </script>
@endsection
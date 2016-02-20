@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5 ><i class="fa fa-calendar"></i> Tasks and Milestones</h5>
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

                @foreach($tasks as $task)

                    <tr>

                        <td><img alt="image" height="30" class="img-circle" src="{{ URL::asset($task->ActionOwner->avatar) }}" /> {{$task->ActionOwner->name}}</td>

                        <td>{{$task['title']}}</td>
                        <td>{{$task['status']}}</td>
                        <td><i class="fa fa-clock-o"></i> {{ ($task['StartDate']->diff(\Carbon\Carbon::now())->days < 1) ? 'today' : $task['StartDate']->diffForHumans()}} <br/> &nbsp;&nbsp;&nbsp; <small>( {{$task['StartDate']->format('d M y')}} )</small></td>
                        <td>@if($task->milestone==0)<i class="fa fa-clock-o"></i> {{ ($task['EndDate']->diff(\Carbon\Carbon::now())->days < 1) ? 'today' : $task['EndDate']->diffForHumans()}} <br/>&nbsp;&nbsp;&nbsp;<small>( {{$task['EndDate']->format('d M y')}} )</small> @endif</td>
                        <td>
                            <a href="{{ URL::asset('tasks/') }}/{{$task['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                            <a href="{{action('TaskController@editTask', [$task->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a></td>


                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <div class="ibox-footer">
            <a href="{{action('TaskController@createTask', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm">Add new Task</a>
        </div>
    </div>



@endsection

@section('readyfunction')


@endsection
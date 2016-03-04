@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">

    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-tasks" data-widget-editbutton="false" data-widget-deletebutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
                    <h2>Tasks & Milestones</h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body">

                        <div id="tasktimeline"></div>
                        <br/>

                        <table id="dt_tasks" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                               <th class="text-nowrap" data-class="expand">Actionee</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th data-hide="phone,tablet">Start</th>
                                <th data-hide="phone,tablet">End</th>
                                <th data-hide="always">Description</th>
                                <th></th>
                           </tr>
                            </thead>
                            <tbody>

                            @foreach($tasks as $task)

                                <tr>
                                    <td><img alt="image" height="30" class="img-circle" src="{{ URL::asset($task->ActionOwner->avatar) }}" /> {{$task->ActionOwner->name}}</td>
                                    <td>{{$task['title']}}</td>
                                    <td>{{$task['status']}}</td>
                                    <td class="text-nowrap">{{$task->StartDate->format('d M Y')}}</td>
                                    <td class="text-nowrap">@if($task->milestone==0){{$task->Enddate->format('d M Y')}}@endif</td>
                                    <td>{{$task->description}}</td>
                                    <td>
                                        <a href="{{ URL::asset('tasks/') }}/{{$task['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-folder"></i></a>
                                        <a href="{{action('TaskController@editTask', [$task->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                    </td>

                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                        <div class="widget-footer">
                            <div class="pull-left">
                                <a href="{{action('TaskController@createTask', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm">Add new Task</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </article>
    </div>
</section>
@endsection

@section('readyfunction')

    @include('Tasks.partials.listreadtyfunction')

@endsection
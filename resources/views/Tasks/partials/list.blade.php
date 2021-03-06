<div class="jarviswidget jarviswidget-color-darken" id="wid-id-tasks" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
        <h2>Tasks</h2>

        <div class="widget-toolbar">
            <a href="{{action('TaskController@createTask', [$subject->subjecttype, $subject->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new Task</a>
            <a href="{{action('TaskController@indexTask', [$subject->subjecttype, $subject->id])}}" class="btn btn-default"><i class="fa fa-eye"></i> View All </a>
        </div>
    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body no-padding">

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

                @foreach($subject->getActiveTasks() as $task)

                    <tr>

                        <td>
                            <span rel="tooltip" data-placement="top" data-original-title="{{$task->ActionOwner->name}}"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($task->ActionOwner->avatar) }}" /></span>
                        </td>

                        <td>{{$task['title']}}</td>
                        <td>{{$task['status']}}</td>
                        <td class="text-nowrap">{{$task->StartDate->format('d M Y')}}</td>
                        <td class="text-nowrap">@if($task->milestone==0){{$task->EndDate->format('d M Y')}}@endif</td>
                        <td>{{$task->description}}</td>
                        <td>
                            <a href="{{ URL::asset('tasks/') }}/{{$task['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                            <a href="{{action('TaskController@editTask', [$task->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>


                    </tr>

                @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>

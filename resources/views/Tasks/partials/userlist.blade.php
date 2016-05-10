<div class="jarviswidget jarviswidget-color-darken" id="wid-id-tasks" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
        <h2>Tasks</h2>

        <div class="widget-toolbar" id="switch-1">
            <span class="onoffswitch-title"><i class="fa fa-filter"></i> Open Only</span>
										<span class="onoffswitch">
											<input type="checkbox" name="showtaskclosed" class="onoffswitch-checkbox" id="showtaskclosed" checked>
											<label class="onoffswitch-label" for="showtaskclosed">
                                                <span class="onoffswitch-inner" data-swchon-text="Yes" data-swchoff-text="No"></span>
                                                <span class="onoffswitch-switch"></span> </label>
											</span>
        </div>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body no-padding">

            <table id="dt_usertasks" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>
                    <th data-class="expand">ID</th>
                    <th>Subject</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th data-hide="phone,tablet">Status</th>
                    <th data-hide="phone,tablet">Start</th>
                    <th data-hide="phone,tablet">End</th>
                    <th data-hide="always">Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($user->Tasks() as $task)

                    <tr>
                        <td >{{$task->id}}</td>
                        <td>{{$task->subject_type}}</td>
                        <td>{{$task->subject_name}}</td>
                        <td>{{$task['title']}}</td>
                        <td>{{$task['status']}}</td>
                        <td class="text-nowrap">{{$task->StartDate->format('d M Y')}}</td>
                        <td class="text-nowrap">@if($task->milestone==0){{$task->EndDate->format('d M Y')}}@endif</td>
                        <td>{{$task->description}}</td>
                        <td class="text-nowrap">
                            <a href="{{ URL::asset('tasks/') }}/{{$task['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                            <a href="{{action('TaskController@editTask', [$task->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                        </td>


                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>


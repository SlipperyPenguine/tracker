<div class="ibox float-e-margins">
    <div class="ibox-title">
        <a class="darktext" href="{{action('TaskController@indexTask', [$subjecttype, $subject->id])}}"><h5 ><i class="fa fa-calendar"></i> Tasks and Milestones</h5></a>
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

            @foreach($subject->getActiveTasks() as $task)

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
            <a href="{{action('TaskController@indexTask', [$subjecttype, $subject->id])}}" class="btn btn-white"><i class="fa fa-folder"></i> View All </a>
        </div>
        <a href="{{action('TaskController@createTask', [$subjecttype, $subject->id])}}" class="btn btn-primary btn-sm">Add new Task</a>
    </div>
</div>
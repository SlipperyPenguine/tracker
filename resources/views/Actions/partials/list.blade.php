<div class="ibox float-e-margins">
    <div class="ibox-title">
        <a class="darktext" href="{{action('ActionController@indexAction', [$subjecttype, $subject->id])}}"><h5 ><i class="fa fa-truck"></i> Actions</h5></a>
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
        <table class="table table-hover no-margins">
            <thead>
            <tr>

                <th>Actionee</th>
                <th>Title</th>
                <th>Status</th>
                <th>Due</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($subject->getActiveActions() as $action)

                <tr>
                    <td class="tooltip-demo">
                            <span data-toggle="tooltip" data-placement="top" title="{{$action->Actionee->name}}"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($action->Actionee->avatar) }}" /></span>
                    </td>
                    <td>{{$action['title']}}</td>
                    <td>{{$action['status']}}</td>
                    <td class="text-nowrap"><i class="fa fa-clock-o"></i> {{ ($action['DueDate']->diff(\Carbon\Carbon::now())->days < 1) ? 'today' : $action['DueDate']->diffForHumans()}} <br/> &nbsp;&nbsp;&nbsp; <small>( {{$action['DueDate']->format('d M y')}} )</small></td>
                    <td>
                        <a href="{{ URL::asset('actions/') }}/{{$action['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                        <a href="{{action('ActionController@editAction', [$action->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                    </td>

                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
    <div class="ibox-footer">
        <div class="pull-right">
            <a href="{{action('ActionController@indexAction', [$subjecttype, $subject->id])}}" class="btn btn-white"><i class="fa fa-folder"></i> View All </a>
        </div>
        <a href="{{action('ActionController@createAction', [$subjecttype, $subject->id])}}" class="btn btn-primary btn-sm">Add new Action</a>
    </div>
</div>
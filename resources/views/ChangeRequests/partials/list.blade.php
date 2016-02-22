<div class="ibox float-e-margins">
    <div class="ibox-title">
        <a class="darktext" href="{{action('ChangeRequestController@index', [$subject->subjecttype, $subject->id])}}"><h5 ><i class="fa fa-adjust"></i> Change Requests</h5></a>
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
                <th>Ref</th>
                <th>Title</th>
                <th>Status</th>
                <th>Description</th>
                <th></th>
            </thead>
            <tbody>

            @foreach($subject->ChangeRequests as $changerequest)

                <tr>
                    <td>{{$changerequest->external_id}}</td>
                    <td>{{$changerequest->title}}</td>
                    <td>{{$changerequest['status']}}</td>
                    <td>{{$changerequest['description']}}</td>

                    <td><a href="{{ URL::asset('changerequests/') }}/{{$changerequest['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                        <a href="{{action('ChangeRequestController@edit', [$changerequest->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a></td>

                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
    <div class="ibox-footer">
        <div class="pull-right">
            <a href="{{action('ChangeRequestController@index', [$subject->subjecttype, $subject->id])}}" class="btn btn-white"><i class="fa fa-folder"></i> View All </a>
        </div>
        <a href="{{action('ChangeRequestController@create', [$subject->subjecttype, $subject->id])}}" class="btn btn-primary btn-sm">Add new Change Request</a>
    </div>
</div>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <a class="darktext" href="{{action('MemberController@indexMember', [$subjecttype, $subject->id])}}"><h5 ><i class="fa fa-users"></i> Members</h5></a>
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
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($subject->Members as $member)

                <tr>
                    <td><img alt="image" height="30" class="img-circle" src="{{ URL::asset($member->User->avatar) }}" /></td>
                    <td>{{$member->User->name}}</td>
                    <td>{{$member->role}}</td>
                    <td>
                        <a href="{{ URL::asset('members/') }}/{{$member['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                        <a href="{{action('MemberController@editMember', [$member->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>

    </div>
    <div class="ibox-footer">
        <div class="pull-right">
            <a href="{{action('MemberController@indexMember', [$subjecttype, $subject->id])}}" class="btn btn-white"><i class="fa fa-folder"></i> View All </a>
        </div>
        <a href="{{action('MemberController@createMember', [$subjecttype, $subject->id])}}" class="btn btn-primary btn-sm">Add new Member</a>
    </div>
</div>
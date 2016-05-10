
<div class="jarviswidget jarviswidget-color-darken" id="wid-id-members" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-users"></i> </span>
        <h2>Members</h2>

        <div class="widget-toolbar">
            <a href="{{action('MemberController@createMember', [$subjecttype, $subject->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new Member</a>
            <a href="{{action('MemberController@indexMember', [$subjecttype, $subject->id])}}" class="btn btn-default"><i class="fa fa-eye"></i> View All </a>
        </div>
    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body no-padding">

            <table id="dt_members" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>
                    <th class="text-nowrap" data-class="expand"></th>
                    <th data-hide="phone,tablet">Name</th>
                    <th>Role</th>
                    <th class="text-nowrap"></th>

                </tr>
                </thead>
                <tbody>

                @foreach($subject->Members as $member)

                    <tr>
                        <td><img alt="image" height="30" class="img-circle" src="{{ URL::asset($member->User->avatar) }}" /></td>
                        <td>{{$member->User->name}}</td>
                        <td>{{$member->role}}</td>
                        <td class="text-nowrap">
                            <a href="{{ URL::asset('members/') }}/{{$member['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                            <a href="{{action('MemberController@editMember', [$member->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>


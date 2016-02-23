<div class="ibox">
    <div class="ibox-title">
        <h5>All Workstreams for {{$subject['name']}}</h5>
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
        <div id="timeline"></div>
        <br/>
        <div class="project-list">

            <table class="table table-hover">
                <tbody>
                <tr>
                    <th>Status</th>
                    <th>Title</th>
                    <th>Phase</th>
                    <th>RAG</th>
                    <th>Members</th>
                    <th></th>
                </tr>
                @foreach($workstreams as $workstream)
                    <tr>
                        <td class="project-status">
                            @if($workstream['status']==0)
                                <span class="label label-primary">Active</span>
                            @elseif($workstream['status']==1)
                                <span class="label label-default">Not Started</span>
                            @else
                                <span class="label label-default">Closed</span>
                            @endif
                        </td>
                        <td class="project-title">
                            <a href="{{ URL::asset('programs/') }}/{{$subject['id']}}/workstreams/{{$workstream['id']}}">{{$workstream['name']}}</a>
                        </td>
                        <td>
                            {{$workstream['phase']}}
                        </td>

                        <td class="project-status" width="120px">

                            <div class="tooltip-demo">

                                @foreach($workstream->RAGs as $rag)



                                    @if($rag['value']=='R')
                                        <span class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="{{$rag['title']}}">R</span>
                                    @elseif($rag['value']=='A')
                                        <span class="badge badge-warning  " data-toggle="tooltip" data-placement="top" title="{{$rag['title']}}">A</span>
                                    @else
                                        <span class="badge badge-primary  " data-toggle="tooltip" data-placement="top" title="{{$rag['title']}}">G</span>
                                    @endif

                                @endforeach

                            </div>


                        </td>

                        <td class="">
                            <div class="tooltip-demo no-margins no-padding left">
                                @foreach($workstream->Members as $member)

                                    <span data-toggle="tooltip" data-placement="top" title="{{$member->User->name}} - {{$member['role']}}"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($member->User->avatar) }}" /></span>

                                @endforeach
                            </div>

                        </td>
                        <td class="project-actions">
                            <a href="{{ URL::asset('programs/') }}/{{$subject['id']}}/workstreams/{{$workstream['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                            <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="jarviswidget jarviswidget-color-darken" id="wid-id-workstreams" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-cab"></i> </span>
        <h2>All Workstreams for {{$subject['name']}}</h2>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body">
            <div id="timeline"></div>
            <br/>
            <table id="dt_workstreams" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>
                    <th data-class="expand"><i class="fa fa-fw fa-road text-muted hidden-md hidden-sm hidden-xs"></i> Status</th>
                    <th>Title</th>
                    <th data-hide="phone,tablet">Phase</th>
                    <th data-hide="phone,tablet"><i class="fa fa-fw fa-tachometer txt-color-blue hidden-md hidden-sm hidden-xs"></i> RAG</th>
                    <th data-hide="phone,tablet"><i class="fa fa-fw fa-users txt-color-blue hidden-md hidden-sm hidden-xs"></i> Members</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($workstreams as $workstream)
                    <tr>
                        <td >
                            @if($workstream['status']==0)
                                <span class="label label-success">Active</span>
                            @elseif($workstream['status']==1)
                                <span class="label label-default">Not Started</span>
                            @else
                                <span class="label label-default">Closed</span>
                            @endif
                        </td>
                        <td class="table-title">
                            <a href="{{ URL::asset('programs/') }}/{{$subject['id']}}/workstreams/{{$workstream['id']}}">{{$workstream['name']}}</a>
                        </td>
                        <td>
                            {{$workstream['phase']}}
                        </td>

                        <td >


                                @foreach($workstream->RAGs as $rag)



                                    @if($rag['value']=='R')
                                        <span class="badge bg-color-redLight" rel="tooltip" data-placement="top" data-original-title="{{$rag['title']}}">R</span>
                                    @elseif($rag['value']=='A')
                                        <span class="badge bg-color-orange" rel="tooltip" data-placement="top" data-original-title="{{$rag['title']}}">A</span>
                                    @else
                                        <span class="badge bg-color-greenLight" rel="tooltip" data-placement="top" data-original-title="{{$rag['title']}}">G</span>
                                    @endif

                                @endforeach



                        </td>

                        <td class="">
                            <div class="no-margins no-padding left">
                                @foreach($workstream->Members as $member)

                                    <span rel="tooltip" data-placement="top" data-original-title="{{$member->User->name}} - {{$member['role']}}"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($member->User->avatar) }}" /></span>
                                @endforeach
                            </div>

                        </td>
                        <td >
                            <a href="{{ URL::asset('programs/') }}/{{$subject['id']}}/workstreams/{{$workstream['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-folder"></i></a>
                            <a href="#" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>




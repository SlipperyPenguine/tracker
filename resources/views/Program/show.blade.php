@extends('layouts.main')

@section('heading'){{ $program['name'] }} @endsection
@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li>
        <a href="{{ URL::asset('programs') }}">Programs</a>
    </li>
    <li class="active">
        <strong><a href="{{ URL::asset('programs/') }}/{{$program['id']}}">{{$program['name']}}</a></strong>
    </li>
@endsection

@section('content')

    <div class="ibox">
        <div class="ibox-title">
            <h5>All Workstreams for {{$program['name']}}</h5>
            <div class="ibox-tools">
                <a href="" class="btn btn-primary btn-xs">Create new workstream</a>
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
                            <th>Description</th>
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
                                <a href="{{ URL::asset('programs/') }}/{{$program['id']}}/workstreams/{{$workstream['id']}}">{{$workstream['name']}}</a>
                            </td>
                            <td>
                                {{$workstream['phase']}}
                            </td>
                            <td style="width: 50%">
                                {{$workstream['description']}}
                            </td>

                            <td class="project-status">

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

                                        <span class="text-nowrap" data-toggle="tooltip" data-placement="top" title="{{$member['role']}}"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($member->User->avatar) }}" /><small>{{$member->User->name}}</small></span>

                                @endforeach
                                </div>

                            </td>
                            <td class="project-actions">
                                <a href="{{ URL::asset('programs/') }}/{{$program['id']}}/workstreams/{{$workstream['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript">
        // DOM element where the Timeline will be attached
        var container = document.getElementById('timeline');

        // Create a DataSet (allows two way data-binding)
        var items = new vis.DataSet([
                @foreach($workstreams as $workstream)
                    {id: {{$workstream->id}}, @if($workstream->status>0) className: 'graybackground', @endif content: '<a @if($workstream->status>0) style="color:#4c4c4c" @else style="color:white" @endif href="{{ URL::asset('programs/') }}/{{$program['id']}}/workstreams/{{$workstream['id']}}">{{$workstream->name}}</a>', start: '{{date_format($workstream->StartDate,'Y-m-d')}}', end: '{{date_format($workstream->EndDate,'Y-m-d')}}'},
                @endforeach

                //Add the background
                {id: 'A','className': 'blacktext', content: '{{$program->name}}', start: '{{ date_format($program->StartDate,'Y-m-d')}}', end: '{{date_format($program->EndDate,'Y-m-d')}}', type: 'background'}
        ]);

        // Configuration for the Timeline
        var options = {};

        // Create a Timeline
        var timeline = new vis.Timeline(container, items, options);
    </script>

@endsection
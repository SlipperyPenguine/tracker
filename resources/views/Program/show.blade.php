@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading'){{ $subject['name'] }} @endsection
@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li>
        <a href="{{ URL::asset('programs') }}">Programs</a>
    </li>
    <li class="active">
        <strong><a href="{{ URL::asset('programs/') }}/{{$subject['id']}}">{{$subject['name']}}</a></strong>
    </li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-6">

            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <table width="100%">
                        <tr>
                            <td>
                                <H3>{{$subject['name']}}  </H3>
                                <div class="">
                                    <H4><i class="glyphicon glyphicon-road"></i> Open</H4>
                                </div>
                            </td>
                            <td valign="centre" class="text-right">
                                <a href="{{action('ProgramController@edit', [$subject->id])}}" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{$subject['description']}}</div>
                            </td>
                            <td valign="bottom" class="text-right text-nowrap">
                                <i class="fa fa-clock-o"></i> Created {!! $formater::StandardDateHTML($subject->created_at, true) !!} <br>
                                <i class="fa fa-clock-o"></i> Last Updated {!! $formater::StandardDateHTML($subject->updated_at, true) !!}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

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
                                        <a href="{{ URL::asset('programs/') }}/{{$subject['id']}}/workstreams/{{$workstream['id']}}">{{$workstream['name']}}</a>
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

            @include('Dependencies.partials.list')

            @include('Tasks.partials.list')


        </div>

        <div class="col-lg-6">

            @include('RisksAndIssues.partials.list')

            <div class="row">

                <div class="col-md-6">
                @include('Rags.partials.list')
                </div>

                <div class="col-md-6">
                @include('Members.partials.list')

                    </div>
            </div>

            @include('Actions.partials.list')

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
                    {id: {{$workstream->id}}, @if($workstream->status>0) className: 'graybackground', @endif content: '<a  style="color:white" href="{{ URL::asset('programs/') }}/{{$subject['id']}}/workstreams/{{$workstream['id']}}">{{$workstream->name}}</a>', start: '{{date_format($workstream->StartDate,'Y-m-d')}}', end: '{{date_format($workstream->EndDate,'Y-m-d')}}'},
                @endforeach

                //Add the background
                {id: 'A','className': 'blacktext', content: '{{$subject->name}}', start: '{{ date_format($subject->StartDate,'Y-m-d')}}', end: '{{date_format($subject->EndDate,'Y-m-d')}}', type: 'background'}
        ]);

        // Configuration for the Timeline
        var options = {};

        // Create a Timeline
        var timeline = new vis.Timeline(container, items, options);
    </script>

    @include('Tasks.partials.timelinescript')

@endsection
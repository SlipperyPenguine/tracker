@extends('layouts.main')

@section('heading')Programs @endsection
@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li>
        <a href="{{ URL::asset('programs') }}">Programs</a>
    </li>
    <li class="active">
        <strong>Program List</strong>
    </li>
@endsection


@section('content')


    <div class="ibox">
        <div class="ibox-content">
            <div id="timeline"></div>
        </div>
    </div>



    <div class="ibox">
        <div class="ibox-title">
            <h5>All Programs</h5>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">


            <div class="project-list">

                <table class="table table-hover">
                    <tbody>
                        @foreach($programlist as $program)
                            <tr>
                                <td class="project-status">
                                    <span class="label label-primary">Active</span>
                                </td>
                                <td class="project-title">
                                    <a href="{{ URL::asset('programs/') }}/{{$program['id']}}">{{$program['name']}}</a>
                                </td>
                                <td style="width: 50%">
                                    {{$program['description']}}
                                </td>

                                <td class="project-status">
                                    @if($program['RAG']=='R')
                                        <span class="label label-danger">Red</span>
                                    @elseif($program['RAG']=='A')
                                        <span class="label label-warning">Amber</span>
                                    @else
                                        <span class="label label-primary">Green</span>
                                    @endif
                                </td>
                                <td class="project-actions">
                                    <a href="{{ URL::asset('programs/') }}/{{$program['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
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
                @foreach($programlist as $program)
                    {id: {{$program->id}}, content: '<a style="color:white" href="{{ URL::asset('programs/') }}/{{$program['id']}}">{{$program->name}}</a>', start: '{{date_format($program->StartDate,'Y-m-d')}}', end: '{{date_format($program->EndDate,'Y-m-d')}}'},
                @endforeach
        ]);

        // Configuration for the Timeline
        var options = {};

        // Create a Timeline
        var timeline = new vis.Timeline(container, items, options);
    </script>

@endsection
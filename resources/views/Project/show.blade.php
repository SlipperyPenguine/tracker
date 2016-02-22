@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading'){{ $subject->name }} @endsection
@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li>
        <a href="{{ URL::asset('programs') }}">Programs</a>
    </li>
    <li>
        <strong><a href="{{ URL::asset('programs/') }}/{{$program['id']}}">{{$program->name}}</a></strong>
    </li>
    <li>
        Workstreams
    </li>
    <li>
        <strong><a href="{{ URL::asset('programs/') }}/{{$program->id}}/workstreams/{{$workstream->id}}">{{$workstream->name}}</a></strong>
    </li>
    <li>
        Projects
    </li>
    <li class="active">
        <strong><a href="{{ URL::asset('programs/') }}/{{$program->id}}/workstreams/{{$workstream->id}}/projects/{{$subject->id}}">{{$subject->name}}</a></strong>
    </li>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-3">
            <div class="widget style1 blue-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Active Projects </span>
                        <h2 class="font-bold">N/A</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="widget style1 navy-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-thumbs-o-down fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Risks</span>
                        <h2 class="font-bold">{{$subject->ActiveRiskCount}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="widget style1 lazur-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-warning fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Issues </span>
                        <h2 class="font-bold">{{$subject->ActiveIssueCount}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="widget style1 yellow-bg">
                <div class="row">
                    <div class="col-xs-4">
                        <i class="fa fa-calendar-o fa-5x"></i>
                    </div>
                    <div class="col-xs-8 text-right">
                        <span> Active Tasks </span>
                        <h2 class="font-bold">{{$subject->getActiveTasks()->count()}}</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-8">

            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <table width="100%">
                        <tr>
                            <td>
                                <H3>{{$subject['name']}} @if($subject->PI!='') ( {{$subject->PI}} )  @endif </H3>
                                <div class="">
                                    <H4>part of {{$workstream['name']}}, Phase {{$workstream['phase']}} of {{$program['name']}}</H4>
                                    <H4><i class="glyphicon glyphicon-road"></i> {{$subject->StatusText}}</H4>
                                </div>
                            </td>
                            <td valign="centre" class="text-right">
                                <a href="{{action('ProjectController@edit', [$program->id, $workstream->id, $subject->id])}}" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div>{{$subject['description']}}</div>
                            </td>
                            <td valign="bottom" class="text-right">
                                <i class="fa fa-clock-o"></i> Created {!! $formater::StandardDateHTML($subject->created_at, true) !!} <br>
                                <i class="fa fa-clock-o"></i> Last Updated {!! $formater::StandardDateHTML($subject->updated_at, true) !!}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            @include('Dependencies.partials.list')

            @include('Tasks.partials.list')

            @include('Comments.partials.list')
        </div>

        <div class="col-lg-4">

            @include('RisksAndIssues.partials.list')

            @include('Rags.partials.list')

            @include('Members.partials.list')

            @include('ChangeRequests.partials.list')

            @include('Actions.partials.list')




        </div>
    </div>


@endsection

@section('scripts')


    @include('Tasks.partials.timelinescript')

    @include('Comments.partials.ajaxscript')
@endsection


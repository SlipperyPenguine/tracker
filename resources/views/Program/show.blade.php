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

            @include('workstream.partials.list')

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

    @include('workstream.partials.workstreamtimelinesetup')

    @include('Tasks.partials.timelinescript')

@endsection
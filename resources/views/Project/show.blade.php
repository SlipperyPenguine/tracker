@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

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

        <!-- widget grid -->
    <section id="widget-grid" class="">

        <div class="row">
            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                <div class="well">

                    <table width="100%">
                        <tr>
                            <td>
                                <H1 class="text-danger slideInRight fast animated"><strong>{{$subject['name']}} </strong> </H1>

                                <H3> @if($subject->PI!='') ( {{$subject->PI}} )  @endif </H3>
                                <div class="">
                                    <H4>part of {{$workstream['name']}}, Phase {{$workstream['phase']}} of {{$program['name']}}</H4>
                                    <H4><i class="glyphicon glyphicon-road"></i> {{$subject->StatusText}}</H4>
                                </div>
                            </td>
                            <td valign="centre" class="text-right">
                                <a href="{{action('ProjectController@edit', [$program->id, $workstream->id, $subject->id])}}" class="btn btn-default"><i class="fa fa-pencil"></i> Edit </a>
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

                @include('Dependencies.partials.list')

                @include('ChangeRequests.partials.list')

                @include('Tasks.partials.list')

                @include('Comments.partials.list')

            </article>

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                @include('RisksAndIssues.partials.list')

                @include('Rags.partials.list')

                @include('Members.partials.list')

                @include('Actions.partials.list')

            </article>
        </div>

    </section>
@endsection

@section('scripts')


    @include('Tasks.partials.timelinescript')

    @include('Comments.partials.ajaxscript')
@endsection

@section('readyfunction')


    @include('Actions.partials.listreadtfunction')

    @include('RisksAndIssues.partials.listreadtyfunction')

    @include('Rags.partials.listreadtyfunction')

    @include('Members.partials.listreadtyfunction')

    @include('Dependencies.partials.listreadtyfunction')

    @include('Tasks.partials.listreadtyfunction')

    @include('ChangeRequests.partials.listreadtyfunction')

    @include('Comments.partials.listreadtfunction')


@endsection
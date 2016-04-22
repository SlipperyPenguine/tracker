{{\tracker\Helpers\Session::SetRedirect(action('ProjectController@show', [$subject['program_id'], $subject['work_stream_id'], $subject['id']]))}}

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
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @include('Project.partials.showdetail')
            </article>

        </div>

        <div class="row">
            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

             @include('Dependencies.partials.list')

                @include('ChangeRequests.partials.list')

                @include('Tasks.partials.list')

                @include('Meetings.partials.list')

                @include('Links.partials.list')

                @include('Assumptions.partials.list')

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

    @include('Meetings.partials.listreadtfunction')

    @include('Links.partials.listreadtyfunction')

    @include('Assumptions.partials.listreadtfunction')

@endsection
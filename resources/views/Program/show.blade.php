{{\tracker\Helpers\Session::SetRedirect(action('ProgramController@show', [$subject['id']]))}}

@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

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

        <!-- widget grid -->
    <section id="widget-grid" class="">

        <div class="row">
            <article class="col-lg-12">

                @include('Program.partials.showdetail')

            </article>

            </div>
                <div class="row">

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">


                @include('workstream.partials.list')

                @include('Dependencies.partials.list')

                @include('Links.partials.list')

                @include('Assumptions.partials.list')

            </article>

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                @include('RisksAndIssues.partials.list')

                @include('Rags.partials.list')

                @include('Members.partials.list')

                @include('Meetings.partials.list')

                @include('Actions.partials.list')

            </article>
        </div>

    </section>

@endsection

@section('scripts')

    @include('workstream.partials.workstreamtimelinesetup')

@endsection

@section('readyfunction')

    @include('workstream.partials.listreadtfunction')

    @include('Actions.partials.listreadtfunction')

    @include('RisksAndIssues.partials.listreadtyfunction')

    @include('Rags.partials.listreadtyfunction')

    @include('Members.partials.listreadtyfunction')

    @include('Dependencies.partials.listreadtyfunction')

    @include('Meetings.partials.listreadtfunction')

    @include('Links.partials.listreadtyfunction')

    @include('Assumptions.partials.listreadtfunction')
@endsection

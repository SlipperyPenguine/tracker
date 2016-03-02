@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('breadcrumbs')
    <li xmlns="http://www.w3.org/1999/html">
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
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="well">
                    <table width="100%">
                        <tr>
                            <td>
                                <H1 class="text-danger slideInRight fast animated"><strong>{{$subject['name']}} </strong> </H1>
                                <div class="">
                                    <H4><i class="glyphicon glyphicon-road"></i> Open</H4>
                                </div>
                            </td>
                            <td valign="centre" class="text-right">
                                <a href="{{action('ProgramController@edit', [$subject->id])}}" class="btn btn-default"><i class="fa fa-pencil"></i> Edit </a>
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

            </article>

            </div>
                <div class="row">

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">


                @include('workstream.partials.list')

                @include('Dependencies.partials.list')

                @include('Tasks.partials.list')


            </article>

            <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

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

            </article>
        </div>

    </section>

@endsection

@section('scripts')

    @include('workstream.partials.workstreamtimelinesetup')

    @include('Tasks.partials.timelinescript')

@endsection

@section('readyfunction')

    @include('workstream.partials.listreadtfunction')

    @include('Actions.partials.listreadtfunction')

    @include('RisksAndIssues.partials.listreadtyfunction')

    @include('Rags.partials.listreadtyfunction')

    @include('Members.partials.listreadtyfunction')

    @include('Dependencies.partials.listreadtyfunction')

    @include('Tasks.partials.listreadtyfunction')

@endsection

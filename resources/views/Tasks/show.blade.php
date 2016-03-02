@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">

    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="well">

                <table width="100%">
                    <tr>
                        <td>
                            <H1 class="text-danger slideInRight fast animated"><strong>{{$subject['title']}} </strong> </H1>
                            <H4>@if($subject['milestone'])<span class="label label-info">Milestone</span> @else <span class="label label-info">Task</span> @endif </H4>
                            <table>
                                <tr>
                                    <td>Status: </td>
                                    <td><i class="glyphicon glyphicon-road"></i> {{$subject->status}}</td>
                                </tr>

                                @if($subject['milestone'])
                                    <tr valign="top">
                                        <td>Target Date: </td>
                                        <td>{!! tracker\Helpers\HtmlFormating::StandardDateHTML($subject->StartDate, false) !!}</td>
                                    </tr>
                                @else
                                    <tr valign="top">
                                        <td>Start Date: </td>
                                        <td>{!! tracker\Helpers\HtmlFormating::StandardDateHTML($subject->StartDate, false) !!}</td>
                                    </tr>
                                    <tr valign="top">
                                        <td>End Date: </td>
                                        <td>{!! tracker\Helpers\HtmlFormating::StandardDateHTML($subject->EndDate, false) !!}</td>
                                    </tr>
                                @endif

                                <tr valign="top">
                                    <td>Created By: </td>
                                    <td>{{$subject->Creator->name}}</td>
                                </tr>

                                <tr valign="top">
                                    <td>Task Owner: &nbsp; </td>
                                    <td>{{$subject->ActionOwner->name}}</td>
                                </tr>

                            </table>
                        </td>
                        <td valign="centre" class="text-right">
                            <a href="{{action('TaskController@editTask', [$subject->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
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

        </article>

    </div>

    <div class="row">

        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

            @include('Actions.partials.list')

        </article>

        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            @include('Comments.partials.list')

            @include('AuditTrail.partials.list')

        </article>
    </div>

</section>


@endsection

@section('scripts')

    @include('Comments.partials.ajaxscript')
@endsection

@section('readyfunction')


    @include('Actions.partials.listreadtfunction')

    @include('Comments.partials.listreadtfunction')


@endsection

{{\tracker\Helpers\Session::SetRedirect(action('ChangeRequestController@show', [$subject->id]))}}

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
                            <table >
                                <tr class="itemattributerow">
                                    <td><i class="fa fa-road"></i> Status:</td>
                                    <td >{{$subject->status}}</td>
                                </tr>

                                <tr class="itemattributerow">
                                    <td>ID:</td>
                                    <td class="text-nowrap">{{$subject->id}}</td>
                                </tr>
                                <tr class="itemattributerow">
                                    <td>Reference:</td>
                                    <td class="text-nowrap">{{$subject->external_id}}</td>
                                </tr>

                                <tr class="itemattributerow">
                                    <td>Sponsor:</td>
                                    <td class="text-nowrap">{{$subject->sponsor}}</td>
                                </tr>

                                <tr class="itemattributerow">
                                    <td>Contact:</td>
                                    <td class="text-nowrap">{{$subject->Contact->name}}</td>
                                </tr>


                                <tr class="itemattributerow">
                                    <td><i class="fa fa-calendar-o"></i> Submission Date:</td>
                                    <td class="text-nowrap"> {!! $formater::StandardDateHTML($subject->submission_date, false, true, false) !!}</td>
                                </tr>

                                <tr class="itemattributerow">
                                    <td><i class="fa fa-calendar-o"></i> Required By:</td>
                                    <td class="text-nowrap"> {!! $formater::StandardDateHTML($subject->required_by, false, true, false) !!}</td>
                                </tr>

                                <tr class="itemattributerow">
                                    <td>Lead Time:</td>
                                    <td class="text-nowrap">{{$subject->lead_time}} days</td>
                                </tr>


                                <tr class="itemattributerow">
                                    <td><i class="fa fa-calendar-o"></i> Implementation Date:</td>
                                    <td class="text-nowrap"> {!! $formater::StandardDateHTML($subject->implementation_date, false, true, false) !!}</td>
                                </tr>


                            </table>
                        </td>
                        <td valign="centre" class="text-right">
                            <a href="{{action('ChangeRequestController@edit', [$subject->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                            @if( auth()->check() && auth()->user()->isAdmin() )
                                <a class="btn btn-default"
                                   rel="tooltip" data-placement="top" data-original-title="Delete"
                                   href="{{action('ChangeRequestController@destroy', $subject->id)}}"
                                   data-delete=""
                                   data-title="Delete Change Request"
                                   data-message="Are you sure you want to delete this change request?"
                                   data-button-text="Confirm Delete"><i style="color: black" class="fa fa-trash-o"></i> Delete</a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>

                            <table >
                                <tr class="itemattributerow">
                                    <td>Description:</td>
                                    <td >{{$subject->description}}</td>
                                </tr>
                                <tr class="itemattributerow">
                                    <td>Busines Benefit:</td>
                                    <td >{{$subject->business_benefit}}</td>
                                </tr>
                                <tr class="itemattributerow">
                                    <td>Business Impact:</td>
                                    <td >{{$subject->business_impact}}</td>
                                </tr>
                                <tr class="itemattributerow">
                                    <td>Impact Analysis:</td>
                                    <td >{{$subject->impact_analysis}}</td>
                                </tr>

                            </table>

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


            @include('Actions.partials.list')

            @include('Links.partials.list')

            @include('Comments.partials.list')

        </article>

        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

            @include('RisksAndIssues.partials.list')


            @include('AuditTrail.partials.list')

        </article>
    </div>

</section>

@endsection

@section('scripts')

    @include('Comments.partials.ajaxscript')
@endsection

@section('readyfunction')

    @include('RisksAndIssues.partials.listreadtyfunction')

    @include('Actions.partials.listreadtfunction')

    @include('Comments.partials.listreadtfunction')

    @include('Links.partials.listreadtyfunction')

@endsection


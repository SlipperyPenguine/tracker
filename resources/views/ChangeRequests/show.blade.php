@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading') {{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="row">
        <div class="col-lg-6">

            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <table width="100%">
                        <tr>
                            <td>
                                <H3>{{$subject['title']}} </H3>
                                <table >
                                    <tr class="itemattributerow">
                                        <td><i class="glyphicon glyphicon-road"></i> Status:</td>
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
            </div>

            @include('Tasks.partials.list')

            @include('Actions.partials.list')

        </div>

        <div class="col-lg-6">

            @include('Comments.partials.list')

            @include('AuditTrail.partials.list')
        </div>
    </div>

@endsection

@section('scripts')


    @include('Tasks.partials.timelinescript')

    @include('Comments.partials.ajaxscript')
@endsection


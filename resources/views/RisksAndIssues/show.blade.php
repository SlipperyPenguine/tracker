@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading') {{$title}} @endsection

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
                            <H1 class="text-danger slideInRight fast animated"><strong>{{$subject['title']}} </strong>
                            @if($subject['is_an_issue'])<span class="label label-danger">Issue</span> @else <span class="label label-warning">Risk</span> @endif
                            </H1>

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
                                    <td><i class="fa fa-calendar-o"></i> Next Review:</td>
                                    <td class="text-nowrap"> {!! $formater::StandardDateHTML($subject->NextReviewDate, false, true, false) !!}</td>
                                </tr>

                                <tr class="itemattributerow" >
                                    <td class=" text-nowrap">Current Probability: &nbsp; </td>
                                    <td>{!! tracker\Helpers\HtmlFormating::FormatRiskRating($subject->probability, true, $subject->previous_probability) !!} {!! tracker\Helpers\HtmlFormating::GetProbabilityText($subject->probability) !!}</td>
                                </tr>

                                <tr class="itemattributerow">
                                    <td>Target Probability:</td>
                                    <td>{!! tracker\Helpers\HtmlFormating::FormatRiskRating($subject->target_probability) !!} {!! tracker\Helpers\HtmlFormating::GetProbabilityText($subject->target_probability) !!} </td>
                                </tr>

                                <tr class="itemattributerow">
                                    <td>Current Impact:</td>
                                    <td>{!! tracker\Helpers\HtmlFormating::FormatRiskRating($subject->impact, true, $subject->previous_impact)  !!} {!! tracker\Helpers\HtmlFormating::GetImpactText($subject->impact) !!} </td>
                                </tr>

                                <tr class="itemattributerow">
                                    <td>Target Impact:</td>
                                    <td>{!! tracker\Helpers\HtmlFormating::FormatRiskRating($subject->target_impact)  !!} {!! tracker\Helpers\HtmlFormating::GetImpactText($subject->target_impact) !!} </td>
                                </tr>

                            </table>
                        </td>
                        <td valign="centre" class="text-right">
                            <a href="{{action('RiskAndIssueController@editRisk', [$subject->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
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

            @include('Actions.partials.list')

            @include('Comments.partials.list')

        </article>

        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-matrix" data-widget-editbutton="false" data-widget-deletebutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                    <h2>Risk Matrix</h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body text-align-center">
                         @include('RisksAndIssues.partials.classificationmatrix')
                    </div>
                </div>
            </div>

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
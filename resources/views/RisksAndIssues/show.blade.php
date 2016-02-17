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
                                <H4>@if($subject['is_an_issue'])<span class="label label-danger">Issue</span> @else <span class="label label-warning">Risk</span> @endif </H4>

                                <table>
                                    <tr>
                                        <td>Status:</td>
                                        <td><i class="glyphicon glyphicon-road"></i> {{$subject->status}}</td>
                                    </tr>

                                    <tr>
                                        <td>Current Probability: </td>
                                        <td>{!! tracker\Helpers\HtmlFormating::FormatRiskRating($subject->probability, true, $subject->previous_probability) !!} {!! tracker\Helpers\HtmlFormating::GetProbabilityText($subject->probability) !!}</td>
                                    </tr>

                                    <tr>
                                        <td>Target Probability:</td>
                                        <td>{!! tracker\Helpers\HtmlFormating::FormatRiskRating($subject->target_probability) !!} {!! tracker\Helpers\HtmlFormating::GetProbabilityText($subject->target_probability) !!} </td>
                                    </tr>

                                    <tr>
                                        <td>Current Impact:</td>
                                        <td>{!! tracker\Helpers\HtmlFormating::FormatRiskRating($subject->impact, true, $subject->previous_impact)  !!} {!! tracker\Helpers\HtmlFormating::GetImpactText($subject->impact) !!} </td>
                                    </tr>

                                    <tr>
                                        <td>Target Impact:</td>
                                        <td>{!! tracker\Helpers\HtmlFormating::FormatRiskRating($subject->target_impact)  !!} {!! tracker\Helpers\HtmlFormating::GetImpactText($subject->target_impact) !!} </td>
                                    </tr>

                                </table>
                            </td>
                            <td valign="centre" class="text-right">
                                <a href="{{action('RiskAndIssueController@editRisk', [$subject->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
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

            @include('Actions.partials.list')

        </div>

        <div class="col-lg-6">

            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    @include('RisksAndIssues.partials.classificationmatrix')
                </div>
            </div>

            @include('Comments.partials.list')

            @include('AuditTrail.partials.list')
        </div>
    </div>

@endsection

@section('scripts')

    @include('Comments.partials.ajaxscript')
@endsection


@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5 ><i class="fa fa-warning"></i> Risks and Issues</h5>
        </div>
        <div class="ibox-content ">
            <br/>
            <table class="table table-hover no-margins">
                <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Imp</th>
                    <th>Sev</th>
                    <th>Review</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($risks as $risk)

                    <tr>
                        <td>@if($risk['is_an_issue'])<span class="label label-danger">Issue</span> @else <span class="label label-warning">Risk</span> @endif </td>
                        <td>{{$risk->id}}</td>
                        <td>{{$risk['title']}}</td>
                        <td class="text-nowrap"> {!! tracker\Helpers\HtmlFormating::FormatRiskRating($risk->probability, true, $risk->previous_probability) !!}   </td>
                        <td class="text-nowrap"> {!! tracker\Helpers\HtmlFormating::FormatRiskRating($risk->impact, true, $risk->previous_impact)  !!} </td>
                        <td class="text-nowrap"> {!! tracker\Helpers\HtmlFormating::StandardDateHTML($risk->NextReviewDate, false, true, true ) !!} </td>
                        <td class="project-actions">
                            <a href="{{ URL::asset('risks/') }}/{{$risk['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                            <a href="{{action('RiskAndIssueController@editRisk', [$risk->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                        </td>


                    </tr>


                @endforeach

                </tbody>
            </table>
        </div>
        <div class="ibox-footer">
            <a href="{{action('RiskAndIssueController@createRisk', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm">Add new Risk or Issue</a>
        </div>
    </div>



@endsection

@section('readyfunction')


@endsection
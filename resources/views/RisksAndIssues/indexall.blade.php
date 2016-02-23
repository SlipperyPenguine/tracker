@extends('layouts.main')

@inject('formater', 'tracker\Helpers\HtmlFormating')


@section('heading')Risks @endsection
@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li class="active">
        <a href="{{ URL::asset('risks') }}">Risks</a>
    </li>

@endsection


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>All Risks</h5>
                    <div class="ibox-tools">
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-risks" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Status</th>
                                <th>Subject</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Owner</th>
                                <th>score</th>
                                <th>Title</th>
                                <th>Probability</th>
                                <th>Target</th>
                                <th>Impact</th>
                                <th>Target</th>
                                <th>Review</th>
                                <th>Open Actions</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($risks as $risk)
                                    <tr>
                                        <td>{{$risk->id}}</td>
                                        <td>{{$risk->status}}</td>
                                        <td>{{$risk->subject_type}}</td>
                                        <td>{{$risk->subject_name}}</td>
                                        <td>@if($risk['is_an_issue'])<span class="label label-danger">Issue</span> @else <span class="label label-warning">Risk</span> @endif</td>
                                        <td><img alt="image" height="30" class="img-circle" src="{{ URL::asset($risk->RiskOwner->avatar) }}" /> {{$risk->RiskOwner->name}}</td>
                                        <td>{!! tracker\Helpers\HtmlFormating::FormatRiskClassification($risk->CurrentRiskClassificationScore,$risk->CurrentRiskClassification ) !!}</td>
                                        <td>{{$risk->title}}</td>
                                        <td>{!! tracker\Helpers\HtmlFormating::FormatRiskRating($risk->probability, true, $risk->previous_probability) !!}</td>
                                        <td>{!! tracker\Helpers\HtmlFormating::FormatRiskRating($risk->target_probability) !!}</td>
                                        <td>{!! tracker\Helpers\HtmlFormating::FormatRiskRating($risk->impact, true, $risk->previous_impact) !!}</td>
                                        <td>{!! tracker\Helpers\HtmlFormating::FormatRiskRating($risk->target_impact) !!}</td>
                                        <td class="text-nowrap">{!! $formater::StandardDateHTML($risk->NextReviewDate, false, true, true) !!} </td>
                                        <td>{{$risk->OpenActionCount}}</td>
                                        <td>
                                            <a href="{{ URL::asset('risks/') }}/{{$risk['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                            <a href="{{action('RiskAndIssueController@editRisk', [$risk->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Admin</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

#

@section('readyfunction')


            $('.dataTables-risks').DataTable({
                "order": [[ 1, 'asc' ]],

                "columnDefs": [ {"targets": [14],"orderable": false} ],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Users'},
                    {extend: 'pdf', title: 'Users'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                        }
                    }
                ]

            });




@endsection

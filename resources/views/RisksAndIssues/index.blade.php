{{\tracker\Helpers\Session::SetRedirect(action('RiskAndIssueController@index', [$subjecttype, $subjectid]))}}

@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">


    <div class="row">

        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-risks" data-widget-editbutton="false" data-widget-deletebutton="false">

        <header>
            <span class="widget-icon"> <i class="fa fa-warning"></i> </span>
            <h2>Risks & Issues</h2>

            <div class="widget-toolbar">
                <a href="{{action('RiskAndIssueController@createRisk', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new Risk or Issue</a>
            </div>
        </header>

        <!-- widget div-->
        <div>

            <!-- widget content -->
            <div class="widget-body no-padding">

                <table id="dt_risks" class="table table-striped table-bordered table-hover" width="100%">
                    <thead>
                    <tr>
                        <th class="text-nowrap" data-class="expand">Status</th>
                        <th>ID</th>
                        <th>Title</th>
                        <th data-hide="phone,tablet">Score</th>
                        <th data-hide="phone,tablet">Review</th>
                        <th data-hide="always">Description</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($risks as $risk)

                        <tr>
                            <td>@if($risk['is_an_issue'])<span class="label label-danger">Issue</span> @else <span class="label label-warning">Risk</span> @endif </td>
                            <td>{{$risk->id}}</td>
                            <td>{{$risk['title']}}</td>
                            <td>{{$risk->CurrentRiskClassificationScore}}</td>
                            <td class="text-nowrap">{{$risk->NextReviewDate->format('d M Y')}}</td>
                            <td>{{$risk->description}}</td>
                            <td class="text-nowrap">
                                <a href="{{ URL::asset('risks/') }}/{{$risk['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                                <a href="{{action('RiskAndIssueController@editRisk', [$risk->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            </td>



                        </tr>

                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

        </article>

    </div>

</section>

@endsection

@section('readyfunction')

    var responsiveHelper = undefined;

    $('#dt_risks').dataTable({

    "createdRow": function ( row, data, index )
    {
    if (beforenow( data[4] )) {
    $('td', row).eq(4).addClass('text-danger').css('font-weight', 'bold');
    }
    else if (next5days( data[4] )) {
    $('td', row).eq(4).addClass('text-warning').css('font-weight', 'bold');
    }

        if (data[3] > 12)
        $('td', row).eq(3).addClass('text-danger').css('font-weight', 'bold');
        else if (data[3] > 9)
        $('td', row).eq(3).addClass('text-warning').css('font-weight', 'bold');

    },
    "pageLength": 20,
    "order": [[ 4, "asc" ]],
    "columnDefs": [
    {"targets": [6],"orderable": false},
    ],
    @include('partials.datatableDefaultOptions')
    "preDrawCallback" : function() {
    // Initialize the responsive datatables helper once.
    if (!responsiveHelper) {
    responsiveHelper = new ResponsiveDatatablesHelper($('#dt_risks'), breakpointDefinition_tracker);
    }
    },
    "rowCallback" : function(nRow) {
    responsiveHelper.createExpandIcon(nRow);
    },
    });

@endsection
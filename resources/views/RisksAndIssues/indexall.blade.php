{{\tracker\Helpers\Session::SetRedirect(action('RiskAndIssueController@indexall'))}}

@extends('layouts.main')

@inject('formater', 'tracker\Helpers\HtmlFormating')


@section('heading')Risks @endsection
@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li class="active">
        <a href="{{ URL::asset('risks') }}">Risks and Issues</a>
    </li>

@endsection


@section('content')

        <!-- widget grid -->
    <section id="widget-grid" class="">


        <div class="row">

            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-risks" data-widget-editbutton="false" data-widget-deletebutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-warning"></i> </span>
                        <h2>Risks & Issues</h2>

                        <div class="widget-toolbar" id="switch-1">
                            <span class="onoffswitch-title"><i class="fa fa-filter"></i> Open Only</span>
										<span class="onoffswitch">
											<input type="checkbox" name="showclosed" class="onoffswitch-checkbox" id="showclosed" checked>
											<label class="onoffswitch-label" for="showclosed">
                                                <span class="onoffswitch-inner" data-swchon-text="Yes" data-swchoff-text="No"></span>
                                                <span class="onoffswitch-switch"></span> </label>
											</span>



                        </div>

                        <div class="widget-toolbar">
                            <!-- add: non-hidden - to disable auto hide -->
                            <div class="btn-group">
                                <button class="btn dropdown-toggle btn-xs btn-primary" data-toggle="dropdown">
                                    Risks and Issues <i class="fa fa-caret-down"></i>
                                </button>
                                <ul class="dropdown-menu js-status-update pull-right">
                                    <li>
                                        <a href="javascript:void(0);" id="risksandissues">Risks and Issues</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" id="risksonly">Risks Only</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" id="issuesonly">Issues Only</a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body no-padding">

                            <table id="dt_risks" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>

                            <tr>
                                <th></th>
                                <th></th>
                                <th >
                                    <input type="text" class="form-control" placeholder="Subject" id="subjectfilter" />
                                </th>
                                <th >
                                    <input type="text" class="form-control" placeholder="Name" id="namefilter" />
                                </th>
                                <th></th>
                                <th >
                                    <input type="text" class="form-control" placeholder="Owner" id="ownerfilter" />
                                </th>
                                <th></th>
                                <th>
                                    <input type="text" class="form-control" placeholder="Title" id="titlefilter"/>
                                </th>
                                <th></th>
                                <th>
                                    <input type="text" class="form-control" placeholder="Comment" id="commentfilter"/>
                                </th>
                                <th colspan="4">
                            </tr>

                            <tr>
                                <th class="text-nowrap" data-class="expand">ID</th>
                                <th>Status</th>
                                <th>Subject</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th data-hide="phone,tablet">Owner</th>
                                <th data-hide="phone,tablet">score</th>
                                <th>Title</th>
                                <th data-hide="phone,tablet">Review</th>
                                <th class="text-nowrap" data-hide="phone,tablet">Latest Comment</th>
                                <th data-hide="phone,tablet"><i class="fa fa-bolt"></i> </th>
                                <th data-hide="phone,tablet"><i class="fa fa-comments-o"></i> </th>
                                <th data-hide="always">Description</th>
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
                                        <td class="text-nowrap"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($risk->RiskOwner->avatar) }}" /> {{$risk->RiskOwner->name}}</td>
                                        <td>{{$risk->CurrentRiskClassificationScore}}</td>
                                        <td>{{$risk->title}}</td>
                                        <td class="text-nowrap">{{$risk->NextReviewDate->format('d M Y')}}</td>
                                        <td>@if($risk->Comments->count()>0) {{$risk->Comments->last()->pivot->comment}} @endif</td>
                                        <td>{{$risk->OpenActionCount}}</td>
                                        <td>{{$risk->Comments->count()}}</td>
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

            var table = $('#dt_risks').DataTable({

            "createdRow": function ( row, data, index )
            {
                if (beforenow( data[8] )) {
                    $('td', row).eq(8).addClass('text-danger').css('font-weight', 'bold');
                }
                else if (next5days( data[8] )) {
                    $('td', row).eq(8).addClass('text-warning').css('font-weight', 'bold');
                }

                if (data[6] > 12)
                    $('td', row).eq(6).addClass('text-danger').css('font-weight', 'bold');
                else if (data[6] > 9)
                    $('td', row).eq(6).addClass('text-warning').css('font-weight', 'bold');
            },
            "pageLength": 20,
            "order": [[ 0, "asc" ]],
            "columnDefs": [
            {"targets": [13],"orderable": false},
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

            // Apply the filter
            $("#dt_risks thead th input[type=text]").on( 'keyup change', function () {

            var colindex = $(this).parent().index();

            var filteredData = table
            .column( colindex )
            .search(this.value);

            table.draw();

            } );

            //var table = $('#dt_risks').DataTable();

            var filteredData = table
            .column( 1 )
            .search('Open');

            table.draw();

            $('#subjectfilter').val(table.column(2).search());
            $('#namefilter').val(table.column(3).search());
            $('#ownerfilter').val(table.column(5).search());
            $('#titlefilter').val(table.column(7).search());
            $('#commentfilter').val(table.column(9).search());

@endsection

@section('scripts')

    <script>
        $('#showclosed').click(function() {

            var table = $('#dt_risks').DataTable();

            if (!$(this).is(':checked')) {
                //show everything
                var filteredData = table
                        .column( 1 )
                        .search('');


            }
            else
            {
                //only show open
                var filteredData = table
                        .column( 1 )
                        .search('Open');
            }

            table.draw();
        });

        // Risks & issues Filter
        $('#risksandissues').click(function() {
            var table = $('#dt_risks').DataTable();
            var filteredData = table
                    .column( 4 )
                    .search('');
            table.draw();
        });

        // Risks Filter
        $('#risksonly').click(function() {
            var table = $('#dt_risks').DataTable();
            var filteredData = table
                    .column( 4 )
                    .search('Risk');
            table.draw();
        });

        // Issues Filter
        $('#issuesonly').click(function() {
            var table = $('#dt_risks').DataTable();
            var filteredData = table
                    .column( 4 )
                    .search('Issue');
            table.draw();
        });

        $(".js-status-update a").click(function() {
            var selText = $(this).text();
            var $this = $(this);
            $this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
            $this.parents('.dropdown-menu').find('li').removeClass('active');
            $this.parent().addClass('active');
        });


    </script>
@endsection
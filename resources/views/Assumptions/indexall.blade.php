{{\tracker\Helpers\Session::SetRedirect(action('AssumptionController@indexall'))}}

@extends('layouts.main')

@inject('formater', 'tracker\Helpers\HtmlFormating')


@section('heading')Assumptions @endsection
@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li class="active">
        <a href="{{ URL::asset('assumptions') }}">Assumptions</a>
    </li>

@endsection


@section('content')

        <!-- widget grid -->
    <section id="widget-grid" class="">


        <div class="row">

            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-assumptions" data-widget-editbutton="false" data-widget-deletebutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-map-marker"></i> </span>
                        <h2>Assumptions</h2>

                        <div class="widget-toolbar" id="switch-1">
                            <span class="onoffswitch-title"><i class="fa fa-filter"></i> Open Only</span>
										<span class="onoffswitch">
											<input type="checkbox" name="showclosed" class="onoffswitch-checkbox" id="showclosed" checked>
											<label class="onoffswitch-label" for="showclosed">
                                                <span class="onoffswitch-inner" data-swchon-text="Yes" data-swchoff-text="No"></span>
                                                <span class="onoffswitch-switch"></span> </label>
											</span>
                        </div>


                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body">

                            <table id="dt_assumptions" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>


                            <tr>
                                <th></th>
                                <th></th>
                                <th class="hasinput" style="width:10%">
                                    <input type="text" class="form-control" placeholder="Subject" id="subjectfilter" />
                                </th>
                                <th class="hasinput" style="width:10%">
                                    <input type="text" class="form-control" placeholder="Name" id="namefilter" />
                                </th>
                                <th class="hasinput" style="width:10%">
                                    <input type="text" class="form-control" placeholder="Title" id="titlefilter"/>
                                </th>
                                <th class="hasinput" style="width:10%">
                                    <input type="text" class="form-control" placeholder="Owner" id="ownerfilter" />
                                </th>
                                <th></th>
                                <th class="hasinput" style="width:10%">
                                    <input type="text" class="form-control" placeholder="Raised" id="raisedfilter" />
                                </th>
                                <th>
                                    <input type="text" class="form-control" placeholder="Comment" id="commentfilter"/>
                                </th>

                                <th colspan="2"></th>
                            </tr>


                            <tr>
                                <th class="text-nowrap" data-class="expand">ID</th>
                                <th>Status</th>
                                <th>Subject</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th data-hide="phone,tablet">Owner</th>
                                <th data-hide="phone,tablet">Due</th>
                                <th data-hide="phone,tablet">Raised</th>
                                <th class="text-nowrap" data-hide="phone,tablet">Latest Comment</th>
                                <th data-hide="phone,tablet"><i class="fa fa-comments-o"></i> </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $assumption)
                                    <tr>
                                        <td>{{$assumption->id}}</td>
                                        <td>{{$assumption->status}}</td>
                                        <td>{{$assumption->subject_type}}</td>
                                        <td>{{$assumption->subject_name}}</td>
                                        <td>{{$assumption->title}}</td>
                                        <td><img alt="image" height="30" class="img-circle" src="{{ URL::asset($assumption->Owner->avatar) }}" /> {{$assumption->Owner->name}}</td>
                                        <td class="text-nowrap">{{$assumption->DueDate->format('d M Y')}}</td>
                                        <td>@if(isset($assumption->meeting_id)) {{$assumption->Meeting->title}}  @else {{$assumption['raised']}} @endif</td>
                                        <td>@if($assumption->Comments->count()>0) {{$assumption->Comments->last()->pivot->comment}} @endif</td>
                                        <td>{{$assumption->Comments->count()}}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ URL::asset('assumptions/') }}/{{$assumption['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-folder"></i></a>
                                            <a href="{{action('AssumptionController@edit', [$assumption->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                            @if( auth()->check() && auth()->user()->isAdmin() )
                                                    <a class="btn btn-default btn-sm"
                                                       rel="tooltip" data-placement="top" data-original-title="Delete"
                                                       href="{{action('AssumptionController@destroy', $assumption->id)}}"
                                                       data-delete=""
                                                       data-title="Delete Assumption"
                                                       data-message="Are you sure you want to delete this assumption?"
                                                       data-button-text="Confirm Delete"><i style="color: black" class="fa fa-trash-o"></i> </a>
                                            @endif
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

            var table = $('#dt_assumptions').dataTable({

            // Tabletools options:
            //   https://datatables.net/extensions/tabletools/button_options
            stateSave: true,
            "createdRow": function ( row, data, index )
            {
            if (beforenow( data[6] )) {
            $('td', row).eq(6).addClass('text-danger').css('font-weight', 'bold');
            }
            else if (next5days( data[6] )) {
            $('td', row).eq(6).addClass('text-warning').css('font-weight', 'bold');
            }
            },
            "pageLength": 20,
            "order": [[ 6, "asc" ]],
            "columnDefs": [
            {"targets": [10],"orderable": false},
            ],
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
            "t"+
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
            "oTableTools": {
            "aButtons": [
            "copy",
            "csv",
            "xls",
            {
            "sExtends": "pdf",
            "sTitle": "Tracker_PDF",
            "sPdfMessage": "Tracker PDF Export",
            "sPdfSize": "letter"
            },
            {
            "sExtends": "print",
            "sMessage": "Generated by Tracker <i>(press Esc to close)</i>"
            }
            ],
            "sSwfPath": "{{ URL::asset('js/plugin/datatables/swf/copy_csv_xls_pdf.swf') }}"
            },
            "autoWidth" : true,
            "preDrawCallback" : function() {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper) {
            responsiveHelper = new ResponsiveDatatablesHelper($('#dt_assumptions'), breakpointDefinition_tracker);
            }
            },
            "rowCallback" : function(nRow) {
            responsiveHelper.createExpandIcon(nRow);
            },
            });

            // Apply the filter
            $("#dt_assumptions thead th input[type=text]").on( 'keyup change', function () {

                var colindex = $(this).parent().index();

                var filteredData = table
                .column( colindex )
                .search(this.value);

                table.draw();

            } );

            var table = $('#dt_assumptions').DataTable();

            var filteredData = table
            .column( 1 )
            .search('Open');

            table.draw();

            $('#subjectfilter').val(table.column(2).search());
            $('#namefilter').val(table.column(3).search());
            $('#titlefilter').val(table.column(4).search());
            $('#ownerfilter').val(table.column(5).search());
            $('#raisedfilter').val(table.column(7).search());
            $('#commentfilter').val(table.column(8).search());

            //console.log(table.column(1).search());
            //table.columns().every( function () {
            //    var search = this.search();
            //    console.log('X'+search+'X');
            //} );


@endsection

@section('scripts')

    <script>
        $('#showclosed').click(function() {

            var table = $('#dt_assumptions').DataTable();

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
    </script>
@endsection

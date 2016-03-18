{{\tracker\Helpers\Session::SetRedirect(action('DependencyController@indexall'))}}

@extends('layouts.main')

@inject('formater', 'tracker\Helpers\HtmlFormating')


@section('heading')Dependencies @endsection
@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li class="active">
        <a href="{{ URL::asset('dependencies') }}">Dependencies</a>
    </li>

@endsection


@section('content')

        <!-- widget grid -->
    <section id="widget-grid" class="">


        <div class="row">

            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-dependencies" data-widget-editbutton="false" data-widget-deletebutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-link"></i> </span>
                        <h2>Dependencies</h2>

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

                            <table id="dt_dependencies" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th class="text-nowrap" data-class="expand">ID</th>
                                <th>Status</th>
                                <th>Subject</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th data-hide="phone,tablet">Owner</th>
                                <th data-hide="phone,tablet">Review</th>
                                <th data-hide="phone,tablet">Type</th>
                                <th data-hide="phone,tablet">Dependent On</th>
                                <th data-hide="phone,tablet"><i class="fa fa-bolt"></i> </th>
                                <th data-hide="phone,tablet"><i class="fa fa-comments-o"></i> </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($dependencies as $dependency)
                                    <tr>
                                        <td>{{$dependency->id}}</td>
                                        <td>{{$dependency->status}}</td>
                                        <td>{{$dependency->subject_type}}</td>
                                        <td>{{$dependency->subject_name}}</td>
                                        <td>{{$dependency->title}}</td>
                                        <td><img alt="image" height="30" class="img-circle" src="{{ URL::asset($dependency->Owner->avatar) }}" /> {{$dependency->Owner->name}}</td>
                                        <td class="text-nowrap">{{$dependency->NextReviewDate->format('d M Y')}}</td>
                                        <td>{{$dependency->dependent_on_type}}</td>
                                        <td>{{$dependency->dependent_on_name}}</td>
                                        <td>{{$dependency->Actions->count()}}</td>
                                        <td>{{$dependency->Comments->count()}}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ URL::asset('dependencies/') }}/{{$dependency['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-folder"></i></a>
                                            <a href="{{action('DependencyController@edit', [$dependency->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                            @if( auth()->check() && auth()->user()->isAdmin() )
                                                    <a class="btn btn-default btn-sm"
                                                       rel="tooltip" data-placement="top" data-original-title="Delete"
                                                       href="{{action('DependencyController@destroy', $dependency->id)}}"
                                                       data-delete=""
                                                       data-title="Delete Dependency"
                                                       data-message="Are you sure you want to delete this Dependency?"
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

            var breakpointDefinition = {
            tablet : 1024,
            phone : 480
            };


            $('#dt_dependencies').dataTable({

            // Tabletools options:
            //   https://datatables.net/extensions/tabletools/button_options

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
            {"targets": [11],"orderable": false},
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
            responsiveHelper = new ResponsiveDatatablesHelper($('#dt_dependencies'), breakpointDefinition);
            }
            },
            "rowCallback" : function(nRow) {
            responsiveHelper.createExpandIcon(nRow);
            },
            });


            var table = $('#dt_dependencies').DataTable();

            var filteredData = table
            .column( 1 )
            .search('Open');

            table.draw();


@endsection

@section('scripts')

    <script>
        $('#showclosed').click(function() {

            var table = $('#dt_dependencies').DataTable();

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

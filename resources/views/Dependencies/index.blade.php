{{\tracker\Helpers\Session::SetRedirect(action('DependencyController@index', [$subjecttype, $subjectid]))}}

@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">


    <div class="row">

        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-dependencies" data-widget-editbutton="false" data-widget-deletebutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-bolt"></i> </span>
                    <h2>Dependencies</h2>

                    <div class="widget-toolbar">
                        <a href="{{action('DependencyController@create', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new Dependency</a>
                    </div>
                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body no-padding">

                        <table id="dt_dependencies" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>

                                <th  class="text-nowrap" data-class="expand">Title</th>
                                <th>Type</th>
                                <th>Dependence</th>
                                <th data-hide="phone,tablet">Status</th>
                                <th data-hide="phone,tablet">Owner</th>
                                <th data-hide="phone,tablet">Next Review</th>
                                <th data-hide="phone,tablet">Description</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($dependencies as $dependency)

                                <tr>
                                    <td>{{$dependency->title}}</td>
                                    <td>@if($dependency->unlinked) External @else {{$dependency->dependent_on_type}} @endif</td>
                                    <td>{{$dependency->dependent_on_name}}</td>
                                    <td>{{$dependency['status']}}</td>
                                    <td><span rel="tooltip" data-placement="top" data-original-title="{{$dependency->Owner->name}}"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($dependency->Owner->avatar) }}" /></span></td>
                                    <td class="text-nowrap">{{$dependency->NextReviewDate->format('d M Y')}}</td>
                                    <td>{{$dependency->description}}</td>

                                    <td class="text-nowrap"><a href="{{ URL::asset('dependencies/') }}/{{$dependency['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        <a href="{{action('DependencyController@edit', [$dependency->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        @if( auth()->check() && auth()->user()->isAdmin() )
                                            <a class="btn btn-default btn-sm"
                                               rel="tooltip" data-placement="top" data-original-title="Delete"
                                               href="{{action('DependencyController@destroy', $dependency->id)}}"
                                               data-delete=""
                                               data-title="Delete Dependency"
                                               data-message="Are you sure you want to delete this dependency?"
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
    //   https://datatables.net/extensions/tabletools/button_options             stateSave: true,
    stateSave: true,
    "createdRow": function ( row, data, index )
    {
    if (beforenow( data[5] )) {
    $('td', row).eq(5).addClass('text-danger').css('font-weight', 'bold');
    }
    else if (next5days( data[5] )) {
    $('td', row).eq(5).addClass('text-warning').css('font-weight', 'bold');
    }
    },
    "pageLength": 20,
    "order": [[ 5, "asc" ]],
    "columnDefs": [
    {"targets": [7],"orderable": false},
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
@endsection
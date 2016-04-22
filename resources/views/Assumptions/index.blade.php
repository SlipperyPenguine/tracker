{{\tracker\Helpers\Session::SetRedirect(action('AssumptionController@index', [$subjecttype, $subjectid]))}}

@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="jarviswidget jarviswidget-color-darken" id="wid-id-assumptions" data-widget-editbutton="false" data-widget-deletebutton="false">

        <header>
            <span class="widget-icon"> <i class="fa fa-map-marker"></i> </span>
            <h2>{{$title}}</h2>

        </header>

        <!-- widget div-->
        <div>

            <!-- widget content -->
            <div class="widget-body">

                <table id="dt_assumptions" class="table table-striped table-bordered table-hover" width="100%">
                    <thead>
                    <tr>

                        <th  data-class="expand">Owner</th>
                        <th>ID</th>
                        <th>Title</th>
                        <th data-hide="phone,tablet">Status</th>
                        <th data-hide="phone,tablet">Due</th>
                        <th data-hide="phone,tablet">Description</th>
                        <th data-hide="phone,tablet">Raised</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($items as $assumption)

                        <tr>
                            <td class="tooltip-demo text-nowrap">
                                <span data-toggle="tooltip" data-placement="top" title="{{$assumption->Owner->name}}"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($assumption->Owner->avatar) }}" /></span>
                            </td>
                            <td >{{$assumption->id}}</td>
                            <td>{{$assumption['title']}}</td>
                            <td>{{$assumption['status']}}</td>
                            <td class="text-nowrap">{{$assumption->DueDate->format('d M Y')}}</td>
                            <td>{{$assumption['description']}}</td>
                            <td>@if(isset($assumption->meeting_id)) {{$assumption->Meeting->title}}  @else {{$assumption['raised']}} @endif</td>
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

                <div class="widget-footer">
                    <div class="pull-left">
                        <a href="{{action('AssumptionController@create', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm">Add new Assumption</a>

                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection

@section('readyfunction')

    var responsiveHelper_dt_assumptions = undefined;

    $('#dt_assumptions').dataTable({
    stateSave: true,
    "createdRow": function ( row, data, index )
        {
            if (beforenow( data[4] )) {
                $('td', row).eq(4).addClass('text-danger').css('font-weight', 'bold');
            }
            else if (next5days( data[4] )) {
                $('td', row).eq(4).addClass('text-warning').css('font-weight', 'bold');
            }
        },
    "pageLength": 25,
    "order": [[ 4, "asc" ]],
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
    if (!responsiveHelper_dt_assumptions) {
    responsiveHelper_dt_assumptions = new ResponsiveDatatablesHelper($('#dt_assumptions'), breakpointDefinition_tracker);
    }
    },
    "rowCallback" : function(nRow) {
    responsiveHelper_dt_assumptions.createExpandIcon(nRow);
    },
    });

@endsection
{{\tracker\Helpers\Session::SetRedirect(action('ProgramController@index'))}}

@extends('layouts.main')

@section('heading')Programs @endsection
@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li>
        <a href="{{ URL::asset('programs') }}">Programs</a>
    </li>
    <li class="active">
        <strong>Program List</strong>
    </li>
@endsection


@section('content')

        <!-- widget grid -->
    <section id="widget-grid" class="">


        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-deletebutton="false">
                    <!-- widget options:
                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                    data-widget-colorbutton="false"
                    data-widget-editbutton="false"
                    data-widget-togglebutton="false"
                    data-widget-deletebutton="false"
                    data-widget-fullscreenbutton="false"
                    data-widget-custombutton="false"
                    data-widget-collapsed="true"
                    data-widget-sortable="false"

                    -->
                    <header>
                        <span class="widget-icon"> <i class="fa fa-briefcase"></i> </span>
                        <h2>Programs </h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <div class="jarviswidget-editbox">
                            <!-- This area used as dropdown edit box -->

                        </div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body no-padding">

                            <div id="timeline"></div>

                            <table id="dt_programs" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th data-class="expand"><i class="fa fa-fw fa-road text-muted hidden-md hidden-sm hidden-xs"></i> Status</th>
                                    <th>Title</th>
                                    <th data-hide="phone,tablet">Description</th>
                                    <th data-hide="phone,tablet"><i class="fa fa-fw fa-tachometer txt-color-blue hidden-md hidden-sm hidden-xs"></i> RAG</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($programlist as $program)
                                    <tr>
                                        <td >
                                            <span class="label label-success">Active</span>
                                        </td>
                                        <td class="table-title">
                                            <a href="{{ URL::asset('programs/') }}/{{$program['id']}}">{{$program['name']}}</a>
                                        </td>
                                        <td style="width: 50%">
                                            {{$program['description']}}
                                        </td>

                                        <td>
                                            @if($program['RAG']=='R')
                                                <span class="label label-danger">Red</span>
                                            @elseif($program['RAG']=='A')
                                                <span class="label label-warning">Amber</span>
                                            @else
                                                <span class="label label-success">Green</span>
                                            @endif
                                        </td>
                                        <td >
                                            <a href="{{ URL::asset('programs/') }}/{{$program['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-folder"></i></a>
                                            <a href="#" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
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

@section('scripts')

    <script type="text/javascript">
        // DOM element where the Timeline will be attached
        var container = document.getElementById('timeline');

        // Create a DataSet (allows two way data-binding)
        var items = new vis.DataSet([
                @foreach($programlist as $program)
                    {id: {{$program->id}}, content: '<a style="color:white" href="{{ URL::asset('programs/') }}/{{$program['id']}}">{{$program->name}}</a>', start: '{{date_format($program->StartDate,'Y-m-d')}}', end: '{{date_format($program->EndDate,'Y-m-d')}}'},
                @endforeach
        ]);

        // Configuration for the Timeline
        var options = {};

        // Create a Timeline
        var timeline = new vis.Timeline(container, items, options);
    </script>

@endsection

@section('readyfunction')

    var responsiveHelper_datatable_tabletools = undefined;

    var breakpointDefinition = {
    tablet : 1024,
    phone : 480
    };


    $('#dt_programs').dataTable({

    // Tabletools options:
    //   https://datatables.net/extensions/tabletools/button_options
    stateSave: true,
    "pageLength": 25,
    "columnDefs": [ {"targets": [4],"orderable": false} ],
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
    "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
    },
    "autoWidth" : true,
    "preDrawCallback" : function() {
    // Initialize the responsive datatables helper once.
    if (!responsiveHelper_datatable_tabletools) {
    responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#dt_programs'), breakpointDefinition);
    }
    },
    "rowCallback" : function(nRow) {
    responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
    },
    "drawCallback" : function(oSettings) {
    responsiveHelper_datatable_tabletools.respond();
    }
    });


@endsection
{{\tracker\Helpers\Session::SetRedirect(action('MemberController@indexMember', [$subjecttype, $subjectid]))}}

@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">


    <div class="row">

        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-rags" data-widget-editbutton="false" data-widget-deletebutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-users"></i> </span>
                    <h2>Members</h2>

                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body">

                        <table id="dt_members" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th class="text-nowrap" data-class="expand"></th>
                                <th data-hide="phone,tablet">Name</th>
                                <th>Role</th>
                                <th class="text-nowrap"></th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($members as $member)

                                <tr>
                                    <td><img alt="image" height="30" class="img-circle" src="{{ URL::asset($member->User->avatar) }}" /></td>
                                    <td>{{$member->User->name}}</td>
                                    <td>{{$member->role}}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ URL::asset('members/') }}/{{$member['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-folder"></i></a>
                                        <a href="{{action('MemberController@editMember', [$member->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                        <div class="widget-footer">
                            <div class="pull-left">
                                <a href="{{action('MemberController@createMember', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm">Add new Member</a>

                            </div>

                        </div>

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


    $('#dt_members').dataTable({

    // Tabletools options:
    //   https://datatables.net/extensions/tabletools/button_options             stateSave: true,
    stateSave: true,
    "createdRow": function ( row, data, index )
    {
    if (beforenow( data[5] )) {
    $('td', row).eq(4).addClass('text-danger').css('font-weight', 'bold');
    }
    else if (next5days( data[5] )) {
    $('td', row).eq(4).addClass('text-warning').css('font-weight', 'bold');
    }
    },
    "pageLength": 20,
    "order": [[ 1, "asc" ]],
    "columnDefs": [
    {"targets": [3],"orderable": false},
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
    responsiveHelper = new ResponsiveDatatablesHelper($('#dt_members'), breakpointDefinition);
    }
    },
    "rowCallback" : function(nRow) {
    responsiveHelper.createExpandIcon(nRow);
    },
    });

@endsection


{{\tracker\Helpers\Session::SetRedirect(action('MeetingController@index', [$subjecttype, $subjectid]))}}

@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="jarviswidget jarviswidget-color-darken" id="wid-id-meetings" data-widget-editbutton="false" data-widget-deletebutton="false">

        <header>
            <span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
            <h2>Meetings</h2>

            <div class="widget-toolbar">
                <a href="{{action('MeetingController@create', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new Meeting</a>
            </div>
        </header>

        <!-- widget div-->
        <div>

            <!-- widget content -->
            <div class="widget-body no-padding">

                <table id="dt_meetings" class="table table-striped table-bordered table-hover" width="100%">
                    <thead>
                    <tr>

                        <th  data-class="expand">ID</th>
                        <th>Title</th>
                        <th data-hide="phone,tablet">Start</th>
                        <th data-hide="phone,tablet">Duration</th>
                        <th data-hide="always">Description</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($meetings as $meeting)

                        <tr>
                            <td >{{$meeting->id}}</td>
                            <td>{{$meeting['title']}}</td>

                            @if($meeting->all_day_event)
                                <td class="text-nowrap">{{$meeting->start_date->format('d M Y')}}</td>
                                <td>All Day Event</td>
                            @else
                                <td class="text-nowrap">{{$meeting->start_date->format('d M Y g:i a')}}</td>
                                <td>{{$meeting->duration}} hours</td>
                            @endif


                            <td>{{$meeting['description']}}</td>
                            <td class="text-nowrap">
                                <a href="{{ URL::asset('meetings/') }}/{{$meeting['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                                <a href="{{action('MeetingController@edit', [$meeting->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                @if( auth()->check() && auth()->user()->isAdmin() )
                                    <a class="btn btn-default btn-sm"
                                       rel="tooltip" data-placement="top" data-original-title="Delete"
                                       href="{{action('MeetingController@destroy', $meeting->id)}}"
                                       data-delete=""
                                       data-title="Delete Meeting"
                                       data-message="Are you sure you want to delete this meeting?"
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


@endsection

@section('readyfunction')

    var responsiveHelper_dt_meetings = undefined;

    $('#dt_meetings').dataTable({

    // Tabletools options:
    //   https://datatables.net/extensions/tabletools/button_options
    stateSave: true,

    "pageLength": 25,
    "order": [[ 2, "asc" ]],
    "columnDefs": [
        {"targets": [5],"orderable": false},
    ],
    @include('partials.datatableDefaultOptions')
    "preDrawCallback" : function() {
    // Initialize the responsive datatables helper once.
    if (!responsiveHelper_dt_meetings) {
    responsiveHelper_dt_meetings = new ResponsiveDatatablesHelper($('#dt_meetings'), breakpointDefinition_tracker);
    }
    },
    "rowCallback" : function(nRow) {
    responsiveHelper_dt_meetings.createExpandIcon(nRow);
    },
    });

@endsection
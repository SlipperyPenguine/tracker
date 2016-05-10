{{\tracker\Helpers\Session::SetRedirect(action('ActionController@index', [$subjecttype, $subjectid]))}}

@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="jarviswidget jarviswidget-color-darken" id="wid-id-actions" data-widget-editbutton="false" data-widget-deletebutton="false">

        <header>
            <span class="widget-icon"> <i class="fa fa-bolt"></i> </span>
            <h2>{{$title}}</h2>

            <div class="widget-toolbar">
                <a href="{{action('ActionController@create', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new Action</a>
            </div>

        </header>

        <!-- widget div-->
        <div>

            <!-- widget content -->
            <div class="widget-body no-padding">

                <table id="dt_actions" class="table table-striped table-bordered table-hover" width="100%">
                    <thead>
                    <tr>

                        <th  data-class="expand">Actionee</th>
                        <th>ID</th>
                        <th>Title</th>
                        <th data-hide="phone,tablet">Status</th>
                        <th data-hide="phone,tablet">Due</th>
                        <th data-hide="always">Description</th>
                        <th data-hide="phone,tablet">Raised</th>
                        <th data-hide="phone,tablet">Last Commment</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($actions as $action)

                        <tr>
                            <td class="tooltip-demo text-nowrap">
                                <span data-toggle="tooltip" data-placement="top" title="{{$action->Actionee->name}}"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($action->Actionee->avatar) }}" /></span>
                            </td>
                            <td >{{$action->id}}</td>
                            <td>{{$action['title']}}</td>
                            <td>{{$action['status']}}</td>
                            <td class="text-nowrap">{{$action->DueDate->format('d M Y')}}</td>
                            <td>{{$action['description']}}</td>
                            <td>@if(isset($action->meeting_id)) {{$action->Meeting->title}}  @else {{$action['raised']}} @endif</td>
                            <td>@if($action->Comments->count()>0) {{$action->Comments->last()->pivot->comment}} @endif</td>
                            <td class="text-nowrap">
                                <a href="{{ URL::asset('actions/') }}/{{$action['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                                <a href="{{action('ActionController@edit', [$action->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                @if( auth()->check() && auth()->user()->isAdmin() )
                                    <a class="btn btn-default btn-sm"
                                       rel="tooltip" data-placement="top" data-original-title="Delete"
                                       href="{{action('ActionController@destroy', $action->id)}}"
                                       data-delete=""
                                       data-title="Delete Action"
                                       data-message="Are you sure you want to delete this action?"
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

    var responsiveHelper_dt_actions = undefined;

    $('#dt_actions').dataTable({

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

    @include('partials.datatableDefaultOptions')

    "preDrawCallback" : function() {
    // Initialize the responsive datatables helper once.
    if (!responsiveHelper_dt_actions) {
    responsiveHelper_dt_actions = new ResponsiveDatatablesHelper($('#dt_actions'), breakpointDefinitiondt_tracker);
    }
    },
    "rowCallback" : function(nRow) {
    responsiveHelper_dt_actions.createExpandIcon(nRow);
    },
    });

@endsection
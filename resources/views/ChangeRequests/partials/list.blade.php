<div class="jarviswidget jarviswidget-color-darken" id="wid-id-changerequests" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-adjust"></i> </span>
        <h2>Change Requests</h2>

        <div class="widget-toolbar">
            <a href="{{action('ChangeRequestController@create', [$subject->subjecttype, $subject->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new Change Request</a>
            <a href="{{action('ChangeRequestController@index', [$subject->subjecttype, $subject->id])}}" class="btn btn-default"><i class="fa fa-eye"></i> View All </a>
        </div>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body no-padding">

            <table id="dt_changerequests" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>
                    <th  data-class="expand">Ref</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th data-hide="always">Description</th>
                    <th class="text-nowrap"></th>

                </tr>
                </thead>
                <tbody>

                @foreach($subject->ChangeRequests as $changerequest)

                    <tr>
                        <td>{{$changerequest->external_id}}</td>
                        <td>{{$changerequest->title}}</td>
                        <td>{{$changerequest['status']}}</td>
                        <td>{{$changerequest['description']}}</td>

                        <td><a href="{{ URL::asset('changerequests/') }}/{{$changerequest['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                            <a href="{{action('ChangeRequestController@edit', [$changerequest->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            @if( auth()->check() && auth()->user()->isAdmin() )
                                <a class="btn btn-default btn-sm"
                                   rel="tooltip" data-placement="top" data-original-title="Delete"
                                   href="{{action('ChangeRequestController@destroy', $changerequest->id)}}"
                                   data-delete=""
                                   data-title="Delete Change Request"
                                   data-message="Are you sure you want to delete this change request?"
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



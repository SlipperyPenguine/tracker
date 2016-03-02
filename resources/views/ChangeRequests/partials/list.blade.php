<div class="jarviswidget jarviswidget-color-darken" id="wid-id-changerequests" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-adjust"></i> </span>
        <h2>Change Requests</h2>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body">

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

                        <td><a href="{{ URL::asset('changerequests/') }}/{{$changerequest['id']}}" class="btn btn-default btn-sm"><i class="fa fa-folder"></i> View </a>
                            <a href="{{action('ChangeRequestController@edit', [$changerequest->id])}}" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i> Edit </a></td>

                    </tr>

                @endforeach

                </tbody>
            </table>

            <div class="widget-footer">
                <div class="pull-left">
                    <a href="{{action('ChangeRequestController@create', [$subject->subjecttype, $subject->id])}}" class="btn btn-primary btn-sm">Add new Change Request</a>

                </div>
                <a href="{{action('ChangeRequestController@index', [$subject->subjecttype, $subject->id])}}" class="btn btn-default"><i class="fa fa-folder"></i> View All </a>

            </div>

        </div>
    </div>
</div>



<div class="jarviswidget jarviswidget-color-darken" id="wid-id-actions" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-bolt"></i> </span>
        <h2>Actions</h2>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body">

            <table id="dt_actions" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>

                    <th  data-class="expand">Actionee</th>
                    <th>ID</th>
                    <th>Title</th>
                    <th data-hide="phone,tablet">Status</th>
                    <th data-hide="phone,tablet">Due</th>
                    <th data-hide="always">Description</th>
                    <th data-hide="always">Raised</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($subject->Actions as $action)

                    <tr>
                        <td class="tooltip-demo text-nowrap">
                            <span data-toggle="tooltip" data-placement="top" title="{{$action->Actionee->name}}"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($action->Actionee->avatar) }}" /></span>
                        </td>
                        <td >{{$action->id}}</td>
                        <td>{{$action['title']}}</td>
                        <td>{{$action['status']}}</td>
                        <td class="text-nowrap">{{$action->DueDate->format('d M Y')}}</td>
                        <td>{{$action['description']}}</td>
                        <td>{{$action['raised']}}</td>
                        <td class="text-nowrap">
                            <a href="{{ URL::asset('actions/') }}/{{$action['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-folder"></i></a>
                            <a href="{{action('ActionController@editAction', [$action->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                        </td>


                    </tr>

                @endforeach

                </tbody>
            </table>

            <div class="widget-footer">
                <div class="pull-left">
                    <a href="{{action('ActionController@createAction', [$subject->subjecttype, $subject->id])}}" class="btn btn-primary btn-sm">Add new Action</a>

                    </div>
                    <a href="{{action('ActionController@indexAction', [$subject->subjecttype, $subject->id])}}" class="btn btn-default"><i class="fa fa-folder"></i> View All </a>

            </div>

        </div>
    </div>
</div>


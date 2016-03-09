<div class="jarviswidget jarviswidget-color-darken" id="wid-id-actions" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-bolt"></i> </span>
        <h2>Actions</h2>

        <div class="widget-toolbar" id="switch-1">
            <span class="onoffswitch-title"><i class="fa fa-filter"></i> Open Only</span>
										<span class="onoffswitch">
											<input type="checkbox" name="showactionclosed" class="onoffswitch-checkbox" id="showactionclosed" checked>
											<label class="onoffswitch-label" for="showactionclosed">
                                                <span class="onoffswitch-inner" data-swchon-text="Yes" data-swchoff-text="No"></span>
                                                <span class="onoffswitch-switch"></span> </label>
											</span>
        </div>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body">

            <table id="dt_actions" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>
                    <th data-class="expand">ID</th>
                    <th>Subject</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th data-hide="phone,tablet">Status</th>
                    <th data-hide="phone,tablet">Due</th>
                    <th data-hide="always">Description</th>
                    <th data-hide="always">Raised</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($user->Actions() as $action)

                    <tr>
                        <td >{{$action->id}}</td>
                        <td>{{$action->subject_type}}</td>
                        <td>{{$action->subject_name}}</td>
                        <td>{{$action['title']}}</td>
                        <td>{{$action['status']}}</td>
                        <td class="text-nowrap">{{$action->DueDate->format('d M Y')}}</td>
                        <td>{{$action['description']}}</td>
                        <td>{{$action['raised']}}</td>
                        <td class="text-nowrap">
                            <a href="{{ URL::asset('actions/') }}/{{$action['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-folder"></i></a>
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


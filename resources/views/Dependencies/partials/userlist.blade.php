<div class="jarviswidget jarviswidget-color-darken" id="wid-id-dependencies" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-link"></i> </span>
        <h2>Dependencies</h2>

        <div class="widget-toolbar" id="switch-1">
            <span class="onoffswitch-title"><i class="fa fa-filter"></i> Open Only</span>
										<span class="onoffswitch">
											<input type="checkbox" name="showdependencyclosed" class="onoffswitch-checkbox" id="showdependencyclosed" checked>
											<label class="onoffswitch-label" for="showdependencyclosed">
                                                <span class="onoffswitch-inner" data-swchon-text="Yes" data-swchoff-text="No"></span>
                                                <span class="onoffswitch-switch"></span> </label>
											</span>
        </div>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body">

            <table id="dt_dependencies" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>
                    <th data-class="expand">ID</th>
                    <th>Subject</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th data-hide="phone,tablet">Status</th>
                    <th data-hide="phone,tablet">Next Review</th>
                    <th data-hide="always">Type</th>
                    <th data-hide="always">Dependent On</th>
                    <th data-hide="always">Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($user->Dependencies() as $dependency)

                    <tr>
                        <td >{{$dependency->id}}</td>
                        <td>{{$dependency->subject_type}}</td>
                        <td>{{$dependency->subject_name}}</td>
                        <td>{{$dependency['title']}}</td>
                        <td>{{$dependency['status']}}</td>
                        <td class="text-nowrap">{{$dependency->NextReviewDate->format('d M Y')}}</td>
                        <td>{{$dependency['dependent_on_type']}}</td>
                        <td>{{$dependency['dependent_on_name']}}</td>
                        <td>{{$dependency['description']}}</td>
                        <td class="text-nowrap">
                            <a href="{{ URL::asset('dependencies/') }}/{{$dependency['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-folder"></i></a>
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


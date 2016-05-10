<div class="jarviswidget jarviswidget-color-darken" id="wid-id-assumptions" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-map-marker"></i> </span>
        <h2>Assumptions</h2>

        <div class="widget-toolbar" id="switch-1">
            <span class="onoffswitch-title"><i class="fa fa-filter"></i> Open Only</span>
										<span class="onoffswitch">
											<input type="checkbox" name="showassumptionclosed" class="onoffswitch-checkbox" id="showassumptionclosed" checked>
											<label class="onoffswitch-label" for="showassumptionclosed">
                                                <span class="onoffswitch-inner" data-swchon-text="Yes" data-swchoff-text="No"></span>
                                                <span class="onoffswitch-switch"></span> </label>
											</span>
        </div>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body no-padding">

            <table id="dt_assumptions" class="table table-striped table-bordered table-hover" width="100%">
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

                @foreach($user->Assumptions() as $assumption)

                    <tr>
                        <td >{{$assumption->id}}</td>
                        <td>{{$assumption->subject_type}}</td>
                        <td>{{$assumption->subject_name}}</td>
                        <td>{{$assumption['title']}}</td>
                        <td>{{$assumption['status']}}</td>
                        <td class="text-nowrap">{{$assumption->DueDate->format('d M Y')}}</td>
                        <td>{{$assumption['description']}}</td>
                        <td>@if(isset($assumption->meeting_id)) {{$assumption->Meeting->title}}  @else {{$assumption['raised']}} @endif</td>
                        <td class="text-nowrap">
                            <a href="{{ URL::asset('assumption/') }}/{{$assumption['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
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

        </div>
    </div>
</div>


<div class="jarviswidget jarviswidget-color-darken" id="wid-id-actions" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-bolt"></i> </span>
        <h2>Actions</h2>
        <div class="widget-toolbar">
            <a href="{{action('ActionController@create', [$subject->subjecttype, $subject->id])}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add new Action</a>
            <a href="{{action('ActionController@index', [$subject->subjecttype, $subject->id])}}" class="btn btn-default btn-xs"><i class="fa fa-eye"></i> View All </a>
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
                    <th data-hide="always">Raised</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($subject->Actions()->Active()->get() as $action)

                    <tr>
                        <td class="tooltip-demo text-nowrap">
                            <span rel="tooltip" data-placement="top" data-original-title="{{$action->Actionee->name}}"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($action->Actionee->avatar) }}" /></span>
                        </td>
                        <td >{{$action->id}}</td>
                        <td>{{$action['title']}}</td>
                        <td>{{$action['status']}}</td>
                        <td class="text-nowrap">{{$action->DueDate->format('d M Y')}}</td>
                        <td>{{$action['description']}}</td>
                        <td>@if(isset($action->meeting_id)) {{$action->Meeting->title}}  @else {{$action['raised']}} @endif</td>
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


<div class="jarviswidget jarviswidget-color-darken" id="wid-id-dependencies" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-link"></i> </span>
        <h2>Dependencies</h2>

        <div class="widget-toolbar">
            <a href="{{action('DependencyController@create', [$subject->subjecttype, $subject->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new Dependency</a>
            <a href="{{action('DependencyController@index', [$subject->subjecttype, $subject->id])}}" class="btn btn-default"><i class="fa fa-eye"></i> View All </a>
        </div>
    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body no-padding">

            <table id="dt_dependencies" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>

                    <th  class="text-nowrap" data-class="expand">Title</th>
                    <th>Type</th>
                    <th>Dependence</th>
                    <th data-hide="phone,tablet">Status</th>
                    <th data-hide="phone,tablet">Owner</th>
                    <th data-hide="phone,tablet">Next Review</th>
                    <th></th>
                    <th data-hide="always">Description</th>

                </tr>
                </thead>
                <tbody>

                @foreach($subject->Dependencies as $dependency)

                    <tr>
                        <td>{{$dependency->title}}</td>
                        <td>@if($dependency->unlinked) External @else {{$dependency->dependent_on_type}} @endif</td>
                        <td>{{$dependency->dependent_on_name}}</td>
                        <td>{{$dependency['status']}}</td>
                        <td><span rel="tooltip" data-placement="top" data-original-title="{{$dependency->Owner->name}}"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($dependency->Owner->avatar) }}" /></span></td>
                        <td class="text-nowrap">{{$dependency->NextReviewDate->format('d M Y')}}</td>

                        <td class="text-nowrap"><a href="{{ URL::asset('dependencies/') }}/{{$dependency['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
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

                        <td>{{$dependency->description}}</td>

                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>


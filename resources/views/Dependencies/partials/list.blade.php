<div class="ibox float-e-margins">
    <div class="ibox-title">
        <a class="darktext" href="{{action('DependencyController@index', [$subject->subjecttype, $subject->id])}}"><h5 ><i class="fa fa-bolt"></i> Dependencies</h5></a>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#">Config option 1</a>
                </li>
                <li><a href="#">Config option 2</a>
                </li>
            </ul>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content ">
        <table class="table table-hover no-margins">
            <thead>
            <tr>

                <th>Title</th>
                <th>Type</th>
                <th>Dependence</th>
                <th>Status</th>
                <th>Next Review</th>
                <th>Description</th>
                <th></th>
            </thead>
            <tbody>

            @foreach($subject->Dependencies()->orderBy('NextReviewDate')->get() as $dependency)

                <tr>
                    <td>{{$dependency->title}}</td>
                    <td>@if($dependency->unlinked) External @else {{$dependency->dependent_on_type}} @endif</td>
                    <td>{{$dependency->dependent_on_name}}</td>
                    <td>{{$dependency['status']}}</td>
                    <td class="text-nowrap"> {!! tracker\Helpers\HtmlFormating::StandardDateHTML($dependency->NextReviewDate, false, true, true) !!} </td>
                    <td>{{$action['description']}}</td>

                    <td><a href="{{ URL::asset('dependencies/') }}/{{$dependency['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                        <a href="{{action('DependencyController@edit', [$dependency->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a></td>

                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
    <div class="ibox-footer">
        <div class="pull-right">
            <a href="{{action('DependencyController@index', [$subject->subjecttype, $subject->id])}}" class="btn btn-white"><i class="fa fa-folder"></i> View All </a>
        </div>
        <a href="{{action('DependencyController@create', [$subject->subjecttype, $subject->id])}}" class="btn btn-primary btn-sm">Add new Dependency</a>
    </div>
</div>
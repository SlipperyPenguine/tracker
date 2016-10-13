<div class="jarviswidget jarviswidget-color-darken" id="wid-id-projects" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-tasks"></i> </span>
        <h2>Projects</h2>

        <div class="widget-toolbar">
            <a href="{{action('ProjectController@create', ['WorkStream', $subject->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new Project</a>
            {{--<a href="{{action('ProjectController@index', ['WorkStream', $subject->id])}}" class="btn btn-default"><i class="fa fa-eye"></i> View All </a>--}}
        </div>

        <div class="widget-toolbar" id="switch-1">
            <span class="onoffswitch-title"><i class="fa fa-filter"></i> Active Only</span>
            <span class="onoffswitch">
											<input type="checkbox" name="showprojectclosed" class="onoffswitch-checkbox" id="showprojectclosed" checked>
											<label class="onoffswitch-label" for="showprojectclosed">
                                                <span class="onoffswitch-inner" data-swchon-text="Yes" data-swchoff-text="No"></span>
                                                <span class="onoffswitch-switch"></span> </label>
											</span>
        </div>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body">

            <div id="projecttimeline"></div>
            <br/>

            <table id="dt_projects" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>

                    <th class="text-nowrap" data-class="expand" >Title</th>
                    <th data-hide="phone,tablet">PI</th>
                    <th data-hide="phone,tablet">RAG</th>
                    <th data-hide="phone,tablet">Status</th>
                    <th  data-hide="phone,tablet">Start</th>
                    <th  data-hide="phone,tablet">End</th>
                    <th></th>


                </tr>
                </thead>
                <tbody>

                @foreach($subject->Projects as $project)

                    <tr>

                        <td class="table-title">
                            <a href="{{ URL::asset('programs/') }}/{{$program['id']}}/workstreams/{{$subject['id']}}/projects/{{$project->id}}">{{$project['name']}}</a>
                        </td>
                        <td>{{$project['PI']}}</td>

                        <td>

                            <div class="tooltip-demo">

                                @foreach($project->RAGs as $rag)



                                    @if($rag['value']=='R')
                                        <span class="badge bg-color-redLight" data-toggle="tooltip" data-placement="top" title="{{$rag['title']}}">R</span>
                                    @elseif($rag['value']=='A')
                                        <span class="badge bg-color-yellow  " data-toggle="tooltip" data-placement="top" title="{{$rag['title']}}">A</span>
                                    @else
                                        <span class="badge bg-color-greenLight  " data-toggle="tooltip" data-placement="top" title="{{$rag['title']}}">G</span>
                                    @endif

                                @endforeach

                            </div>


                        </td>

                        <td>{{$project['StatusText']}}</td>

                        <td class="text-nowrap">{{$project->StartDate->format('d M Y')}}</td>

                        <td class="text-nowrap">{{$project->EndDate->format('d M Y')}}</td>

                        <td CLASS="text-nowrap">
                            <a href="{{ URL::asset('programs/') }}/{{$program['id']}}/workstreams/{{$subject['id']}}/projects/{{$project->id}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                            <a href="{{ URL::asset('programs/') }}/{{$program['id']}}/workstreams/{{$subject['id']}}/projects/{{$project->id}}/edit" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                        </td>

                    </tr>


                @endforeach


                </tbody>
            </table>

        </div>
    </div>
</div>

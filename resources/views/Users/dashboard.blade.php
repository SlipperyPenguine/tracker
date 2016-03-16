@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li>
        <a href="{{ URL::asset('users') }}">Users</a>
    </li>
    <li>
        <a href="{{ URL::asset('users/') }}{{$user->id}}">{{$user->name}}</a>
    </li>
    <li class="active">
        <strong><a href="{{ URL::asset('users/') }}{{$user->id}} /dashboard">Dashboard</a></strong>
    </li>
@endsection

@section('content')

        <!-- widget grid -->
    <section id="widget-grid" class="">

        <!-- Top Banner row -->
        <div class="row">
            <article class="col-lg-12">

                <div class="well">
                    <table width="100%">
                        <tr>
                            <td>
                                <div class="pull-left"> <img alt="image" class="img-rounded img-responsive"  height="50px" width="50px" src="{{ URL::asset($user->avatar) }}"  /></div>
                                <H1 class="text-danger slideInRight fast animated"><strong> &nbsp; {{$user->name}} <i>Dashboard</i> </strong> </H1>
                            </td>

                        </tr>
                    </table>
                </div>
            </article>
        </div>
        <!-- END Top Banner row -->

        <!-- Metrics -->
        <div class="row">

            <div class="col col-lg-2">

                <div class="well well-sm bg-color-darken txt-color-white text-center">
                    <table width="100%">
                        <tr >
                            <td rowspan="2"><i class="fa fa-5x fa-calendar"></i></td>
                            <td>
                                <h4>{{$user->TaskCount()}} Tasks</h4>
                            </td>
                        </tr>
                        <tr>
                            <td><h4><strong><i>&nbsp;</i></strong></h4></td>

                        </tr>
                    </table>

                </div>
            </div>

            <div class="col col-lg-2">

                <div class="well well-sm bg-color-blueDark txt-color-white text-center">
                    <table width="100%">
                        <tr >
                            <td rowspan="2"><i class="fa fa-5x fa-bolt"></i></td>
                            <td>
                                <h4>{{$user->ActionCount()}} Actions</h4>
                            </td>
                        </tr>
                        <tr>
                            <td><h4><strong><i>{{$user->OverdueActionCount()}} Overdue</i></strong></h4></td>

                        </tr>
                    </table>

                </div>

            </div>

            <div class="col col-lg-2">

                <div class="well well-sm bg-color-greenDark txt-color-white text-center">
                    <table width="100%">
                        <tr >
                            <td rowspan="2"><i class="fa fa-5x fa-warning"></i></td>
                            <td>
                                <h4>{{$user->RiskCount()}} Risks</h4>
                            </td>
                        </tr>
                        <tr>
                            <td><h4><strong><i>{{$user->OverdueRiskCount()}} Overdue</i></strong></h4></td>

                        </tr>
                    </table>

                </div>
            </div>

            <div class="col col-lg-2">

                <div class="well well-sm bg-color-red txt-color-white text-center">
                    <table width="100%">
                        <tr >
                            <td rowspan="2"><i class="fa fa-5x fa-exclamation"></i></td>
                            <td>
                                <h4>{{$user->IssueCount()}} Issues</h4>
                            </td>
                        </tr>
                        <tr>
                            <td><h4><strong><i>{{$user->OverdueIssueCount()}} Outstanding</i></strong></h4></td>

                        </tr>
                    </table>

                </div>
            </div>

            <div class="col col-lg-2">

                <div class="well well-sm bg-color-blue txt-color-white text-center">
                    <table width="100%">
                        <tr >
                            <td rowspan="2"><i class="fa fa-5x fa-link"></i></td>
                            <td>
                                <h4>{{$user->DependencyCount()}} Dependencies</h4>
                            </td>
                        </tr>
                        <tr>
                            <td><h4><strong><i>{{$user->OverdueDependencyCount()}} Outstanding</i></strong></h4></td>

                        </tr>
                    </table>

                </div>
            </div>

        </div>

        <!-- Main widget row -->
        <div class="row">

            <article class="col-lg-6">

                <!-- Programs, Work Streams and Projects -->
                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-work" data-widget-editbutton="false" data-widget-deletebutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-cab"></i> </span>
                        <h2>Programs, Workstreams & Projects</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body">

                            <table id="dt_work" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>RAG</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($user->Programs() as $program)

                                    <tr>
                                        <td>Program</td>
                                        <td>{{$program['name']}}</td>
                                        <td><span class="text-green">Active</span></td>
                                        <td>
                                            @foreach($program->RAGs as $rag)



                                                @if($rag['value']=='R')
                                                    <span class="badge bg-color-redLight" rel="tooltip" data-placement="top" data-original-title="{{$rag['title']}}">R</span>
                                                @elseif($rag['value']=='A')
                                                    <span class="badge bg-color-orange" rel="tooltip" data-placement="top" data-original-title="{{$rag['title']}}">A</span>
                                                @else
                                                    <span class="badge bg-color-greenLight" rel="tooltip" data-placement="top" data-original-title="{{$rag['title']}}">G</span>
                                                @endif

                                            @endforeach
                                        </td>

                                        <td class="text-nowrap">
                                            <a href="{{ URL::asset('programs/') }}/{{$program['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-folder"></i></a>
                                            <a href="#" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        </td>


                                    </tr>

                                @endforeach

                                @foreach($user->WorkStreams() as $workstream)

                                    <tr>
                                        <td>Work Stream</td>
                                        <td>{{$workstream['name']}}</td>

                                        <td>

                                        @if($workstream['status']==0)
                                            <span class="text-green">Active</span>
                                        @elseif($workstream['status']==1)
                                            <span class="text-muted">Not Started</span>
                                        @else
                                            <span class="text-muted">Closed</span>
                                        @endif
                                        </td>
                                        <td>
                                            @foreach($workstream->RAGs as $rag)



                                                @if($rag['value']=='R')
                                                    <span class="badge bg-color-redLight" rel="tooltip" data-placement="top" data-original-title="{{$rag['title']}}">R</span>
                                                @elseif($rag['value']=='A')
                                                    <span class="badge bg-color-orange" rel="tooltip" data-placement="top" data-original-title="{{$rag['title']}}">A</span>
                                                @else
                                                    <span class="badge bg-color-greenLight" rel="tooltip" data-placement="top" data-original-title="{{$rag['title']}}">G</span>
                                                @endif

                                            @endforeach
                                        </td>

                                        <td class="text-nowrap">
                                            <a href="{{ URL::asset('programs/') }}/{{$workstream->Program->id}}/workstreams/{{$workstream['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-folder"></i></a>
                                            <a href="#" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>

                                        </td>


                                    </tr>

                                @endforeach


                                @foreach($user->Projects() as $project)

                                    <tr>
                                        <td>Project</td>
                                        <td>{{$project['name']}}</td>

                                        <td>{{$project->StatusText}}</td>
                                        <td>
                                            @foreach($project->RAGs as $rag)



                                                @if($rag['value']=='R')
                                                    <span class="badge bg-color-redLight" rel="tooltip" data-placement="top" data-original-title="{{$rag['title']}}">R</span>
                                                @elseif($rag['value']=='A')
                                                    <span class="badge bg-color-orange" rel="tooltip" data-placement="top" data-original-title="{{$rag['title']}}">A</span>
                                                @else
                                                    <span class="badge bg-color-greenLight" rel="tooltip" data-placement="top" data-original-title="{{$rag['title']}}">G</span>
                                                @endif

                                            @endforeach
                                        </td>

                                        <td class="text-nowrap">
                                            <a href="{{ URL::asset('programs/') }}/{{$project->Program->id}}/workstreams/{{$project->WorkStream->id}}/projects/{{$project->id}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-folder"></i></a>
                                            <a href="{{ URL::asset('programs/') }}/{{$project->Program->id}}/workstreams/{{$project->WorkStream->id}}/projects/{{$project->id}}/edit" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                         </td>


                                    </tr>

                                @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                @include('Tasks.partials.userlist')

                @include('Dependencies.partials.userlist')

             </article>

            <article class="col-lg-6">
                @include('Actions.partials.userlist')

                @include('RisksAndIssues.partials.userlist')

            </article>

        </div>



    </section>
@endsection

@section('readyfunction')

    @include('Actions.partials.userlistreadtfunction')

    @include('Tasks.partials.userlistreadtfunction')

    @include('RisksAndIssues.partials.userlistreadtfunction')

    @include('Dependencies.partials.userlistreadtfunction')

@endsection

@section('scripts')

    <script>
        $('#showactionclosed').click(function() {

            var table = $('#dt_actions').DataTable();

            if (!$(this).is(':checked')) {
                //show everything
                var filteredData = table
                        .column( 4 )
                        .search('');
            }
            else
            {
                //only show open
                var filteredData = table
                        .column( 4 )
                        .search('Open');
            }

            table.draw();
        });

        $('#showtaskclosed').click(function() {

            var table = $('#dt_usertasks').DataTable();

            if (!$(this).is(':checked')) {
                //show everything
                var filteredData = table
                        .column( 4 )
                        .search('');
            }
            else
            {
                //only show open
                var filteredData = table
                        .column( 4 )
                        .search('Open');
            }

            table.draw();
        });

        $('#showriskclosed').click(function() {

            var table = $('#dt_userrisks').DataTable();

            if (!$(this).is(':checked')) {
                //show everything
                var filteredData = table
                        .column( 5 )
                        .search('');
            }
            else
            {
                //only show open
                var filteredData = table
                        .column( 5 )
                        .search('Open');
            }

            table.draw();
        });


        // Risks & issues Filter
        $('#risksandissues').click(function() {
            var table = $('#dt_userrisks').DataTable();
            var filteredData = table
                    .column( 3 )
                    .search('');
            table.draw();
        });

        // Risks Filter
        $('#risksonly').click(function() {
            var table = $('#dt_userrisks').DataTable();
            var filteredData = table
                    .column( 3 )
                    .search('Risk');
            table.draw();
        });

        // Issues Filter
        $('#issuesonly').click(function() {
            var table = $('#dt_userrisks').DataTable();
            var filteredData = table
                    .column( 3 )
                    .search('Issue');
            table.draw();
        });

        $(".js-status-update a").click(function() {
            var selText = $(this).text();
            var $this = $(this);
            $this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
            $this.parents('.dropdown-menu').find('li').removeClass('active');
            $this.parent().addClass('active');
        });

        $('#showdependencyclosed').click(function() {

            var table = $('#dt_dependencies').DataTable();

            if (!$(this).is(':checked')) {
                //show everything
                var filteredData = table
                        .column( 4 )
                        .search('');
            }
            else
            {
                //only show open
                var filteredData = table
                        .column( 4 )
                        .search('Open');
            }

            table.draw();
        });

    </script>
@endsection
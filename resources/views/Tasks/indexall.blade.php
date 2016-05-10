{{\tracker\Helpers\Session::SetRedirect(action('TaskController@indexall'))}}

@extends('layouts.main')

@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li class="active">
        <a href="{{ URL::asset('tasks') }}">Tasks</a>
    </li>

@endsection


@section('content')

        <!-- widget grid -->
    <section id="widget-grid" class="">


        <div class="row">

            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-tasks" data-widget-editbutton="false" data-widget-deletebutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
                        <h2>Tasks</h2>

                        <div class="widget-toolbar" id="switch-1">
                            <span class="onoffswitch-title"><i class="fa fa-filter"></i> Open Only</span>
										<span class="onoffswitch">
											<input type="checkbox" name="showclosed" class="onoffswitch-checkbox" id="showclosed" checked>
											<label class="onoffswitch-label" for="showclosed">
                                                <span class="onoffswitch-inner" data-swchon-text="Yes" data-swchoff-text="No"></span>
                                                <span class="onoffswitch-switch"></span> </label>
											</span>
                        </div>


                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body no-padding">

                            <table id="dt_tasks" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>

                                <th class="text-nowrap" data-class="expand">ID</th>
                                <th>Status</th>
                                <th>Subject</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th data-hide="phone,tablet">Actionee</th>
                                <th data-hide="phone,tablet">Type</th>
                                <th data-hide="phone,tablet">Start</th>
                                <th data-hide="phone,tablet">End</th>
                                <th data-hide="always">Description</th>
                                <th data-hide="phone,tablet"><i class="fa fa-bolt"></i> </th>
                                <th data-hide="phone,tablet"><i class="fa fa-comments-o"></i> </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{$task->id}}</td>
                                        <td>{{$task->status}}</td>
                                        <td>{{$task->subject_type}}</td>
                                        <td>{{$task->subject_name}}</td>
                                        <td>{{$task->title}}</td>
                                        <td><img alt="image" height="30" class="img-circle" src="{{ URL::asset($task->ActionOwner->avatar) }}" /> {{$task->ActionOwner->name}}</td>
                                        <td>@if($task->milestone)Milestone @else Task @endif </td>
                                        <td class="text-nowrap">{{$task->StartDate->format('d M Y')}}</td>
                                        <td @if(!$task->milestone) class="text-nowrap">{{$task->EndDate->format('d M Y')}} @endif </td>
                                        <td>{{$task->description}}</td>
                                        <td>{{$task->ActiveActionsCount}}</td>
                                        <td>{{$task->Comments->count()}}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ URL::asset('tasks/') }}/{{$task['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                                            <a href="{{action('TaskController@editTask', [$task->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                        </div>

                    </div>
                </div>
            </article>
        </div>

    </section>
@endsection


@section('readyfunction')

            var responsiveHelper = undefined;

            $('#dt_tasks').dataTable({

            "pageLength": 20,
            "order": [[ 0, "asc" ]],
            "columnDefs": [
            {"targets": [11],"orderable": false},
            ],
            @include('partials.datatableDefaultOptions')
            "preDrawCallback" : function() {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper) {
            responsiveHelper = new ResponsiveDatatablesHelper($('#dt_tasks'), breakpointDefinition_tracker);
            }
            },
            "rowCallback" : function(nRow) {
            responsiveHelper.createExpandIcon(nRow);
            },
            });


            var table = $('#dt_tasks').DataTable();

            var filteredData = table
            .column( 1 )
            .search('Open');

            table.draw();


@endsection

@section('scripts')

    <script>
        $('#showclosed').click(function() {

            var table = $('#dt_tasks').DataTable();

            if (!$(this).is(':checked')) {
                //show everything
                var filteredData = table
                        .column( 1 )
                        .search('');


            }
            else
            {
                //only show open
                var filteredData = table
                        .column( 1 )
                        .search('Open');
            }

            table.draw();
        });
    </script>
    @endsection

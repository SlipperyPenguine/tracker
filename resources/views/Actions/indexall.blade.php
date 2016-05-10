{{\tracker\Helpers\Session::SetRedirect(action('ActionController@indexall'))}}

@extends('layouts.main')

@inject('formater', 'tracker\Helpers\HtmlFormating')


@section('heading')Actions @endsection
@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li class="active">
        <a href="{{ URL::asset('actions') }}">Actions</a>
    </li>

@endsection


@section('content')

        <!-- widget grid -->
    <section id="widget-grid" class="">


        <div class="row">

            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-actions" data-widget-editbutton="false" data-widget-deletebutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-bolt"></i> </span>
                        <h2>Actions</h2>

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

                            <table id="dt_actions" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>

                            <tr>
                                <th></th>
                                <th></th>
                                <th >
                                    <input type="text" class="form-control" placeholder="Subject" id="subjectfilter" />
                                </th>
                                <th >
                                    <input type="text" class="form-control" placeholder="Name" id="namefilter" />
                                </th>
                                <th >
                                    <input type="text" class="form-control" placeholder="Title" id="titlefilter"/>
                                </th>
                                <th >
                                    <input type="text" class="form-control" placeholder="Actionee" id="actioneefilter" />
                                </th>
                                <th></th>
                                <th >
                                    <input type="text" class="form-control" placeholder="Raised" id="raisedfilter" />
                                </th>
                                <th>
                                    <input type="text" class="form-control" placeholder="Comment" id="commentfilter"/>
                                </th>
                                <th></th>
                                <th></th>
                            </tr>

                            <tr>
                                <th class="text-nowrap" data-class="expand">ID</th>
                                <th>Status</th>
                                <th>Subject</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th data-hide="phone,tablet">Actionee</th>
                                <th data-hide="phone,tablet">Due</th>
                                <th data-hide="phone,tablet">Raised</th>
                                <th class="text-nowrap" data-hide="phone,tablet">Latest Comment</th>
                                <th data-hide="always">Description</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($actions as $action)
                                    <tr>
                                        <td>{{$action->id}}</td>
                                        <td>{{$action->status}}</td>
                                        <td>{{$action->subject_type}}</td>
                                        <td>{{$action->subject_name}}</td>
                                        <td>{{$action->title}}</td>
                                        <td><img alt="image" height="30" class="img-circle" src="{{ URL::asset($action->Actionee->avatar) }}" /> {{$action->Actionee->name}}</td>
                                        <td class="text-nowrap">{{$action->DueDate->format('d M Y')}}</td>
                                        <td>@if(isset($action->meeting_id)) {{$action->Meeting->title}}  @else {{$action['raised']}} @endif</td>
                                        <td>@if($action->Comments->count()>0) {{$action->Comments->last()->pivot->comment}} @endif</td>
                                        <td>{{$action->description}}</td>
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
            </article>
        </div>

    </section>
@endsection


@section('readyfunction')


            var responsiveHelper = undefined;

            var table = $('#dt_actions').DataTable({

            "createdRow": function ( row, data, index )
            {
            if (beforenow( data[6] )) {
            $('td', row).eq(6).addClass('text-danger').css('font-weight', 'bold');
            }
            else if (next5days( data[6] )) {
            $('td', row).eq(6).addClass('text-warning').css('font-weight', 'bold');
            }
            },
            "pageLength": 20,
            "order": [[ 6, "asc" ]],
            "columnDefs": [
            {"targets": [10],"orderable": false},
            ],

            @include('partials.datatableDefaultOptions')

            "preDrawCallback" : function() {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper) {
            responsiveHelper = new ResponsiveDatatablesHelper($('#dt_actions'), breakpointDefinition_tracker);
            }
            },
            "rowCallback" : function(nRow) {
            responsiveHelper.createExpandIcon(nRow);
            },
            });

            // Apply the filter
            $("#dt_actions thead th input[type=text]").on( 'keyup change', function () {

            var colindex = $(this).parent().index();

            var filteredData = table
            .column( colindex )
            .search(this.value);

            table.draw();

            } );

            //var table = $('#dt_actions').DataTable();

            var filteredData = table.column(1).search('Open');

            table.draw();

            $('#subjectfilter').val(table.column(2).search());
            $('#namefilter').val(table.column(3).search());
            $('#titlefilter').val(table.column(4).search());
            $('#actioneefilter').val(table.column(5).search());
            $('#raisedfilter').val(table.column(7).search());
            $('#commentfilter').val(table.column(8).search());

@endsection

@section('scripts')

    <script>
        $('#showclosed').click(function() {

            var table = $('#dt_actions').DataTable();

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

{{\tracker\Helpers\Session::SetRedirect(action('MemberController@indexMember', [$subjecttype, $subjectid]))}}

@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">


    <div class="row">

        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="jarviswidget jarviswidget-color-darken" id="wid-id-rags" data-widget-editbutton="false" data-widget-deletebutton="false">

                <header>
                    <span class="widget-icon"> <i class="fa fa-users"></i> </span>
                    <h2>Members</h2>

                    <div class="widget-toolbar">
                        <a href="{{action('MemberController@createMember', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new Member</a>
                    </div>
                </header>

                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body no-padding">

                        <table id="dt_members" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                            <tr>
                                <th class="text-nowrap" data-class="expand"></th>
                                <th data-hide="phone,tablet">Name</th>
                                <th>Role</th>
                                <th class="text-nowrap"></th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($members as $member)

                                <tr>
                                    <td><img alt="image" height="30" class="img-circle" src="{{ URL::asset($member->User->avatar) }}" /></td>
                                    <td>{{$member->User->name}}</td>
                                    <td>{{$member->role}}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ URL::asset('members/') }}/{{$member['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                                        <a href="{{action('MemberController@editMember', [$member->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
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

    $('#dt_members').dataTable({

    "createdRow": function ( row, data, index )
    {
    if (beforenow( data[5] )) {
    $('td', row).eq(4).addClass('text-danger').css('font-weight', 'bold');
    }
    else if (next5days( data[5] )) {
    $('td', row).eq(4).addClass('text-warning').css('font-weight', 'bold');
    }
    },
    "pageLength": 20,
    "order": [[ 1, "asc" ]],
    "columnDefs": [
    {"targets": [3],"orderable": false},
    ],
    @include('partials.datatableDefaultOptions')
    "preDrawCallback" : function() {
    // Initialize the responsive datatables helper once.
    if (!responsiveHelper) {
    responsiveHelper = new ResponsiveDatatablesHelper($('#dt_members'), breakpointDefinition_tracker);
    }
    },
    "rowCallback" : function(nRow) {
    responsiveHelper.createExpandIcon(nRow);
    },
    });

@endsection


@extends('layouts.main')


@section('heading')Users @endsection
@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li class="active">
        <a href="{{ URL::asset('users') }}">Users</a>
    </li>

@endsection


@section('content')

        <!-- widget grid -->
    <section id="widget-grid" class="">

        <div class="row">
            <article class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-users" data-widget-editbutton="false" data-widget-deletebutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-users"></i> </span>
                        <h2>Users</h2>
                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body">

                            <table id="dt_users" class="table table-striped table-bordered table-hover" width="100%">

                            <thead>
                            <tr>
                                <th></th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Admin</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td><img alt="image" height="30" class="img-circle" src="{{ URL::asset($user->avatar) }}" /></td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->name}}</td>
                                        <td class="text-danger"> @if($user->superUser)Yes @endif </td>
                                        <td>
                                            <a href="{{ URL::asset('users/') }}/{{$user['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-folder"></i></a>
                                            <a href="{{action('UserController@edit', [$user->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                        </div>

                    </div>
                </div>
            </article>

            <article class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-newuser" data-widget-editbutton="false" data-widget-deletebutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-user"></i> </span>
                        <h2>Create New User</h2>
                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body">
                            {!! Form::open(['class'=>'smart-form', 'url'=>'users', 'id' => 'NewUserForm']) !!}

                            <fieldset>

                                <section>
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        {!! Form::text('name', null, ['placeholder'=>"Name"] ) !!}
                                        <b class="tooltip tooltip-bottom-right">Enter the users name</b> </label>
                                </section>

                                <section>
                                    <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
                                        {!! Form::text('email', null, ['placeholder'=>"Email Address"] ) !!}
                                        <b class="tooltip tooltip-bottom-right">Enter the users email address</b> </label>
                                </section>

                            </fieldset>

                            <fieldset>

                                <section>
                                    <label class="input"> <i class="icon-prepend fa fa-lock"></i>
                                        <input type="password" name="password" placeholder="Password" id="password">

                                        <b class="tooltip tooltip-bottom-right">Enter a password</b> </label>
                                </section>

                                <section>
                                    <label class="input"> <i class="icon-prepend fa fa-lock"></i>
                                        <input type="password" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation">
                                        <b class="tooltip tooltip-bottom-right">Confirm the users password</b> </label>
                                </section>

                            </fieldset>

                            <fieldset>

                                <section>
                                    <label class="checkbox">
                                        {!! Form::checkbox('superUser', 1, null, ['id' => 'superUser']) !!}
                                        <i></i>Administrator</label>
                                </section>

                            </fieldset>


                            <footer>
                                <button type="submit" class="btn btn-block btn-primary">
                                    Create User
                                </button>
                            </footer>

                            {!! Form::close() !!}
                        </div>

                    </div>

                </div>

            </article>
        </div>

    </section>


@endsection

@section('scripts')

@endsection

@section('readyfunction')


    var $MyForm = $("#NewUserForm").validate({
            rules: {
            name : {required : true },
            email : {
            required : true,
            email : true
            },
            password : {
            required : true,
            minlength : 3,
            maxlength : 20
            },
            password_confirmation : {
            required : true,
            minlength : 3,
            maxlength : 20,
            equalTo : '#password'
            } }
    });


    $('#dt_users').dataTable({

    "pageLength": 20,
    "order": [[ 2, "asc" ]],
    "columnDefs": [
    {"targets": [0,4],"orderable": false},
    ],
    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
    "t"+
    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
    "oTableTools": {
    "aButtons": [
    "copy",
    "csv",
    "xls",
    {
    "sExtends": "pdf",
    "sTitle": "Tracker_PDF",
    "sPdfMessage": "Tracker PDF Export",
    "sPdfSize": "letter"
    },
    {
    "sExtends": "print",
    "sMessage": "Generated by Tracker <i>(press Esc to close)</i>"
    }
    ],
    "sSwfPath": "{{ URL::asset('js/plugin/datatables/swf/copy_csv_xls_pdf.swf') }}"
    },
    "autoWidth" : true,

    });




@endsection

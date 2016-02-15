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

    <div class="row">
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>All Users</h5>
                    <div class="ibox-tools">
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-users" >
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
                                            <a href="{{ URL::asset('users/') }}/{{$user['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                            <a href="{{action('UserController@edit', [$user->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Admin</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Add a Users</h5>


                </div>
                <div class="ibox-content">

                    {!! Form::open(['class'=>'form-horizontal', 'url'=>'users', 'id' => 'NewUserForm']) !!}

                    <div class="form-group">

                        <label class="col-lg-4 control-label" for="name">Name</label>
                        <div class="col-lg-8">
                            {!! Form::text('name', null, ['placeholder'=>"Users name", 'class'=>"form-control", 'required'=>'required'] ) !!}
                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-4 control-label" for="email">Email</label>
                        <div class="col-lg-8">
                            {!! Form::email('email', null, ['placeholder'=>"Users email address", 'class'=>"form-control", 'type'=>'email', 'required'=>'required'] ) !!}
                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-4 control-label" for="password">Password</label>
                        <div class="col-lg-8">
                            <input id="password" class=" form-control" placeholder="Password" name="password" type="password" value="" minlength="6" required>
                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-4 control-label" for="passwordconfirm">Confirm Password</label>
                        <div class="col-lg-8">
                            <input id="password_confirmation" class=" form-control" placeholder="Confirm Password" name="password_confirmation" type="password" value="" minlength="6" required>
                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-4 control-label" for="milestone">Administrator</label>
                        <div class="col-lg-8">
                            <div class="i-checks"><label> {!! Form::checkbox('superUser', 1, null, ['id' => 'superUser']) !!}   <i></i>  </label></div>
                        </div>

                    </div>

                    <input type="submit" value="Create User" class="btn btn-block btn-primary ">

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
        <!-- Validate -->
    <script src="{{ URL::asset('js/plugins/validate/jquery.validate.min.js') }}"></script>

@endsection

@section('readyfunction')


            $("#NewUserForm").validate({
            rules: {
            password: "required",
            password_confirmation: {
            equalTo: "#password"
            }
            }
            });

            $('.dataTables-users').DataTable({
                "order": [[ 2, 'asc' ]],

                "columnDefs": [ {"targets": [0,4],"orderable": false} ],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'Users'},
                    {extend: 'pdf', title: 'Users'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                        }
                    }
                ]

            });




@endsection

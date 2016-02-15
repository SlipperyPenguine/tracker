@extends('layouts.main')

@section('heading')Edit profile for {{ $user->name }} @endsection

@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li>
        <a href="{{ URL::asset('users') }}">Users</a>
    </li>
    <li >
        <a href="{{ URL::asset('users/') }}/{{$user->id}}">{{$user->name}}</a>
    </li>
    <li class="active">
        <strong><a href="{{ URL::asset('users/') }}/{{$user->id}}/edit">Edit</a></strong>
    </li>
@endsection


@section('content')

    {!! Form::model($user, ['class'=>'form-horizontal', 'id' => 'EditUserForm', 'method' => 'PATCH', 'files'=>true, 'action'=>['UserController@update', $user->id]]) !!}

    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <img alt="image" height="500px" class="img-rounded" src="{{ URL::asset($user->avatar) }}"  />
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-content">

                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="name">Name</label>
                        <div class="col-lg-9">
                            {!! Form::text('name', null, [ 'class'=>"form-control" ] ) !!}
                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-3 control-label" for="email">Email</label>
                        <div class="col-lg-9">
                            {!! Form::email('email', null, ['class'=>"form-control", 'type'=>'email'] ) !!}
                        </div>

                    </div>

                    <hr/>

                    <div class="form-group">

                        <label class="col-lg-3 control-label" for="password">Password</label>
                        <div class="col-lg-9">
                            <input id="password" class=" form-control" placeholder="Password" name="password" type="password" value="" minlength="6"> <span class="help-block m-b-none">Leave blank to not change</span>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-3 control-label" for="passwordconfirm">Confirm Password</label>
                        <div class="col-lg-9">
                            <input id="password_confirmation" class=" form-control" placeholder="Confirm Password" name="password_confirmation" type="password" value="" minlength="6">
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="superUser">Administrator</label>
                        <div class="col-lg-1">
                            <div class="i-checks"><label> {!! Form::checkbox('superUser', 1, null, ['id' => 'superUser']) !!}   <i></i>  </label></div>
                        </div>

                    </div>

                    <hr/>

                    <div class="form-group">

                        <label class="col-lg-3 control-label" for="notifyNewTasks">Notfiy New Tasks</label>
                        <div class="col-lg-1">
                            <div class="i-checks"><label> {!! Form::checkbox('notifyNewTasks', 1, null, ['id' => 'notifyNewTasks']) !!}   <i></i>  </label></div>
                        </div>

                        <label class="col-lg-3 control-label" for="notifyChangedTasks">Notfiy Updated Tasks</label>
                        <div class="col-lg-1">
                            <div class="i-checks"><label> {!! Form::checkbox('notifyChangedTasks', 1, null, ['id' => 'notifyChangedTasks']) !!}   <i></i>  </label></div>
                        </div>

                        <label class="col-lg-3 control-label" for="notifyDueTasks">Notfiy Due Tasks</label>
                        <div class="col-lg-1">
                            <div class="i-checks"><label> {!! Form::checkbox('notifyDueTasks', 1, null, ['id' => 'notifyDueTasks']) !!}   <i></i>  </label></div>
                        </div>
                    </div>

                    <div class="form-group">

                        <label class="col-lg-3 control-label" for="notifyNewActions">Notfiy New Actions</label>
                        <div class="col-lg-1">
                            <div class="i-checks"><label> {!! Form::checkbox('notifyNewActions', 1, null, ['id' => 'notifyNewActions']) !!}   <i></i>  </label></div>
                        </div>

                        <label class="col-lg-3 control-label" for="notifyChangedActions">Notfiy Updated Actions</label>
                        <div class="col-lg-1">
                            <div class="i-checks"><label> {!! Form::checkbox('notifyChangedActions', 1, null, ['id' => 'notifyChangedActions']) !!}   <i></i>  </label></div>
                        </div>

                        <label class="col-lg-3 control-label" for="notifyDueActions">Notfiy Due Actions</label>
                        <div class="col-lg-1">
                            <div class="i-checks"><label> {!! Form::checkbox('notifyDueActions', 1, null, ['id' => 'notifyDueActions']) !!}   <i></i>  </label></div>
                        </div>
                    </div>

                    <div class="form-group">

                        <label class="col-lg-3 control-label" for="notifyNewRisks">Notfiy New Risks</label>
                        <div class="col-lg-1">
                            <div class="i-checks"><label> {!! Form::checkbox('notifyNewRisks', 1, null, ['id' => 'notifyNewRisks']) !!}   <i></i>  </label></div>
                        </div>

                        <label class="col-lg-3 control-label" for="notifyChangedRisks">Notfiy Updated Risks</label>
                        <div class="col-lg-1">
                            <div class="i-checks"><label> {!! Form::checkbox('notifyChangedRisks', 1, null, ['id' => 'notifyChangedRisks']) !!}   <i></i>  </label></div>
                        </div>

                        <label class="col-lg-3 control-label" for="notifyDueRisks">Notfiy Due Risks</label>
                        <div class="col-lg-1">
                            <div class="i-checks"><label> {!! Form::checkbox('notifyDueRisks', 1, null, ['id' => 'notifyDueRisks']) !!}   <i></i>  </label></div>
                        </div>
                    </div>

                    <hr/>

                    <div class="form-group">
                        <input name="newavatarfile" type="file" class="filestyle" data-buttonText="Select New Profile Picture" data-buttonName="btn btn-primary btn-outline" data-buttonBefore="true">

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="newavatarurl">URL of new picture</label>
                            <div class="col-lg-9">
                                {!! Form::text('newavatarurl', null, [ 'class'=>"form-control", 'placeholder'=>'Paste URL for new picture'] ) !!}
                            </div>
                        </div>
                    </div>

                    <input type="submit" value="Submit" class="btn btn-block btn-primary ">

                </div>

            </div>

        </div>

    </div>




    {!! Form::close() !!}

@endsection

@section('scripts')

    <!-- Validate -->
    <script src="{{ URL::asset('js/plugins/validate/jquery.validate.min.js') }}"></script>

    <!-- Filestype -->
    <script src="{{ URL::asset('js/plugins/filestyle/filestyle.min.js') }}"></script>


@endsection

@section('readyfunction')


    $("#EditUserForm").validate({
    rules: {
    newavatarurl: "url",
    name: "required",
    email: "required",
    password_confirmation: {
    equalTo: "#password"
    }
    }
    });

    $(":file").filestyle();

@endsection
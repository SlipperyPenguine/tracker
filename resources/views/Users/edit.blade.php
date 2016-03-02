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



    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <img alt="image" height="500px" class="img-rounded  img-responsive" src="{{ URL::asset($user->ProfilePicture) }}"  />
                </div>
            </div>
        </div>

        <div class="col-lg-8">

            <!-- widget grid -->
            <section id="widget-grid" class="">

                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-notifications" data-widget-editbutton="false" data-widget-deletebutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-user"></i> </span>
                        <h2>Edit user</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body">

                            {!! Form::model($user, ['class'=>'smart-form', 'id' => 'EditUserForm', 'method' => 'PATCH', 'files'=>true, 'action'=>['UserController@update', $user->id]]) !!}

                            <fieldset>
                                <section>
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        {!! Form::text('name', null, ['placeholder'=>"User Name"] ) !!}
                                        <b class="tooltip tooltip-bottom-right">Users name</b> </label>

                                    </section>

                                <section>

                                    <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                                        {!! Form::email('email', null, ['placeholder'=>"Email"] ) !!}
                                        <b class="tooltip tooltip-bottom-right">Users e-mail address</b> </label>

                                </section>

                                <section>

                                    <label class="input"> <i class="icon-prepend fa fa-lock"></i>
                                        <input id="password" class=" form-control" placeholder="Password" name="password" type="password" value="">
                                        <b class="tooltip tooltip-bottom-right">Password</b> </label>
                                    <span class="help-block m-b-none">Leave blank to not change</span>

                                </section>

                                <section>

                                    <label class="input"> <i class="icon-prepend fa fa-lock"></i>
                                        <input id="password_confirmation" class=" form-control" placeholder="Confirm Password" name="password_confirmation" type="password" value="">
                                        <b class="tooltip tooltip-bottom-right">Password</b> </label>

                                </section>

                                <section>
                                    <label class="checkbox">
                                        {!! Form::checkbox('superUser', 1, null, ['id' => 'superUser']) !!}
                                        <i></i>Administrator</label>
                                </section>


                            </fieldset>

                            <fieldset>
                                <h3><i class="fa fa-bullhorn"></i> Notifications</h3>
                                <br/>

                                <div class="row">
                                    <div class="col col-4">

                                        <section>
                                        <label class="checkbox">
                                            {!! Form::checkbox('notifyNewTasks', 1, null, ['id' => 'notifyNewTasks']) !!}
                                            <i></i>Notify New Tasks</label>
                                        </section>

                                        <section>
                                            <label class="checkbox">
                                                {!! Form::checkbox('notifyChangedTasks', 1, null, ['id' => 'notifyChangedTasks']) !!}
                                                <i></i>Notify Changed Tasks</label>
                                        </section>

                                        <section>
                                            <label class="checkbox">
                                                {!! Form::checkbox('notifyDueTasks', 1, null, ['id' => 'notifyDueTasks']) !!}
                                                <i></i>Notify Due Tasks</label>
                                        </section>
                                    </div>

                                    <div class="col col-4">

                                        <section>
                                            <label class="checkbox">
                                                {!! Form::checkbox('notifyNewActions', 1, null, ['id' => 'notifyNewActions']) !!}
                                                <i></i>Notify New Actions</label>
                                        </section>

                                        <section>
                                            <label class="checkbox">
                                                {!! Form::checkbox('notifyChangedActions', 1, null, ['id' => 'notifyChangedActions']) !!}
                                                <i></i>Notify Changed Actions</label>
                                        </section>

                                        <section>
                                            <label class="checkbox">
                                                {!! Form::checkbox('notifyDueActions', 1, null, ['id' => 'notifyDueActions']) !!}
                                                <i></i>Notify Due Actions</label>
                                        </section>
                                    </div>

                                    <div class="col col-4">

                                        <section>
                                            <label class="checkbox">
                                                {!! Form::checkbox('notifyNewRisks', 1, null, ['id' => 'notifyNewRisks']) !!}
                                                <i></i>Notify New Risks</label>
                                        </section>

                                        <section>
                                            <label class="checkbox">
                                                {!! Form::checkbox('notifyChangedRisks', 1, null, ['id' => 'notifyChangedRisks']) !!}
                                                <i></i>Notify Changed Risks</label>
                                        </section>

                                        <section>
                                            <label class="checkbox">
                                                {!! Form::checkbox('notifyDueRisks', 1, null, ['id' => 'notifyDueRisks']) !!}
                                                <i></i>Notify Due Risks</label>
                                        </section>
                                    </div>

                                </div>
                            </fieldset>

                            <fieldset>
                                <section>
                                    <input name="newavatarfile" type="file" class="filestyle" data-buttonText="Select New Profile Picture" data-buttonName="btn btn-primary btn-sm" data-buttonBefore="true">
                                </section>

                                <section>
                                    <label class="input"> <i class="icon-prepend fa fa-external-link"></i>
                                        {!! Form::text('newavatarurl', null, ['placeholder'=>"URL of avatar"] ) !!}
                                        <b class="tooltip tooltip-bottom-right">URL to a new profile picture</b> </label>
                                </section>
                            </fieldset>

                            <footer>
                                <button type="submit" class="btn btn-block btn-primary">
                                    Submit Form
                                </button>
                            </footer>

                        </div>

                    </div>

                </div>
            </section>



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
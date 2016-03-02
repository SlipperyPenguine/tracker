@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading')Profile for {{ $user->name }} @endsection
@section('breadcrumbs')
    <li>
        <a href="{{ URL::asset('/home') }}">Home</a>
    </li>
    <li>
        <a href="{{ URL::asset('users') }}">Users</a>
    </li>
    <li class="active">
        <strong><a href="{{ URL::asset('users/') }}/{{$user->id}}">{{$user->name}}</a></strong>
    </li>
@endsection

@section('content')

    <section id="widget-grid" class="">

        <div class="row">

            <article class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                <div class="well">
                    <img alt="image" class="img-rounded img-responsive"  height="500px" src="{{ URL::asset($user->ProfilePicture) }}"  />
                </div>
            </article>

            <article class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

                <div class="well">

                    <table width="100%">
                        <tr>
                            <td>
                                <H1 class="text-danger slideInRight fast animated"><strong>{{$user['name']}} </strong> </H1>
                                <div class="">
                                    <H4>{{$user->email}}</H4>
                                </div>
                            </td>
                            <td valign="centre" class="text-right">
                                <a href="{{action('UserController@edit', [$user->id])}}" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                @if($user->superUser) <span class="label label-info">Administrator</span> @endif
                            </td>
                            <td valign="bottom" class="text-right">
                                <i class="fa fa-clock-o"></i> Created {!! $formater::StandardDateHTML($user->created_at, true) !!} <br>
                                <i class="fa fa-clock-o"></i> Last Updated {!! $formater::StandardDateHTML($user->updated_at, true) !!}
                            </td>
                        </tr>
                    </table>


                </div>

                <div class="jarviswidget jarviswidget-color-darken" id="wid-id-notifications" data-widget-editbutton="false" data-widget-deletebutton="false">

                    <header>
                        <span class="widget-icon"> <i class="fa fa-bullhorn"></i> </span>
                        <h2>Notifications</h2>

                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body">
                            <table width="100%">
                                <tr>
                                    <td>Notify of new Tasks: &nbsp; &nbsp;  </td>
                                    <td>@if($user->notifyNewTasks)<span class="text-navy">Yes</span> @else <span class="text-danger">No</span> @endif</td>
                                    <td>Notify of updated Tasks: &nbsp; &nbsp;  </td>
                                    <td>@if($user->notifyChangedTasks)<span class="text-navy">Yes</span> @else <span class="text-danger">No</span> @endif</td>
                                    <td>Notify Due Tasks: &nbsp; &nbsp;  </td>
                                    <td>@if($user->notifyDueTasks)<span class="text-navy">Yes</span> @else <span class="text-danger">No</span> @endif</td>
                                </tr>
                                <tr>
                                    <td>Notify of new Actions: &nbsp; &nbsp;  </td>
                                    <td>@if($user->notifyNewActions)<span class="text-navy">Yes</span> @else <span class="text-danger">No</span> @endif</td>
                                    <td>Notify of updated Actions: &nbsp; &nbsp;  </td>
                                    <td>@if($user->notifyChangedActions)<span class="text-navy">Yes</span> @else <span class="text-danger">No</span> @endif</td>
                                    <td>Notify Due Actions: &nbsp; &nbsp;  </td>
                                    <td>@if($user->notifyDueActions)<span class="text-navy">Yes</span> @else <span class="text-danger">No</span> @endif</td>
                                </tr>
                                <tr>
                                    <td>Notify of new Risks: &nbsp; &nbsp;  </td>
                                    <td>@if($user->notifyNewRisks)<span class="text-navy">Yes</span> @else <span class="text-danger">No</span> @endif</td>
                                    <td>Notify of updated Risks: &nbsp; &nbsp;  </td>
                                    <td>@if($user->notifyChangedRisks)<span class="text-navy">Yes</span> @else <span class="text-danger">No</span> @endif</td>
                                    <td>Notify Due Risks: &nbsp; &nbsp;  </td>
                                    <td>@if($user->notifyDueRisks)<span class="text-navy">Yes</span> @else <span class="text-danger">No</span> @endif</td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>

            </article>
        </div>
    </section>

@endsection




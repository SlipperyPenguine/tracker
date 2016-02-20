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

    <div class="row">
        <div class="col-lg-4">
            <img alt="image" class="img-rounded img-responsive"  height="500px" src="{{ URL::asset($user->ProfilePicture) }}"  />

        </div>

        <div class="col-lg-8">

            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <table width="100%">
                        <tr>
                            <td>
                                <H3>{{$user['name']}} </H3>
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
            </div>

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5 ><i class="fa fa-bullhorn"></i> Notifications</h5>
                </div>

                <div class="ibox-content">

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


    </div>


@endsection




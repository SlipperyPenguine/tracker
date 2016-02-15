@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5 ><i class="fa fa-truck"></i> Actions</h5>
        </div>
        <div class="ibox-content ">
            <br/>
            <table class="table table-hover no-margins">
                <thead>
                <tr>

                    <th>Actionee</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Due</th>
                    <th>Description</th>
                    <th>Raised</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($actions as $action)

                    <tr>

                        <td class="text-nowrap"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($action->Actionee->avatar) }}" /> {{$action->Actionee->name}}</td>

                        <td>{{$action['title']}}</td>
                        <td>{{$action['status']}}</td>
                        <td class="text-nowrap"><i class="fa fa-clock-o"></i> {{ ($action['DueDate']->diff(\Carbon\Carbon::now())->days < 1) ? 'today' : $action['DueDate']->diffForHumans()}} <br/> &nbsp;&nbsp;&nbsp; <small>( {{$action['DueDate']->format('d M y')}} )</small></td>
                        <td>{{$action['description']}}</td>
                        <td>{{$action['raised']}}</td>

                        <td><a href="{{ URL::asset('actions/') }}/{{$action['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                            <a href="{{action('ActionController@editAction', [$action->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a></td>


                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <div class="ibox-footer">
            <a href="{{action('ActionController@createAction', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm">Add new Action</a>
        </div>
    </div>



@endsection

@section('readyfunction')


@endsection
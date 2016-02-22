@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5 ><i class="fa fa-adjust"></i> Change Requests</h5>
        </div>
        <div class="ibox-content ">
            <br/>
            <table class="table table-hover no-margins">
                <thead>
                <tr>

                    <th>Ref</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($changerequests as $changerequest)

                    <tr>

                        <td>{{$changerequest->external_id}}</td>
                        <td>{{$changerequest->title}}</td>
                        <td>{{$changerequest['status']}}</td>
                        <td>{{$changerequest['description']}}</td>

                        <td><a href="{{ URL::asset('changerequests/') }}/{{$changerequest['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                            <a href="{{action('ChangeRequestController@edit', [$changerequest->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a></td>


                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        <div class="ibox-footer">
            <a href="{{action('ChangeRequestController@create', [$subjecttype, $subjectid])}}" class="btn btn-primary btn-sm">Add new Change Request</a>
        </div>
    </div>



@endsection

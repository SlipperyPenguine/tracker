@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-content">

            {!! Form::model($changerequest, ['class'=>'form-horizontal', 'method' => 'PATCH', 'action'=>['ChangeRequestController@update', $changerequest->id]]) !!}

                @include('ChangeRequests.partials.form')

            {!! Form::close() !!}

        </div>
    </div>


@endsection

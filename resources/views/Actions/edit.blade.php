@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-content">

            {!! Form::model($action, ['class'=>'form-horizontal', 'method' => 'PATCH', 'action'=>['ActionController@update', $action->id]]) !!}

                @include('Actions.partials.form')

            {!! Form::close() !!}

        </div>
    </div>


@endsection

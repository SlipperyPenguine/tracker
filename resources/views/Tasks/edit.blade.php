@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-content">

            {!! Form::model($task, ['class'=>'form-horizontal', 'method' => 'PATCH', 'action'=>['TaskController@update', $task->id]]) !!}

                @include('Tasks.partials.form')

            {!! Form::close() !!}

        </div>
    </div>


@endsection

@section('readyfunction')

    @include('Tasks.partials.datefieldsetup')

@endsection
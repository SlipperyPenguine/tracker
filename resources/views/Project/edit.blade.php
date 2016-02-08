@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-content">

            {!! Form::model($project, ['class'=>'form-horizontal', 'method' => 'PATCH', 'action'=>['ProjectController@update', $project->id]]) !!}

                @include('Project.partials.form')

            {!! Form::close() !!}

        </div>
    </div>


@endsection

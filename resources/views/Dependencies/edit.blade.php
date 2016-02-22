@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-content">

            {!! Form::model($dependency, ['class'=>'form-horizontal', 'method' => 'PATCH', 'action'=>['DependencyController@update', $dependency->id]]) !!}

                @include('Dependencies.partials.form')

            {!! Form::close() !!}

        </div>
    </div>


@endsection

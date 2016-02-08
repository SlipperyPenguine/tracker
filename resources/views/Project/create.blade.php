@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-content">

            {!! Form::open(['class'=>'form-horizontal', 'url'=>'projects']) !!}

            @include('Project.partials.form')

            {!! Form::close() !!}

        </div>
    </div>


@endsection


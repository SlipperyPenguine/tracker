@extends('layouts.main')
@section('header')
    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/nouslider/jquery.nouislider.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('css/plugins/nouslider/nouislider.pips.css') }}">
@endsection

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-content">

            {!! Form::model($risk, ['class'=>'form-horizontal', 'method' => 'PATCH', 'action'=>['RiskAndIssueController@update', $risk->id]]) !!}

                @include('RisksAndIssues.partials.form')

            {!! Form::close() !!}

        </div>
    </div>


@endsection

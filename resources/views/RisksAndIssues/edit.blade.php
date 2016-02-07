@extends('layouts.main')

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

@section('readyfunction')

    @include('RisksAndIssues.partials.datefieldsetup')

@endsection
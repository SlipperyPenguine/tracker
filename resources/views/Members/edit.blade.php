@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-content">

            {!! Form::model($member, ['class'=>'form-horizontal', 'method' => 'PATCH', 'action'=>['MemberController@update', $member->id]]) !!}

                @include('Members.partials.form')

            {!! Form::close() !!}

        </div>
    </div>


@endsection

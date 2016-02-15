@extends('layouts.main')

@section('heading'){{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="ibox float-e-margins">
        <div class="ibox-content">

            {!! Form::model($rag, ['class'=>'form-horizontal', 'method' => 'PATCH', 'action'=>['RagController@update', $rag->id]]) !!}

                @include('Rags.partials.form')

            {!! Form::close() !!}

        </div>
    </div>


@endsection

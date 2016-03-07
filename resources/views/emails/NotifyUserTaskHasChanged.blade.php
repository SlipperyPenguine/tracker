@extends('emails.template')

@section('Subject_line') Task Updated: {{ $task->title }}   @endsection

@section('online_link') {{Config::get('app.url') . action('TaskController@show', ['id'=>$task->id], false)}} @endsection

@section('title')A Task you are flagged as the owner for has been updated.  The task details are below @endsection

@section('contents')
    @include('emails.partials.taskdetails')
@endsection

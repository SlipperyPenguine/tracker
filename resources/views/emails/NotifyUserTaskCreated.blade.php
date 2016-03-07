@extends('emails.template')

@section('Subject_line') New Task Created: {{ $task->title }}   @endsection

@section('online_link') {{Config::get('app.url') . action('TaskController@show', ['id'=>$task->id], false)}} @endsection

@section('title')An new Task has been created and you are assigned as the owner.  The task details are below @endsection

@section('contents')
    @include('emails.partials.taskdetails')
@endsection

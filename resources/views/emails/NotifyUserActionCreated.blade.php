@extends('emails.template')

@section('Subject_line') New Action Created: {{ $action->title }}   @endsection

@section('online_link') {{Config::get('app.url') . action('ActionController@show', ['id'=>$action->id], false)}} @endsection

@section('title')An new action has been created and you are assigned as the action owner.  The action details are below @endsection

@section('contents')
    @include('emails.partials.actiondetails')
@endsection

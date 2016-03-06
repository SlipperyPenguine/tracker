@extends('emails.template')

@section('Subject_line') Action Updated: {{ $action->title }}   @endsection

@section('online_link') {{Config::get('app.url') . action('ActionController@show', ['id'=>$action->id], false)}} @endsection

@section('title')An action you are flagged as the action owner for has been updated.  The action details are below @endsection

@section('contents')
    @include('emails.partials.actiondetails')
@endsection

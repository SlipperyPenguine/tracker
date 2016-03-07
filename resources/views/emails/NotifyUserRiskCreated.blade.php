@extends('emails.template')

@section('Subject_line') New Risk Created: {{ $risk->title }}   @endsection

@section('online_link') {{Config::get('app.url') . action('RiskAndIssueController@show', ['id'=>$risk->id], false)}} @endsection

@section('title')An new risk has been created and you are assigned as the owner.  The risk details are below @endsection

@section('contents')
    @include('emails.partials.riskdetails')
@endsection

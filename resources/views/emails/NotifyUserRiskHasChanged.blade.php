@extends('emails.template')

@section('Subject_line') @if($risk->is_an_issue) Issue @else Risk @endif Updated: {{ $risk->title }}   @endsection

@section('online_link') {{Config::get('app.url') . action('RiskAndIssueController@show', ['id'=>$risk->id], false)}} @endsection

@section('title')A @if($risk->is_an_issue) Issue @else Risk @endif you are flagged as the owner for has been updated.  The @if($risk->is_an_issue) Issue @else Risk @endif details are below @endsection

@section('contents')
    @include('emails.partials.riskdetails')
@endsection

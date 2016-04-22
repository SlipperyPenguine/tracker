{{\tracker\Helpers\Session::SetRedirect(action('MeetingController@show', [$subject->id]))}}

@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">

    @include('Meetings.partials.detailsrow')

    <div class="row">
        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

            @include('Actions.partials.list')

            @include('Links.partials.list')

            @include('Assumptions.partials.list')

        </article>

        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

            @include('Meetings.partials.attendees')

            @include('Comments.partials.list')

            @include('AuditTrail.partials.list')

        </article>
    </div>

</section>

@endsection

@section('scripts')

    @include('Comments.partials.ajaxscript')
@endsection

@section('readyfunction')

    @include('Actions.partials.listreadtfunction')

    @include('Comments.partials.listreadtfunction')

    @include('Meetings.partials.attendeelistreadyfunction')

    @include('Links.partials.listreadtyfunction')

    @include('Assumptions.partials.listreadtfunction')

@endsection


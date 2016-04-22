{{\tracker\Helpers\Session::SetRedirect(action('AssumptionController@show', [$subject->id]))}}

@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading') {{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">

    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            @include('Assumptions.partials.showdetails')

        </article>

    </div>

    <div class="row">
        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

            @include('Actions.partials.list')
            @include('Comments.partials.list')

        </article>

        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

            @include('AuditTrail.partials.list')

        </article>

    </div>
</section>

@endsection

@section('scripts')

    @include('Comments.partials.ajaxscript')

@endsection

@section('readyfunction')

    @include('Comments.partials.listreadtfunction')
    @include('Actions.partials.listreadtfunction')

@endsection


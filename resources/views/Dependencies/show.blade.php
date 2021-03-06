{{\tracker\Helpers\Session::SetRedirect(action('DependencyController@show', [$subject->id]))}}

@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading') {{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">

    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="well">

                <table width="100%">
                    <tr>
                        <td>
                            <H1 class="text-danger slideInRight fast animated"><strong>{{$subject['title']}} </strong> </H1>
                            <div class="">
                                <H4><i class="fa fa-road"></i> {{$subject->status}}</H4>
                                <table >
                                    <tr class="itemattributerow">
                                        <td>ID &nbsp;</td>
                                        <td><strong>{{$subject->id}}</strong></td>
                                    </tr>
                                    <tr class="itemattributerow">
                                        <td>Created By &nbsp;</td>
                                        <td><strong>{{$subject->Creator->name}}</strong></td>
                                    </tr>
                                    <tr class="itemattributerow">
                                        <td>Type &nbsp;</td>
                                        <td><strong>@if($subject->unlinked) External @else {{$subject->dependent_on_type}} @endif</strong></td>
                                    </tr>
                                    <tr class="itemattributerow">
                                        <td>Dependency &nbsp;</td>
                                        <td><strong>{{$subject->dependent_on_name}}</strong></td>
                                    </tr>
                                    <tr class="itemattributerow">
                                        <td><i class="fa fa-calendar-o"></i> Next Review: &nbsp; </td>
                                        <td class="text-nowrap"> {!! $formater::StandardDateHTML($subject->NextReviewDate, false, true, false) !!}</td>
                                    </tr>
                                    <tr class="itemattributerow">
                                        <td>Owner &nbsp;</td>
                                        <td><strong>{{$subject->Owner->name}}</strong></td>
                                    </tr>
                                </table>

                            </div>
                        </td>
                        <td valign="centre" class="text-right">
                            <a href="{{action('DependencyController@edit', [$subject->id])}}" class="btn btn-default"><i class="fa fa-pencil"></i> Edit </a>
                            @if( auth()->check() && auth()->user()->isAdmin() )
                                <a class="btn btn-default"
                                   rel="tooltip" data-placement="top" data-original-title="Delete"
                                   href="{{action('DependencyController@destroy', $subject->id)}}"
                                   data-delete=""
                                   data-title="Delete Dependency"
                                   data-message="Are you sure you want to delete this dependency?"
                                   data-button-text="Confirm Delete"><i style="color: black" class="fa fa-trash-o"></i> Delete</a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>{{$subject['description']}}</div>
                        </td>
                        <td valign="bottom" class="text-right">
                            <i class="fa fa-clock-o"></i> Created {!! $formater::StandardDateHTML($subject->created_at, true) !!} <br>
                            <i class="fa fa-clock-o"></i> Last Updated {!! $formater::StandardDateHTML($subject->updated_at, true) !!}
                        </td>
                    </tr>
                </table>

            </div>

        </article>

    </div>

    <div class="row">
        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

      @include('Comments.partials.list')


        </article>

        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

            @include('Actions.partials.list')

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


@endsection
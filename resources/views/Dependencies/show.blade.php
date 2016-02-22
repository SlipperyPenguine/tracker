@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading') {{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="row">
        <div class="col-lg-6">

            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <table width="100%">
                        <tr>
                            <td>
                                <H3>{{$subject['title']}} </H3>
                                <div class="">
                                    <H4><i class="glyphicon glyphicon-road"></i> {{$subject->status}}</H4>
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

                                    </table>

                                </div>
                            </td>
                            <td valign="centre" class="text-right">
                                <a href="{{action('DependencyController@edit', [$subject->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
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
            </div>
            @include('Comments.partials.list')

        </div>


        <div class="col-lg-6">

            @include('Actions.partials.list')
        </div>
    </div>

@endsection

@section('scripts')

    @include('Comments.partials.ajaxscript')
@endsection

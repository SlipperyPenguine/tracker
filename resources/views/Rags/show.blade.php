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
                                    <H4>{!! $formater::FormatRAG($subject->value) !!} {{$subject->ValueText}}</H4>

                                </div>
                            </td>
                            <td valign="centre" class="text-right">
                                <a href="{{action('RagController@edit', [$subject->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>{{$subject['comments']}}</div>
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

            @include('AuditTrail.partials.list')

        </div>
    </div>

@endsection

@section('scripts')

    @include('Comments.partials.ajaxscript')
@endsection


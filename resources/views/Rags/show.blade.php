{{\tracker\Helpers\Session::SetRedirect(action('RagController@show', [$subject->id]))}}

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

        </article>
    </div>

    <div class="row">

        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">


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


@endsection
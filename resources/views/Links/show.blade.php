{{\tracker\Helpers\Session::SetRedirect(action('LinkController@show', [$subject->id]))}}

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
                                <H4 class="table-title">
                                    <a class="table-title" target="_blank" href="{{ $subject->url }}">{{$subject->url}}</a>
                                </H4>

                            </div>
                        </td>
                        <td valign="centre" class="text-right">
                            <a href="{{action('LinkController@edit', [$subject->id])}}" class="btn btn-default"><i class="fa fa-pencil"></i> Edit </a>
                            <a class="btn btn-default"
                               rel="tooltip" data-placement="top" data-original-title="Delete"
                               href="{{action('LinkController@destroy', $subject->id)}}"
                               data-delete=""
                               data-title="Delete Link"
                               data-message="Are you sure you want to delete this Link?"
                               data-button-text="Confirm Delete"><i style="color: black" class="fa fa-trash-o"></i> Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>

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


</section>

@endsection

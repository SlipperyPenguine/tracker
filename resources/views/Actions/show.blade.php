{{\tracker\Helpers\Session::SetRedirect(action('ActionController@show', [$subject->id]))}}

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
                            <H1 class="text-danger slideInRight fast animated"><strong>{{$title}} </strong> </H1>
                              <div class="">
                                <H4><i class="fa fa-road"></i> {{$subject->status}}</H4>
                                <table style="margin: 0px">
                                    <tr>
                                        <td height="24px" valign="top">ID &nbsp;</td>
                                        <td height="24px" valign="top"><strong>{{$subject->id}}</strong></td>
                                    </tr>
                                    @if(strlen($subject->raised)>0)
                                        <tr>
                                            <td height="24px" valign="top">Raised at </td>
                                            <td height="24px" valign="top"><strong>{{$subject->raised}} </strong></td>
                                        </tr>
                                    @endif

                                    @if(isset($subject->meeting_id))
                                        <tr>
                                            <td height="24px" valign="top">Raised at </td>
                                            <td height="24px" valign="top" class="table-title"><strong> <a href="{{action('MeetingController@show', $subject->Meeting->id)}}">{{$subject->Meeting->title}}</a> </strong></td>
                                        </tr>

                                    @endif
                                    <tr>
                                        <td height="24px" valign="top">Created By &nbsp;</td>
                                        <td height="24px" valign="top"><strong>{{$subject->Creator->name}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td height="24px" valign="top">Action Required by &nbsp;</td>
                                        <td height="24px" valign="top"><strong>{{$subject->Actionee->name}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td height="24px" valign="top"><i class="fa fa-clock-o"></i> Due </td>
                                        <td height="24px" valign="top"><strong> {!! $formater::StandardDateHTML($subject->DueDate, false, true) !!} </strong></td>
                                    </tr>
                                </table>

                            </div>
                        </td>
                        <td valign="centre" class="text-right">
                            <a href="{{action('ActionController@edit', [$subject->id])}}" class="btn btn-default"><i class="fa fa-pencil"></i> Edit </a>
                            @if( auth()->check() && auth()->user()->isAdmin() )
                                <a class="btn btn-default"
                                   rel="tooltip" data-placement="top" data-original-title="Delete"
                                   href="{{action('ActionController@destroy', $subject->id)}}"
                                   data-delete=""
                                   data-title="Delete Action"
                                   data-message="Are you sure you want to delete this action?"
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


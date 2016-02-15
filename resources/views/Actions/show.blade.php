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
                                    <table style="margin: 0px">
                                        @if(strlen($subject->raised)>0)
                                        <tr>
                                            <td height="24px" valign="top">Raised at </td>
                                            <td height="24px" valign="top"><strong>{{$subject->raised}} </strong></td>
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
                                            <td height="24px" valign="top"><strong> {!! $formater::StandardDateHTML($subject->DueDate, false) !!} </strong></td>
                                        </tr>
                                    </table>

                                </div>
                            </td>
                            <td valign="centre" class="text-right">
                                <a href="{{action('ActionController@editAction', [$subject->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
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



            @include('AuditTrail.partials.list')
        </div>
    </div>

@endsection

@section('scripts')

    @include('Comments.partials.ajaxscript')
@endsection


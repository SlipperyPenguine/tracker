@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading') {{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <table width="100%">
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td width="100px"><img alt="image" height="60" class="img-rounded" src="{{ URL::asset($subject->User->avatar) }}" /></td>
                                        <td>
                                            <H3> {{$subject->User->name}} </H3>
                                            <H4>{{$subject->role}}</H4>
                                        </td>
                                    </tr>
                                </table>


                            </td>
                            <td valign="centre" class="text-right">
                                <a href="{{action('MemberController@editMember', [$subject->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
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
            </div>

        </div>

    </div>

@endsection



@extends('layouts.main')
@inject('formater', 'tracker\Helpers\HtmlFormating')

@section('heading') {{$title}} @endsection

@include('partials.breadcrumb')

@section('content')

        <!-- widget grid -->
<section id="widget-grid" class="">

    <div class="row">
        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

            <div class="well">
                <table width="100%">
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="100px"><img alt="image" height="60" class="img-rounded" src="{{ URL::asset($subject->User->avatar) }}" /></td>
                                    <td>
                                        <H1 class="text-danger slideInRight fast animated"><strong>{{$subject->User->name}} </strong> </H1>

                                        <H4>{{$subject->role}}</H4>
                                    </td>
                                </tr>
                            </table>


                        </td>
                        <td valign="centre" class="text-right">
                            <a href="{{action('MemberController@editMember', [$subject->id])}}" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i> Edit </a>
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



<div class="row">
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <div class="well">

            <table width="100%">
                <tr>
                    <td>
                        <H1 class="text-danger slideInRight fast animated"><strong>{{$subject['title']}} </strong> </H1>
                        <table >

                            <tr class="itemattributerow">
                                <td>ID:</td>
                                <td class="text-nowrap">{{$subject->id}}</td>
                            </tr>

                            @if($subject->all_day_event)

                                <tr class="itemattributerow">
                                    <td>When:</td>
                                    <td class="text-nowrap">{!! $subject->start_date !!}</td>
                                </tr>
                            @else

                                <tr class="itemattributerow">
                                    <td>When:</td>
                                    <td class="text-nowrap">{!! $subject->start_date->format('D d M Y g:i a') !!}</td>
                                </tr>

                                <tr class="itemattributerow">
                                    <td>Duration:</td>
                                    <td class="text-nowrap">{{$subject->duration}} days</td>
                                </tr>

                            @endif


                            @if(isset($subject->Owner))
                                <tr class="itemattributerow">
                                    <td>Owner:</td>
                                    <td class="text-nowrap">{{$subject->Owner->name}}</td>
                                </tr>
                            @endif


                        </table>
                    </td>
                    <td valign="centre" class="text-right">
                        <a href="{{action('MeetingController@edit', [$subject->id])}}" class="btn btn-default"><i class="fa fa-pencil"></i> Edit </a>
                        @if( auth()->check() && auth()->user()->isAdmin() )
                            <a class="btn btn-default"
                               rel="tooltip" data-placement="top" data-original-title="Delete"
                               href="{{action('MeetingController@destroy', $subject->id)}}"
                               data-delete=""
                               data-title="Delete Meeting"
                               data-message="Are you sure you want to delete this meeting?"
                               data-button-text="Confirm Delete"><i style="color: black" class="fa fa-trash-o"></i> Delete</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>

                        <table >
                            <tr class="itemattributerow">
                                <td>Description:</td>
                                <td >{{$subject->description}}</td>
                            </tr>

                        </table>

                    </td>
                    <td valign="bottom" class="text-right text-nowrap">
                        <i class="fa fa-clock-o"></i> Created {!! $formater::StandardDateHTML($subject->created_at, true) !!} <br>
                        <i class="fa fa-clock-o"></i> Last Updated {!! $formater::StandardDateHTML($subject->updated_at, true) !!}
                    </td>
                </tr>
            </table>

        </div>

    </article>

</div>
<div class="well">

    <table width="100%">
        <tr>
            <td>
                <H1 class="text-danger slideInRight fast animated"><strong>{{$subject['title']}} </strong> </H1>
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
                            <td height="24px" valign="top">Owner &nbsp;</td>
                            <td height="24px" valign="top"><strong>{{$subject->Owner->name}}</strong></td>
                        </tr>
                        <tr>
                            <td height="24px" valign="top"><i class="fa fa-clock-o"></i> Due </td>
                            <td height="24px" valign="top"><strong> {!! $formater::StandardDateHTML($subject->DueDate, false, true) !!} </strong></td>
                        </tr>
                    </table>

                </div>
            </td>
            <td valign="centre" class="text-right">
                <a href="{{action('AssumptionController@edit', [$subject->id])}}" class="btn btn-default"><i class="fa fa-pencil"></i> Edit </a>
                @if( auth()->check() && auth()->user()->isAdmin() )
                    <a class="btn btn-default"
                       rel="tooltip" data-placement="top" data-original-title="Delete"
                       href="{{action('AssumptionController@destroy', $subject->id)}}"
                       data-delete=""
                       data-title="Delete Assumption"
                       data-message="Are you sure you want to delete this assumption?"
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
<div class="jarviswidget jarviswidget-color-darken" id="wid-id-meetingattendees" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-user"></i> </span>
        <h2>Attendees</h2>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body">

            <table id="dt_attendees" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>

                    <th>Attendee</th>
                </tr>
                </thead>
                <tbody>

                @foreach($subject->Attendees as $attendee)

                    <tr>
                        <td class="tooltip-demo text-nowrap">
                            <span rel="tooltip" data-placement="top" data-original-title="{{$attendee->name}}"><img alt="image" height="30" class="img-circle" src="{{ URL::asset($attendee->avatar) }}" /></span> {{$attendee->name}}
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>


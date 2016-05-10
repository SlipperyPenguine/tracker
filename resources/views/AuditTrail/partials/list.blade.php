<div class="jarviswidget jarviswidget-color-darken" id="wid-id-audit" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-history"></i> </span>
        <h2>Audit Trail</h2>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body no-padding">

            <table class="table table-hover no-margins">
                <thead>
                <tr>
                    <th>When</th>
                    <th>Who</th>
                    <th>Changes</th>
                </tr>
                </thead>
                <tbody>

                @foreach($subject->AuditTrail as $change)

                    <tr>

                        <td> <i class="fa fa-clock-o"></i> {{$change->pivot->created_at->diffForHumans()}}<br/> &nbsp;&nbsp;&nbsp; <small>( {{$change->pivot->created_at->format('d M y')}} )</small> </td>
                        <td>{{$change->name}}</td>
                        <td style="padding-top: 0"> {!!   tracker\Helpers\HtmlFormating::FormatAuditTrail( $change->pivot->before, $change->pivot->after )  !!} </td>

                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>


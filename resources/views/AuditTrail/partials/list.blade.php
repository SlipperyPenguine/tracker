<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5><i class="fa fa-history"></i> Audit Trail</h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#">Config option 1</a>
                </li>
                <li><a href="#">Config option 2</a>
                </li>
            </ul>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>

    <div class="ibox-content">

        <table class="table table-hover no-margins">
            <thead>
            <tr>
                <th>When</th>
                <th>Changes</th>
            </tr>
            </thead>
            <tbody>

            @foreach($subject->AuditTrail as $change)

                <tr>

                    <td> <i class="fa fa-clock-o"></i> {{$change->pivot->created_at->diffForHumans()}}<br/> &nbsp;&nbsp;&nbsp; <small>( {{$change->pivot->created_at->format('d M y')}} )</small> </td>
                    <td> {!!   tracker\Helpers\HtmlFormating::FormatRiskHistory( $change->pivot->before, $change->pivot->after )  !!} </td>

                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
</div>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5><i class="fa fa-warning"></i> Risks & Issues ( {{$subject->Risks()->DashboardRisks()->count()}} of {{ $subject->Risks()->count()}} ) </h5>
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
                <th></th>
                <th>ID</th>
                <th>Title</th>
                <th>Imp</th>
                <th>Sev</th>
                <th>Review</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($subject->Risks()->DashboardRisks()->orderBy('CurrentRiskClassificationScore')->get() as $risk)

                <tr>
                    <td>@if($risk['is_an_issue'])<span class="label label-danger">Issue</span> @else <span class="label label-warning">Risk</span> @endif </td>
                    <td>{{$risk->id}}</td>
                    <td>{{$risk['title']}}</td>
                    <td class="text-nowrap"> {!! tracker\Helpers\HtmlFormating::FormatRiskRating($risk->probability, true, $risk->previous_probability) !!}   </td>
                    <td class="text-nowrap"> {!! tracker\Helpers\HtmlFormating::FormatRiskRating($risk->impact, true, $risk->previous_impact)  !!} </td>
                    <td class="text-nowrap"> {!! tracker\Helpers\HtmlFormating::StandardDateHTML($risk->NextReviewDate, false, true, true ) !!} </td>
                    <td class="project-actions">
                        <a href="{{ URL::asset('risks/') }}/{{$risk['id']}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                        <a href="{{action('RiskAndIssueController@editRisk', [$risk->id])}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                    </td>


                </tr>

            @endforeach

            </tbody>
        </table>

    </div>
    <div class="ibox-footer">
        <div class="pull-right">
            <a href="{{action('RiskAndIssueController@index', [$subject->subjecttype, $subject->id])}}" class="btn btn-white"><i class="fa fa-folder"></i> View All </a>
        </div>
        <a href="{{action('RiskAndIssueController@createRisk', [$subjecttype, $subject->id])}}" class="btn btn-primary btn-sm">Add new Risk or Issue</a>
    </div>
</div>
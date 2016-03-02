<div class="jarviswidget jarviswidget-color-darken" id="wid-id-risks" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-warning"></i> </span>
        <h2>Risks & Issues</h2>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body">

            <table id="dt_risks" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>
                    <th class="text-nowrap" data-class="expand">Status</th>
                    <th>ID</th>
                    <th>Title</th>
                    <th data-hide="phone,tablet">Imp</th>
                    <th data-hide="phone,tablet">Sev</th>
                    <th data-hide="phone,tablet">Review</th>
                    <th></th>

                </tr>
                </thead>
                <tbody>

                @foreach($subject->Risks as $risk)

                    <tr>
                        <td>@if($risk['is_an_issue'])<span class="label label-danger">Issue</span> @else <span class="label label-warning">Risk</span> @endif </td>
                        <td>{{$risk->id}}</td>
                        <td>{{$risk['title']}}</td>
                        <td class="text-nowrap"> {!! tracker\Helpers\HtmlFormating::FormatRiskRating($risk->probability, true, $risk->previous_probability) !!}   </td>
                        <td class="text-nowrap"> {!! tracker\Helpers\HtmlFormating::FormatRiskRating($risk->impact, true, $risk->previous_impact)  !!} </td>
                        <td class="text-nowrap">{{$risk->NextReviewDate->format('d M Y')}}</td>
                        <td class="text-nowrap">
                            <a href="{{ URL::asset('risks/') }}/{{$risk['id']}}" class="btn btn-default btn-sm"><i class="fa fa-folder"></i> View </a>
                            <a href="{{action('RiskAndIssueController@editRisk', [$risk->id])}}" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                        </td>


                    </tr>

                @endforeach

                </tbody>
            </table>

            <div class="widget-footer">
                <div class="pull-left">
                    <a href="{{action('RiskAndIssueController@createRisk', [$subject->subjecttype, $subject->id])}}" class="btn btn-primary btn-sm">Add new Risk or Issue</a>

                </div>
                <a href="{{action('RiskAndIssueController@index', [$subject->subjecttype, $subject->id])}}" class="btn btn-default"><i class="fa fa-folder"></i> View All </a>

            </div>

        </div>
    </div>
</div>

<div class="jarviswidget jarviswidget-color-darken" id="wid-id-userrisksandissues" data-widget-editbutton="false" data-widget-deletebutton="false">

    <header>
        <span class="widget-icon"> <i class="fa fa-warning"></i> </span>
        <h2>Risks and Issues</h2>

        <div class="widget-toolbar" id="switch-1">
            <span class="onoffswitch-title"><i class="fa fa-filter"></i> Open Only</span>
										<span class="onoffswitch">
											<input type="checkbox" name="showriskclosed" class="onoffswitch-checkbox" id="showriskclosed" checked>
											<label class="onoffswitch-label" for="showriskclosed">
                                                <span class="onoffswitch-inner" data-swchon-text="Yes" data-swchoff-text="No"></span>
                                                <span class="onoffswitch-switch"></span> </label>
											</span>
        </div>

        <div class="widget-toolbar">
            <!-- add: non-hidden - to disable auto hide -->
            <div class="btn-group">
                <button class="btn dropdown-toggle btn-xs btn-primary" data-toggle="dropdown">
                    Risks and Issues <i class="fa fa-caret-down"></i>
                </button>
                <ul class="dropdown-menu js-status-update pull-right">
                    <li>
                        <a href="javascript:void(0);" id="risksandissues">Risks and Issues</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" id="risksonly">Risks Only</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" id="issuesonly">Issues Only</a>
                    </li>
                </ul>
            </div>
        </div>

    </header>

    <!-- widget div-->
    <div>

        <!-- widget content -->
        <div class="widget-body no-padding">

            <table id="dt_userrisks" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                <tr>
                    <th data-class="expand">ID</th>
                    <th>Subject</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Title</th>
                    <th data-hide="phone,tablet">Status</th>
                    <th data-hide="phone,tablet">Imp</th>
                    <th data-hide="phone,tablet">Sev</th>
                    <th data-hide="phone,tablet">Review</th>
                    <th data-hide="always">Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($user->RisksAndIssues() as $risk)

                    <tr>
                        <td >{{$risk->id}}</td>
                        <td>{{$risk->subject_type}}</td>
                        <td>{{$risk->subject_name}}</td>
                        <td>@if($risk['is_an_issue'])<span class="label label-danger">Issue</span> @else <span class="label label-warning">Risk</span> @endif </td>
                        <td>{{$risk['title']}}</td>
                        <td>{{$risk['status']}}</td>
                        <td class="text-nowrap"> {!! tracker\Helpers\HtmlFormating::FormatRiskRating($risk->probability, true, $risk->previous_probability) !!}   </td>
                        <td class="text-nowrap"> {!! tracker\Helpers\HtmlFormating::FormatRiskRating($risk->impact, true, $risk->previous_impact)  !!} </td>
                        <td class="text-nowrap">{{$risk->NextReviewDate->format('d M Y')}}</td>
                         <td>{{$risk->description}}</td>
                        <td class="text-nowrap">
                            <a href="{{ URL::asset('risks/') }}/{{$risk['id']}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="View"><i class="fa fa-eye"></i></a>
                            <a  href="{{action('RiskAndIssueController@editRisk', [$risk->id])}}" class="btn btn-default btn-sm" rel="tooltip" data-placement="top" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                        </td>


                    </tr>

                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>


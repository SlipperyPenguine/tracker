<?php

namespace tracker\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use tracker\Events\RiskCreated;
use tracker\Events\RiskUpdated;
use tracker\Helpers\Breadcrumbs;
use tracker\Helpers\Session;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Http\Requests\CreateRiskRequest;
use tracker\Models\Program;
use tracker\Models\Risk;
use tracker\Models\WorkStream;

class RiskAndIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subjecttype, $subjectid, Request $request)
    {


        $title = "Risks & Issues for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);

        $breadcrumbs[] = ['Risks', URL::action('RiskAndIssueController@index', [$subjecttype, $subjectid]), true];

        $risks = Risk::where('subject_type', $subjecttype)->where('subject_id', $subjectid)->get();

        return view('RisksAndIssues.index', compact('subjectid', 'subjecttype', 'risks', 'title', 'breadcrumbs'));
    }

    public function indexall()
    {
        $risks = Risk::with('RiskOwner')->get();
        //return $risks;

        return view('RisksAndIssues.indexall', compact('risks'));
    }

    public function createWorkstreamRiskOrIssue($programid, $workstreamid)
    {
        $program = Program::findOrFail($programid);

        $workstream = WorkStream::findOrFail($workstreamid);

        $title = "Create new Risk or Issue for the $workstream->name Workstream";

        $breadcrumbs[] = ['Home',  URL::asset('/home'), false];
        $breadcrumbs[] = ['Programs',  URL::asset('programs'), false];
        $breadcrumbs[] = [$program->name,   URL::asset('/')."/programs/$programid", false];
        $breadcrumbs[] = ['Workstreams',  '', false];
        $breadcrumbs[] = [$workstream->name,  URL::asset('/')."/programs/$programid/workstreams/$workstreamid", false];
        $breadcrumbs[] = ['Risks & Issues', '', false];
        $breadcrumbs[] = ['Create',  URL::asset('/')."/programs/$programid/workstreams/$workstreamid/risksandissues/create", true];

        $redirect = "/programs/$programid/workstreams/$workstreamid";

        //return $breadcrumbs;

        return $this->create($workstreamid, 'Workstream', $title, $breadcrumbs, $redirect);
    }

    public function editWorkstreamRiskOrIssue($programid, $workstreamid, $riskid)
    {

        $program = Program::findOrFail($programid);

        $workstream = WorkStream::findOrFail($workstreamid);

        $risk = Risk::findorFail($riskid);

        //return "Owner id: $risk->owner , Owner Name: $risk->OwnerName";

        $title = "Edit $risk->title for the $workstream->name Workstream";

        $breadcrumbs[] = ['Home',  URL::asset('/home'), false];
        $breadcrumbs[] = ['Programs',  URL::asset('programs'), false];
        $breadcrumbs[] = [$program->name,   URL::asset('/')."/programs/$programid", false];
        $breadcrumbs[] = ['Workstreams',  '', false];
        $breadcrumbs[] = [$workstream->name,  URL::asset('/')."/programs/$programid/workstreams/$workstreamid", false];
        $breadcrumbs[] = ['Risks & Issues', '', false];
        $breadcrumbs[] = [$risk->title, '', false];
        $breadcrumbs[] = ['Edit',  URL::asset('/')."/programs/$programid/workstreams/$workstreamid/risksandissues/$riskid/edit", true];

        $redirect = "/programs/$programid/workstreams/$workstreamid";

        //return $risk->NextReviewDate;

        return $this->edit($risk, $title, $breadcrumbs, $redirect);
    }

    public function createRisk($subjecttype, $subjectid, Request $request)
    {


        $title = "Create new Risk or Issue for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Risks', '', false];
        $breadcrumbs[] = ['Create', '', false];

        return view('RisksAndIssues.create', compact('subjectid', 'subjecttype', 'title', 'breadcrumbs'));

    }

    public function editRisk($riskid, Request $request)
    {
        $risk = Risk::findOrFail($riskid);

        $subjectid = $risk->subject_id;
        $subjecttype = $risk->subject_type;

        $title = "Edit Risk $risk->title for $risk->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Risks', '', false];
        $breadcrumbs[] = [$risk->title, '', false];
        $breadcrumbs[] = ['Edit', '', false];

        return view('RisksAndIssues.edit', compact('risk', 'title', 'breadcrumbs', 'subjectid', 'subjecttype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($subjectid, $subjecttype, $title, $breadcrumbs, $redirect )
    {
        return view('RisksAndIssues.create', compact('subjectid', 'subjecttype', 'title', 'breadcrumbs', 'redirect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRiskRequest $request)
    {
        //return $request->all();
        $risk = new Risk();

        $risk->subject_id = $request->subject_id;
        $risk->subject_type = $request->subject_type;
        $risk->subject_name = Breadcrumbs::getSubjectName($request->subject_type, $request->subject_id);
        $risk->title = $request->title;
        $risk->is_an_issue = $request->is_an_issue;
        $risk->status = $request->status;
        $risk->probability = $request->probability;
        $risk->impact = $request->impact;
        $risk->target_probability = $request->target_probability;
        $risk->target_impact = $request->target_impact;
        $risk->description = $request->description;
        $risk->cause_description = $request->cause_description;
        $risk->impact_description = $request->impact_description;
        $risk->NextReviewDate = Carbon::parse($request->NextReviewDate)->toDateTimeString();
        $risk->owner =  $request->owner;
        $risk->response_strategy =  $request->response_strategy;
        $risk->response_notes =  $request->response_notes;

        $risk->save();

        $type = 'RISK';

        if ( $risk->is_an_issue==1)
            $type = 'ISSUE';

        flash()->success('Success', "New $type created successfully");


        return redirect(Session::GetRedirect());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //$risk = Risk::findOrFail($id);
        $subject = Risk::where('id', $id)->with('AuditTrail')->first();

        $risksubjectid = $subject->subject_id;
        $risksubjecttype = $subject->subject_type;

        $title = "Risk $subject->title for $subject->subject_type ".Breadcrumbs::getSubjectName($risksubjecttype, $risksubjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($risksubjecttype, $risksubjectid);
        $breadcrumbs[] = ['Risks', '', false];
        $breadcrumbs[] = [$subject->title, '', true];

        $subjecttype = 'Risk';

        //return $risk;
        return view('RisksAndIssues.show', compact('subject', 'title', 'breadcrumbs', 'risksubjectid','risksubjecttype', 'subjecttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($risk, $title, $breadcrumbs, $redirect)
    {
        $subjectid = $risk->subject_id;
        $subjecttype = $risk->subject_type;
        return view('RisksAndIssues.edit', compact('risk', 'title', 'breadcrumbs', 'redirect', 'subjectid', 'subjecttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRiskRequest $request, $id)
    {
        //return $request->all();
        $risk = Risk::findorFail($id);

        $risk->title = $request->title;
        $risk->is_an_issue = $request->is_an_issue;
        $risk->status = $request->status;
        $risk->probability = $request->probability;
        $risk->impact = $request->impact;
        $risk->target_probability = $request->target_probability;
        $risk->target_impact = $request->target_impact;
        $risk->description = $request->description;
        $risk->cause_description = $request->cause_description;
        $risk->impact_description = $request->impact_description;
        $risk->NextReviewDate = Carbon::parse($request->NextReviewDate)->toDateTimeString();
        $risk->owner =  $request->owner;
        $risk->response_strategy =  $request->response_strategy;
        $risk->response_notes =  $request->response_notes;


        $risk->save();

        $type = 'RISK';

        if ( $risk->is_an_issue==1)
            $type = 'ISSUE';

        flash()->success('Success', "$type updated successfully");

        return redirect(Session::GetRedirect());

        //return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

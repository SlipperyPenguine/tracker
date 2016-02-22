<?php

namespace tracker\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use tracker\Helpers\Breadcrumbs;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\ChangeRequest;

class ChangeRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subjecttype, $subjectid, Request $request)
    {


        $title = "Change Requests for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);

        $breadcrumbs[] = ['Change Requests', URL::action('ChangeRequestController@index', [$subjecttype, $subjectid]), true];

        $redirect = $request->server('HTTP_REFERER');

        $changerequests = ChangeRequest::where('subject_type', $subjecttype)->where('subject_id', $subjectid)->get();

        return view('ChangeRequests.index', compact('subjectid', 'subjecttype', 'changerequests', 'title', 'breadcrumbs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($subjecttype, $subjectid, Request $request)
    {

        $subjectname = Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $title = "Create new Change Request for $subjecttype $subjectname ";

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Change Requests', URL::action('ChangeRequestController@index', [$subjecttype, $subjectid]), true];
        $breadcrumbs[] = ['Create', '', false];

        $redirect = $request->server('HTTP_REFERER');
        //return $redirect;
        return view('ChangeRequests.create', compact('subjectid', 'subjecttype', 'subjectname', 'title', 'breadcrumbs', 'redirect'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $changerequest = new ChangeRequest();

        $changerequest->subject_id = $request->subject_id;
        $changerequest->subject_type = $request->subject_type;
        $changerequest->subject_name = Breadcrumbs::getSubjectName($request->subject_type, $request->subject_id);

        $changerequest->external_id = $request->external_id;
        $changerequest->status = $request->status;

        $changerequest->title = $request->title;
        $changerequest->description = $request->description;

        $changerequest->sponsor = $request->sponsor;
        $changerequest->contact = $request->contact;
        $changerequest->submission_date = Carbon::parse($request->submission_date)->toDateTimeString();
        $changerequest->required_by = Carbon::parse($request->required_by)->toDateTimeString();
        $changerequest->lead_time = $request->lead_time;
        $changerequest->implementation_date = Carbon::parse($request->implementation_date)->toDateTimeString();
        $changerequest->ranking = $request->ranking;
        $changerequest->business_benefit = $request->business_benefit;
        $changerequest->business_impact = $request->business_impact;
        $changerequest->impact_analysis = $request->impact_analysis;

        $changerequest->created_by = Auth::id();

        $changerequest->save();

        flash()->success('Success', "New Change Request created successfully");


        return redirect($request->redirect);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $subject = ChangeRequest::findOrFail($id);

        $subjectid = $subject->subject_id;
        $subjecttype = $subject->subject_type;

        $title = "Change Request $subject->title for $subject->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Change Requests', URL::action('ChangeRequestController@index', [$subjecttype, $subjectid]), true];
        $breadcrumbs[] = [$subject->title, '', true];

        $redirect = $request->server('HTTP_REFERER');

        $subjecttype = 'ChangeRequest';


        return view('ChangeRequests.show', compact('subject', 'title', 'breadcrumbs', 'redirect', 'subjectid', 'subjecttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $changerequest = ChangeRequest::findOrFail($id);

        $subjectid = $changerequest->subject_id;
        $subjecttype = $changerequest->subject_type;
        $subjectname = Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $title = "Edit Change Request $changerequest->title for $changerequest->subject_type $subjectname";

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Change Requests', URL::action('ChangeRequestController@index', [$subjecttype, $subjectid]), true];
        $breadcrumbs[] = [$changerequest->title, URL::action('ChangeRequestController@show', [$id]), false];
        $breadcrumbs[] = ['Edit', '', false];

        $redirect = $request->server('HTTP_REFERER');


        return view('ChangeRequests.edit', compact('changerequest', 'title', 'breadcrumbs', 'redirect', 'subjectid', 'subjecttype', 'subjectname'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();
        $changerequest = ChangeRequest::findorFail($id);

        $changerequest->external_id = $request->external_id;
        $changerequest->status = $request->status;
        $changerequest->title = $request->title;
        $changerequest->description = $request->description;
        $changerequest->sponsor = $request->sponsor;
        $changerequest->contact = $request->contact;
        $changerequest->submission_date = Carbon::parse($request->submission_date)->toDateTimeString();
        $changerequest->required_by = Carbon::parse($request->required_by)->toDateTimeString();
        $changerequest->lead_time = $request->lead_time;
        $changerequest->implementation_date = Carbon::parse($request->implementation_date)->toDateTimeString();
        $changerequest->ranking = $request->ranking;
        $changerequest->business_benefit = $request->business_benefit;
        $changerequest->business_impact = $request->business_impact;
        $changerequest->impact_analysis = $request->impact_analysis;

        $changerequest->save();

        flash()->success('Success', "Change Request updated successfully");

        return redirect($request->redirect);

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
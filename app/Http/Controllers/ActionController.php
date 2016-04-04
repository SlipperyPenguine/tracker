<?php

namespace tracker\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use tracker\Helpers\Breadcrumbs;
use tracker\Helpers\ObjectFinder;
use tracker\Helpers\Session;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\Action;
use tracker\Models\Meeting;
use tracker\Traits\MeetingTrait;

class ActionController extends Controller
{
    public function indexall()
    {
        $actions = Action::with('Actionee')->get();

        return view('Actions.indexall', compact('actions'));
    }

    public function index($subjecttype, $subjectid)
    {
        $title = "Actions for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);
        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid, true);

        $actions = null;
        if($subjecttype=='Meeting')
            $actions = Action::where('meeting_id', $subjectid)->get();
        else
            $actions = Action::where('subject_type', $subjecttype)->where('subject_id', $subjectid)->get();

        return view('Actions.index', compact('subjectid', 'subjecttype', 'actions', 'title', 'breadcrumbs'));

    }
    public function create($subjecttype, $subjectid)
    {
        $meetingid = -1;
        if($subjecttype=='Meeting')
        {
            $meeting = Meeting::findOrFail($subjectid);
            //$parent = ObjectFinder::GetObject($meeting->subject_type, $meeting->subject_id);
            $subjecttype = $meeting->subject_type;
            $subjectid = $meeting->subject_id;
            $meetingid = $meeting->id;
        }

        $subjectname = Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $title = "Create new Action for $subjecttype $subjectname ";

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Create', '', false];

        $meetings = $this->getMeetings($subjecttype, $subjectid);
       //return $meetingid;

        return view('Actions.create', compact('subjectid', 'subjecttype', 'subjectname', 'title', 'breadcrumbs', 'meetings', 'meetingid'));

    }

    public function edit($actionid, Request $request)
    {
        $action = Action::findOrFail($actionid);

        $subjectid = $action->subject_id;
        $subjecttype = $action->subject_type;
        $subjectname = Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $title = "Edit Action $action->title for $action->subject_type $subjectname";

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid);
        $breadcrumbs[] = [$action->title, URL::action('ActionController@show', [$actionid]), false];
        $breadcrumbs[] = ['Edit', '', false];

        $meetings = $this->getMeetings($subjecttype, $subjectid);

        $meetingid = -1;

        if(isset($action->meeting_id))
            $meetingid = $action->meeting_id;

        return view('Actions.edit', compact('action', 'title', 'breadcrumbs', 'subjectid', 'subjecttype', 'subjectname', 'meetings', 'meetingid'));
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

        $meetingid = null;
        if ( ( $request->has('meeting_id') ) && ($request->meeting_id > 0) )
            $meetingid = $request->meeting_id;

        $action = new Action();

        $action->subject_id = $request->subject_id;
        $action->subject_type = $request->subject_type;
        $action->subject_name = Breadcrumbs::getSubjectName($request->subject_type, $request->subject_id);
        $action->status = $request->status;
        $action->actionee = $request->actionee;
        $action->title = $request->title;
        $action->description = $request->description;
        $action->raised = $request->raised;
        $action->DueDate = Carbon::parse($request->DueDate)->toDateTimeString();
        $action->meeting_id = $meetingid;
        $action->created_by = Auth::id();

        $action->save();

        flash()->success('Success', "New Action created successfully");

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
        try
        {
            $subject = Action::findOrFail($id);
        }
        catch(ModelNotFoundException $e)
        {
            return $this->indexall();
        }

        $subjectid = $subject->subject_id;
        $subjecttype = $subject->subject_type;

        $title = "Edit Action $subject->title for $subject->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid);
        $breadcrumbs[] = [$subject->title, '', true];

        return view('Actions.show', compact('subject', 'title', 'breadcrumbs'));
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

        $meetingid = null;
        if ( ( $request->has('meeting_id') ) && ($request->meeting_id > 0) )
            $meetingid = $request->meeting_id;

        $action = Action::findorFail($id);

        $action->status = $request->status;
        $action->actionee = $request->actionee;
        $action->title = $request->title;
        $action->description = $request->description;
        $action->raised = $request->raised;
        $action->DueDate = Carbon::parse($request->DueDate)->toDateTimeString();
        $action->meeting_id = $meetingid;

        $action->save();

        flash()->success('Success', "Action updated successfully");

        return redirect(Session::GetRedirect());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = Action::findOrFail($id);

        $action->delete();

        //todo delete audit trail and comments

        flash()->success('Success', "Action deleted successfully");

        return redirect()->back();
    }

    protected function getBaseBreadcrumb($subjecttype, $subjectid, $active=false)
    {
        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Actions', URL::action('ActionController@index', [$subjecttype, $subjectid]), $active];

        return $breadcrumbs;

    }

    /**
     * @param $subjecttype
     * @param $subjectid
     *
     * @return null
     */
    protected function getMeetings($subjecttype, $subjectid)
    {
        //check if the parent has the meetings trait
        $parent = ObjectFinder::GetObject($subjecttype, $subjectid);

        $meetings = null;
        if (in_array(MeetingTrait::class, class_uses($parent)))
        {
            //$meetings = $parent->Meetings->all();
            $meetings = $parent->Meetings->lists('title', 'id');

            if (count($meetings) > 0)
                $meetings[-1] = 'Select a meeting';
            else
                $meetings = null;
        }
        return $meetings;
    }
}

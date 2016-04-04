<?php

namespace tracker\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;
use tracker\Helpers\Breadcrumbs;
use tracker\Helpers\Session;
use tracker\Http\Requests;
use tracker\Models\Meeting;
use tracker\Models\User;

/**
 * Class MeetingController
 * @package tracker\Http\Controllers
 */
class MeetingController extends Controller
{
    public function indexall()
    {
        $meetings = Meeting::latest()->get();;

        return view('Meetings.indexall', compact('meetings'));
    }

    public function index($subjecttype, $subjectid)
    {
        $title = "Meetings for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid, true);

        $meetings = Meeting::where('subject_type', $subjecttype)->where('subject_id', $subjectid)->get();

        return view('Meetings.index', compact('subjectid', 'subjecttype', 'meetings', 'title', 'breadcrumbs'));

    }
    public function create($subjecttype, $subjectid)
    {

        $subjectname = Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $title = "Create new Meeting for $subjecttype $subjectname ";

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Create', '', false];

        $userlist = User::lists('name', 'id');

        return view('Meetings.create', compact('subjectid', 'subjecttype', 'subjectname', 'title', 'breadcrumbs', 'userlist'));

    }

    public function edit($id)
    {
        $meeting = Meeting::findOrFail($id);

        $subjectid = $meeting->subject_id;
        $subjecttype = $meeting->subject_type;
        $subjectname = Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $title = "Edit Meeting $meeting->title for $meeting->subject_type $subjectname";

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid);
        $breadcrumbs[] = [$meeting->title, URL::action('MeetingController@show', [$id]), false];
        $breadcrumbs[] = ['Edit', '', false];

        //return $meeting->AttendeeList;
        $userlist = User::lists('name', 'id');

        //return $userlist;

        return view('Meetings.edit', compact('meeting', 'title', 'breadcrumbs', 'subjectid', 'subjecttype', 'subjectname', 'userlist'));
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
        $meeting = $this->Save();

        $this->syncAttendees($meeting);

        flash()->success('Success', "New Meeting created successfully");

        return redirect(Session::GetRedirect());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $subject = Meeting::findOrFail($id);
        }
        catch(ModelNotFoundException $e)
        {
            return $this->indexall();
        }

        $subjectid = $subject->subject_id;
        $subjecttype = $subject->subject_type;

        $title = "Meeting $subject->title for $subject->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid);
        $breadcrumbs[] = [$subject->title, '', true];

        //return $subject->Attendees;

        return view('Meetings.show', compact('subject', 'title', 'breadcrumbs'));
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
        $meeting = Meeting::findOrFail($id);

        $this->Save($meeting);

        $this->syncAttendees($meeting);

        flash()->success('Success', "Meeting updated successfully");

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
        $meeting = Meeting::findOrFail($id);

        $meeting->delete();

        //todo delete audit trail and comments

        flash()->success('Success', "Meeting deleted successfully");

        return redirect()->back();
    }

    protected function getBaseBreadcrumb($subjecttype, $subjectid, $active=false)
    {
        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Meetings', URL::action('MeetingController@index', [$subjecttype, $subjectid]), $active];

        return $breadcrumbs;

    }

    /**
     * @param Meeting $meeting
     * @param Request $request
     * @param bool    $new
     */
    protected function Save(Meeting $meeting = null)
    {
        $new = false;
        if (!isset($meeting))
        {
            $meeting = new Meeting();
            $new = true;
        }

        $request = request();

        $alldayevent = ($request->has('all_day_event')) ? $request->all_day_event : 0;

        if($new)
        {
            $meeting->subject_id = $request->subject_id;
            $meeting->subject_type = $request->subject_type;
            $meeting->subject_name = Breadcrumbs::getSubjectName($request->subject_type, $request->subject_id);
        }

        $meeting->title = $request->title;
        $meeting->all_day_event = $alldayevent;

        if ($alldayevent == 1) {
            $meeting->start_date = Carbon::parse($request->start_date)->toDateTimeString();
            $meeting->duration = 24;
        } else {
            $startdate = $request->start_date . ' ' . $request->start_time;
            $meeting->start_date = Carbon::parse($startdate)->toDateTimeString();
            $meeting->duration = $request->duration;
        }

        $meeting->owner = $request->owner;
        $meeting->description = $request->description;

        $meeting->save();

        return $meeting;
    }

    private function syncAttendees(Meeting $meeting)
    {
        $attendees = request()->has('attendees') ? request()->input('attendees') : [];

        $meeting->Attendees()->sync($attendees);
    }
}

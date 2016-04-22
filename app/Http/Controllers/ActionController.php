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
use tracker\Repositories\ActionRepository;
use tracker\Repositories\MeetingRepository;
use tracker\Traits\MeetingTrait;

class ActionController extends Controller
{
    /**
     * @var ActionRepository
     */
    private $actionRepository;
    /**
     * @var MeetingRepository
     */
    private $meetingRepository;


    /**
     * ActionController constructor.
     *
     * @param ActionRepository  $actionRepository
     * @param MeetingRepository $meetingRepository
     */
    public function __construct(ActionRepository $actionRepository, MeetingRepository $meetingRepository)
    {
        $this->actionRepository = $actionRepository;
        $this->meetingRepository = $meetingRepository;
    }

    public function indexall()
    {
        $actions = $this->actionRepository->getAll();
        return view('Actions.indexall', compact('actions'));
    }

    public function index($subjecttype, $subjectid)
    {
        $title = "Actions for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);
        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid, true);

        $actions = null;
        if($subjecttype=='Meeting')
            $actions = $this->actionRepository->getMeetingActions($subjectid);
        else
            $actions = $this->actionRepository->getBySubjectTypeAndID($subjecttype, $subjectid);

        return view('Actions.index', compact('subjectid', 'subjecttype', 'actions', 'title', 'breadcrumbs'));

    }
    public function create($subjecttype, $subjectid)
    {
        $meetingid = -1;
        if($subjecttype=='Meeting')
        {
            $meeting = $this->meetingRepository->getByID($subjectid);
            $subjecttype = $meeting->subject_type;
            $subjectid = $meeting->subject_id;
            $meetingid = $meeting->id;
        }

        $subjectname = Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $title = "Create new Action for $subjecttype $subjectname ";

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Create', '', false];

        $meetings = $this->meetingRepository->getBySubjectTypeAndID($subjecttype, $subjectid);

        return view('Actions.create', compact('subjectid', 'subjecttype', 'subjectname', 'title', 'breadcrumbs', 'meetings', 'meetingid'));

    }

    public function edit($actionid)
    {
        $action = $this->actionRepository->getByID($actionid);

        $subjectid = $action->subject_id;
        $subjecttype = $action->subject_type;
        $subjectname = Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $title = "Edit Action $action->title for $action->subject_type $subjectname";

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid);
        $breadcrumbs[] = [$action->title, URL::action('ActionController@show', [$actionid]), false];
        $breadcrumbs[] = ['Edit', '', false];

        $meetings = $this->meetingRepository->getBySubjectTypeAndID($subjecttype, $subjectid);
        //dd( $meetings);

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
        $meetingid = null;
        if ( ( $request->has('meeting_id') ) && ($request->meeting_id > 0) )
            $meetingid = $request->meeting_id;

        $this->actionRepository->RegisterNew([
            'subject_id'        => $request->subject_id,
            'subject_type'      => $request->subject_type,
            'subject_name'      => Breadcrumbs::getSubjectName($request->subject_type, $request->subject_id),
            'status'            => $request->status,
            'title'             => $request->title,
            'description'       => $request->description,
            'actionee'          => $request->actionee,
            'raised'            => $request->raised,
            'DueDate'           => Carbon::parse($request->DueDate)->toDateTimeString(),
            'meeting_id'        => $meetingid,
            'created_by'        => Auth::id()
        ]);

        flash()->success('Success', "New Action created successfully");

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
            $subject = $this->actionRepository->getByID($id);
        }
        catch(ModelNotFoundException $e)
        {
            return $this->indexall();
        }

        $subjectid = $subject->subject_id;
        $subjecttype = $subject->subject_type;

        $title = "Action $subject->title for $subject->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

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
        $meetingid = null;
        if ( ( $request->has('meeting_id') ) && ($request->meeting_id > 0) )
            $meetingid = $request->meeting_id;

        $action = $this->actionRepository->getByID($id);

        $this->actionRepository->saveChanges($action, [
            'status'            => $request->status,
            'title'             => $request->title,
            'description'       => $request->description,
            'actionee'          => $request->actionee,
            'raised'            => $request->raised,
            'DueDate'           => Carbon::parse($request->DueDate)->toDateTimeString(),
            'meeting_id'        => $meetingid,
        ]);

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
        $action = $this->actionRepository->getByID($id);
        $action->delete();

        flash()->success('Success', "Action deleted successfully");

        return redirect()->back();
    }

    protected function getBaseBreadcrumb($subjecttype, $subjectid, $active=false)
    {
        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Actions', URL::action('ActionController@index', [$subjecttype, $subjectid]), $active];

        return $breadcrumbs;

    }

}

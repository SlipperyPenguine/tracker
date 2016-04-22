<?php

namespace tracker\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use tracker\Helpers\Breadcrumbs;
use tracker\Helpers\Session;
use tracker\Http\Requests;
use tracker\Repositories\AssumptionRepository;
use tracker\Repositories\MeetingRepository;

class AssumptionController extends TrackerController
{
    /**
     * @var AssumptionRepository
     */
    protected $repository;
    /**
     * @var MeetingRepository
     */
    protected $meetingRepository;

    Protected $viewRoot;

    Protected $controllerName;

    /**
     * ActionController constructor.
     *
     * @param ActionRepository  $actionRepository
     * @param MeetingRepository $meetingRepository
     */
    public function __construct(AssumptionRepository $repository, MeetingRepository $meetingRepository)
    {
        $this->repository = $repository;
        $this->meetingRepository = $meetingRepository;

        $this->viewRoot = 'Assumptions';
        $this->controllerName = 'AssumptionController';
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

        $this->repository->RegisterNew([
            'subject_id'        => $request->subject_id,
            'subject_type'      => $request->subject_type,
            'subject_name'      => Breadcrumbs::getSubjectName($request->subject_type, $request->subject_id),
            'status'            => $request->status,
            'title'             => $request->title,
            'description'       => $request->description,
            'owner'             => $request->owner,
            'raised'            => $request->raised,
            'DueDate'           => Carbon::parse($request->DueDate)->toDateTimeString(),
            'meeting_id'        => $meetingid,
            'created_by'        => Auth::id()
        ]);

        flash()->success('Success', "New Assumption created successfully");

        return redirect(Session::GetRedirect());
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

        $action = $this->repository->getByID($id);

        $this->repository->saveChanges($action, [
            'status'            => $request->status,
            'title'             => $request->title,
            'description'       => $request->description,
            'owner'             => $request->owner,
            'raised'            => $request->raised,
            'DueDate'           => Carbon::parse($request->DueDate)->toDateTimeString(),
            'meeting_id'        => $meetingid,
        ]);

        flash()->success('Success', "Assumption updated successfully");

        return redirect(Session::GetRedirect());

    }

}

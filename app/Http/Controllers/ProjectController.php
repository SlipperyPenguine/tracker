<?php

namespace tracker\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use tracker\Helpers\Breadcrumbs;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\Program;
use tracker\Models\Project;
use tracker\Models\WorkStream;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    protected function getWorkstream($id){
        return WorkStream::findOrFail($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($program_id, $work_stream_id, Request $request)
    {

        $workstreamname = $this->getWorkstream($work_stream_id)->name;
        $title = "Create new Project for $workstreamname Workstream";

        $breadcrumbs = Breadcrumbs::getBreadCrumb('WorkStream', $work_stream_id);
        $breadcrumbs[] = ['Projects', '', false];
        $breadcrumbs[] = ['Create', '', false];

        $redirect = $request->server('HTTP_REFERER');
        //return $redirect;
        return view('Project.create', compact('program_id', 'work_stream_id', 'title', 'breadcrumbs', 'redirect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = new Project();

        $subject->program_id = $request->program_id;
        $subject->work_stream_id = $request->work_stream_id;
        $subject->program_id = WorkStream::where('id',$request->work_stream_id )->first()->Program->id;
        $subject->status = $request->status;
        $subject->PI = $request->PI;
        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->StartDate = Carbon::parse($request->StartDate)->toDateTimeString();
        $subject->EndDate = Carbon::parse($request->EndDate)->toDateTimeString();

        $subject->save();

        //todo Add the default RAGs

        flash()->success('Success', "New Project created successfully");

        return redirect($request->redirect);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($programid, $workstreamid, $subjectid, Request$request)
    {
        $program = Program::findOrFail($programid);

        $workstream = WorkStream::where('id', $workstreamid)
            ->with('RAGs', 'Risks', 'Projects.RAGs', 'Members.User', 'Tasks.ActionOwner')
            ->first();

        $subject = Project::where('id', $subjectid)
            ->with('RAGs', 'Risks', 'Members.User', 'Tasks.ActionOwner', 'Comments')
            ->first();

        $subjecttype = 'Project';
        $subjectid = $subject->id;

        //$redirect = $request->url();

        //return $subject;

        //return $subject->getActiveTasks();

        return view('Project.show', compact('program', 'workstream', 'subject', 'subjecttype', 'subjectid', 'redirect'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($program_id, $work_stream_id,$subjectid, Request $request)
    {
        $subject = Project::findOrFail($subjectid);

        $workstreamname = $this->getWorkstream($work_stream_id)->name;
        $title = "Create new Project for $workstreamname Workstream";

        $title = "Edit Task $subject->name for $workstreamname Workstream";

        $breadcrumbs = Breadcrumbs::getBreadCrumb('WorkStream', $work_stream_id);
        $breadcrumbs[] = ['Projects', '', false];
        $breadcrumbs[] = [$subject->name, '', false];
        $breadcrumbs[] = ['edit', '', false];

        $redirect = $request->server('HTTP_REFERER');
        //return $redirect;
        return view('Project.edit', compact('program_id', 'work_stream_id', 'title', 'breadcrumbs', 'redirect', 'subject'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //return $request->all();
        $subject = Project::findorFail($id);

        $subject->status = $request->status;
        $subject->PI = $request->PI;
        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->StartDate = Carbon::parse($request->StartDate)->toDateTimeString();
        $subject->EndDate = Carbon::parse($request->EndDate)->toDateTimeString();

        $subject->save();

        flash()->success('Success', "Project updated successfully");

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

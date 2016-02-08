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
        $project = new Project();

        $project->program_id = $request->program_id;
        $project->work_stream_id = $request->work_stream_id;
        $project->status = $request->status;
        $project->PI = $request->PI;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->StartDate = Carbon::parse($request->StartDate)->toDateTimeString();
        $project->EndDate = Carbon::parse($request->EndDate)->toDateTimeString();

        $project->save();

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
    public function show($programid, $workstreamid, $projectid)
    {
        $program = Program::findOrFail($programid);

        $workstream = WorkStream::where('id', $workstreamid)
            ->with('RAGs', 'Risks', 'Projects.RAGs', 'Members.User', 'Tasks.ActionOwner')
            ->first();

        $project = Project::where('id', $projectid)
            ->with('RAGs', 'Risks', 'Members.User', 'Tasks.ActionOwner')
            ->first();

        //return $project->getActiveTasks();

        return view('Project.show', compact('program', 'workstream', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($program_id, $work_stream_id,$projectid, Request $request)
    {
        $project = Project::findOrFail($projectid);

        $workstreamname = $this->getWorkstream($work_stream_id)->name;
        $title = "Create new Project for $workstreamname Workstream";

        $title = "Edit Task $project->name for $workstreamname Workstream";

        $breadcrumbs = Breadcrumbs::getBreadCrumb('WorkStream', $work_stream_id);
        $breadcrumbs[] = ['Projects', '', false];
        $breadcrumbs[] = [$project->name, '', false];
        $breadcrumbs[] = ['edit', '', false];

        $redirect = $request->server('HTTP_REFERER');
        //return $redirect;
        return view('Project.edit', compact('program_id', 'work_stream_id', 'title', 'breadcrumbs', 'redirect', 'project'));

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
        $project = Project::findorFail($id);

        $project->status = $request->status;
        $project->PI = $request->PI;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->StartDate = Carbon::parse($request->StartDate)->toDateTimeString();
        $project->EndDate = Carbon::parse($request->EndDate)->toDateTimeString();

        $project->save();

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

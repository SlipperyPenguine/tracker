<?php

namespace tracker\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use tracker\Helpers\Breadcrumbs;
use tracker\Helpers\Session;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\Program;
use tracker\Models\Project;
use tracker\Models\WorkStream;
use tracker\Project\MSProjectUpload;


class ProjectController extends Controller
{
    protected $MSProjectUpload;

    public function __construct(MSProjectUpload $MSProjectUpload)
    {
        $this->MSProjectUpload = $MSProjectUpload;
    }


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


        return view('Project.create', compact('program_id', 'work_stream_id', 'title', 'breadcrumbs'));
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
        $subject->Status = $request->Status;
        $subject->PI = $request->PI;
        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->StartDate = Carbon::parse($request->StartDate)->toDateTimeString();
        $subject->EndDate = Carbon::parse($request->EndDate)->toDateTimeString();

        $subject->save();

        flash()->success('Success', "New Project created successfully");

        return redirect(Session::GetRedirect());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($programid, $workstreamid, $subjectid)
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

        return view('Project.show', compact('program', 'workstream', 'subject', 'subjecttype', 'subjectid'));
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
        $title = "Edit Task $subject->name for $workstreamname Workstream";

        $breadcrumbs = Breadcrumbs::getBreadCrumb('WorkStream', $work_stream_id);
        $breadcrumbs[] = ['Projects', '', false];
        $breadcrumbs[] = [$subject->name, '', false];
        $breadcrumbs[] = ['edit', '', false];

        return view('Project.edit', compact('program_id', 'work_stream_id', 'title', 'breadcrumbs', 'subject'));

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

        $subject->Status = $request->Status;
        $subject->PI = $request->PI;
        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->StartDate = Carbon::parse($request->StartDate)->toDateTimeString();
        $subject->EndDate = Carbon::parse($request->EndDate)->toDateTimeString();

        $subject->save();

        flash()->success('Success', "Project updated successfully");

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
        //
    }

    public function MicrosoftProjectUpload($id)
    {
        return $this->MSProjectUpload->OpenLoadForm($id);
    }

    public function AjaxFileUpload(Request $request)
    {
        if (!$request->hasFile('fileToUpload') ) {
            return "No file selected to upload";

        }

        return $this->MSProjectUpload->ParseFile($request->input('projectid'), $request->file('fileToUpload'));
    }

    public function StoreMicrosoftProjectUpload( $projectid)
    {
        return $this->MSProjectUpload->ProcessTheParsedFile($projectid);
    }

}

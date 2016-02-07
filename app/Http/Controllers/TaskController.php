<?php

namespace tracker\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\Program;
use tracker\Models\Task;
use tracker\Models\WorkStream;

class TaskController extends Controller
{

    public function indexWorkstreamTask($programid, $workstreamid, Request $request)
    {

        return $this->indexTask('WorkStream', $workstreamid, $request);

    }


    public function indexTask($subjecttype, $subjectid, Request $request)
    {


        $title = "Tasks for $subjecttype ".$this->getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = $this->getBreadCrumb($subjecttype, $subjectid);

        $redirect = $request->server('HTTP_REFERER');

        $tasks = Task::where('subject_type', $subjecttype)->where('subject_id', $subjectid)->get();

        return view('Tasks.index', compact('subjectid', 'subjecttype', 'tasks', 'title', 'breadcrumbs'));

    }
    public function createTask($subjecttype, $subjectid, Request $request)
    {


        $title = "Create new Task for $subjecttype ".$this->getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = $this->getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Create', '', false];

        $redirect = $request->server('HTTP_REFERER');
        //return $redirect;
        return view('Tasks.create', compact('subjectid', 'subjecttype', 'title', 'breadcrumbs', 'redirect'));

    }

    public function editTask($taskid, Request $request)
    {
        $task = Task::findOrFail($taskid);

        $subjectid = $task->subject_id;
        $subjecttype = $task->subject_type;

        $title = "Edit Task $task->title for $task->subject_type ".$this->getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = $this->getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = [$task->title, '', false];
        $breadcrumbs[] = ['Edit', '', false];

        $redirect = $request->server('HTTP_REFERER');


        return view('Tasks.edit', compact('task', 'title', 'breadcrumbs', 'redirect', 'subjectid', 'subjecttype'));
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
        $task = new Task();

        $task->subject_id = $request->subject_id;
        $task->subject_type = $request->subject_type;
        $task->status = $request->status;
        $task->created_by = $request->created_by;
        $task->action_owner = $request->action_owner;
        $task->title = $request->title;
        $task->description = $request->description;
        if(isset($request->milestone)) {
            $task->milestone = $request->milestone;
            $task->StartDate = Carbon::parse($request->StartDate)->toDateTimeString();
            $task->EndDate = null;
        }
        else
        {
            $task->milestone = 0;
            $task->StartDate = Carbon::parse($request->StartDate)->toDateTimeString();
            $task->EndDate = Carbon::parse($request->EndDate)->toDateTimeString();
        }

        $task->created_by = Auth::id();

        $task->save();

        flash()->success('Success', "New Task created successfully");


        return redirect($request->redirect);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $task = Task::findorFail($id);

        $task->status = $request->status;
        $task->created_by = $request->created_by;
        $task->action_owner = $request->action_owner;
        $task->title = $request->title;
        $task->description = $request->description;
        if(isset($request->milestone)) {
            $task->milestone = $request->milestone;
            $task->StartDate = Carbon::parse($request->StartDate)->toDateTimeString();
            $task->EndDate = null;
        }
        else
        {
            $task->milestone = 0;
            $task->StartDate = Carbon::parse($request->StartDate)->toDateTimeString();
            $task->EndDate = Carbon::parse($request->EndDate)->toDateTimeString();
        }

        $task->save();

        flash()->success('Success', "Task updated successfully");

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

    protected function getBreadCrumb($subjecttype, $subjectid)
    {
        $breadcrumbs[] = ['Home',  URL::asset('/home'), false];

        switch($subjecttype)
        {
            case "WorkStream":
                $workstream = WorkStream::findOrFail($subjectid);
                $program = Program::findOrFail($workstream->program_id);
                $programid = $program->id;
                $workstreamid = $workstream->id;

                $breadcrumbs[] = ['Programs',  URL::asset('programs'), false];
                $breadcrumbs[] = [$program->name,   URL::asset('/')."/programs/$programid", false];
                $breadcrumbs[] = ['Workstreams',  '', false];
                $breadcrumbs[] = [$workstream->name,  URL::asset('/')."/programs/$programid/workstreams/$workstreamid", false];
                $breadcrumbs[] = ['Tasks', '', false];
                return $breadcrumbs;
                break;
        }
    }

    protected function getSubjectName($subjecttype, $subjectid)
    {
        switch($subjecttype)
        {
            case "WorkStream":
                $workstream = WorkStream::findOrFail($subjectid);
                return $workstream->name;
                break;
        }
    }
}

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
    public function createWorkstreamTask($programid, $workstreamid)
    {
        $program = Program::findOrFail($programid);

        $workstream = WorkStream::findOrFail($workstreamid);

        $title = "Create new Task for the $workstream->name Workstream";

        $breadcrumbs[] = ['Home',  URL::asset('/home'), false];
        $breadcrumbs[] = ['Programs',  URL::asset('programs'), false];
        $breadcrumbs[] = [$program->name,   URL::asset('/')."/programs/$programid", false];
        $breadcrumbs[] = ['Workstreams',  '', false];
        $breadcrumbs[] = [$workstream->name,  URL::asset('/')."/programs/$programid/workstreams/$workstreamid", false];
        $breadcrumbs[] = ['Tasks', '', false];
        $breadcrumbs[] = ['Create',  URL::asset('/')."/programs/$programid/workstreams/$workstreamid/tasks/create", true];

        $redirect = "/programs/$programid/workstreams/$workstreamid";

        //return $breadcrumbs;

        return $this->create($workstreamid, 'Workstream', $title, $breadcrumbs, $redirect);
    }

    public function editWorkstreamTask($programid, $workstreamid, $taskid)
    {

        $program = Program::findOrFail($programid);

        $workstream = WorkStream::findOrFail($workstreamid);

        $task = Task::findorFail($taskid);

        //return "Owner id: $risk->owner , Owner Name: $risk->OwnerName";

        $title = "Edit $task->title for the $workstream->name Workstream";

        $breadcrumbs[] = ['Home',  URL::asset('/home'), false];
        $breadcrumbs[] = ['Programs',  URL::asset('programs'), false];
        $breadcrumbs[] = [$program->name,   URL::asset('/')."/programs/$programid", false];
        $breadcrumbs[] = ['Workstreams',  '', false];
        $breadcrumbs[] = [$workstream->name,  URL::asset('/')."/programs/$programid/workstreams/$workstreamid", false];
        $breadcrumbs[] = ['Tasks', '', false];
        $breadcrumbs[] = [$task->title, '', false];
        $breadcrumbs[] = ['Edit',  URL::asset('/')."/programs/$programid/workstreams/$workstreamid/tasks/$taskid/edit", true];

        $redirect = "/programs/$programid/workstreams/$workstreamid";

        //return $risk->NextReviewDate;

        return $this->edit($task, $title, $breadcrumbs, $redirect);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($subjectid, $subjecttype, $title, $breadcrumbs, $redirect )
    {
        return view('Tasks.create', compact('subjectid', 'subjecttype', 'title', 'breadcrumbs', 'redirect'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($task, $title, $breadcrumbs, $redirect)
    {
        $subjectid = $task->subject_id;
        $subjecttype = $task->subject_type;
        return view('Tasks.edit', compact('task', 'title', 'breadcrumbs', 'redirect', 'subjectid', 'subjecttype'));
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
}

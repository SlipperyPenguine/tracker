<?php

namespace tracker\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use tracker\Helpers\Breadcrumbs;
use tracker\Helpers\Session;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\Program;
use tracker\Models\Project;
use tracker\Models\Task;
use tracker\Models\WorkStream;

class TaskController extends Controller
{
    public function indexall()
    {
        $tasks = Task::with('ActionOwner')->get();
        //return $actions;

        return view('Tasks.indexall', compact('tasks'));
    }

    public function indexWorkstreamTask($programid, $workstreamid, Request $request)
    {

        return $this->indexTask('WorkStream', $workstreamid, $request);

    }

    public function indexProjectTask($programid, $workstreamid, $projectid, Request $request)
    {

        return $this->indexTask('Project', $projectid, $request);

    }

    public function indexTask($subjecttype, $subjectid, Request $request)
    {


        $title = "Tasks for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Tasks', action('TaskController@indexTask', [$subjecttype, $subjectid]), true];

        $tasks = Task::where('subject_type', $subjecttype)->where('subject_id', $subjectid)->get();

        if($subjecttype=='Project') {
            $project = Project::findOrFail($subjectid);
            return view('Tasks.indexProject', compact('subjectid', 'subjecttype', 'tasks', 'title', 'breadcrumbs', 'project'));
        }
        else
            return view('Tasks.index', compact('subjectid', 'subjecttype', 'tasks', 'title', 'breadcrumbs'));

    }
    public function createTask($subjecttype, $subjectid, Request $request)
    {


        $title = "Create new Task for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Tasks', action('TaskController@indexTask', [$subjecttype, $subjectid]), false];
        $breadcrumbs[] = ['Create', '', false];

        return view('Tasks.create', compact('subjectid', 'subjecttype', 'title', 'breadcrumbs'));

    }

    public function editTask($taskid, Request $request)
    {
        $task = Task::findOrFail($taskid);

        $subjectid = $task->subject_id;
        $subjecttype = $task->subject_type;

        $title = "Edit Task $task->title for $task->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Tasks', action('TaskController@indexTask', [$subjecttype, $subjectid]), false];
        $breadcrumbs[] = [$task->title, '', false];
        $breadcrumbs[] = ['Edit', '', false];

        return view('Tasks.edit', compact('task', 'title', 'breadcrumbs', 'subjectid', 'subjecttype'));
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
        $task->subject_name = Breadcrumbs::getSubjectName($request->subject_type, $request->subject_id);
        $task->status = $request->status;
        $task->created_by = auth()->user()->id;
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


        return redirect(Session::GetRedirect());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($taskid, Request $request)
    {
        $subject = Task::findOrFail($taskid);

        $subjectid = $subject->subject_id;
        $subjecttype = $subject->subject_type;

        $title = "Task $subject->title for $subject->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Tasks', action('TaskController@indexTask', [$subjecttype, $subjectid]), false];
        $breadcrumbs[] = [$subject->title, '', true];

        return view('Tasks.show', compact('subject', 'title', 'breadcrumbs', 'subjectid', 'subjecttype'));
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



}

<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 08/02/2016
 * Time: 07:43
 */

namespace tracker\Helpers;


use Illuminate\Support\Facades\URL;
use tracker\Models\Action;
use tracker\Models\ChangeRequest;
use tracker\Models\Dependency;
use tracker\Models\Program;
use tracker\Models\Project;
use tracker\Models\rag;
use tracker\Models\Risk;
use tracker\Models\Task;
use tracker\Models\WorkStream;

class Breadcrumbs
{
    public static function getBreadCrumb($subjecttype, $subjectid)
    {
        $breadcrumbs[] = ['Home',  URL::asset('/home'), false];


        switch($subjecttype)
        {
            case "Program":
                $program = Program::findOrFail($subjectid);
                $programid = $program->id;

                $breadcrumbs[] = ['Programs',  URL::asset('programs'), false];
                $breadcrumbs[] = [$program->name,   URL::asset('/')."/programs/$programid", false];
                return $breadcrumbs;
                break;

            case "WorkStream":
                $workstream = WorkStream::findOrFail($subjectid);
                $program = Program::findOrFail($workstream->program_id);
                $programid = $program->id;
                $workstreamid = $workstream->id;

                $breadcrumbs[] = ['Programs',  URL::asset('programs'), false];
                $breadcrumbs[] = [$program->name,   URL::asset('/')."/programs/$programid", false];
                $breadcrumbs[] = ['Workstreams',  '', false];
                $breadcrumbs[] = [$workstream->name,  URL::asset('/')."/programs/$programid/workstreams/$workstreamid", false];
                return $breadcrumbs;
                break;

            case "Project":

                $project = Project::findOrFail($subjectid);
                $workstream = WorkStream::findOrFail($project->work_stream_id);
                $program = Program::findOrFail($workstream->program_id);
                $programid = $program->id;
                $workstreamid = $workstream->id;

                $breadcrumbs[] = ['Programs',  URL::asset('programs'), false];
                $breadcrumbs[] = [$program->name,   URL::asset('/')."/programs/$programid", false];
                $breadcrumbs[] = ['Workstreams',  '', false];
                $breadcrumbs[] = [$workstream->name,  URL::asset('/')."/programs/$programid/workstreams/$workstreamid", false];
                $breadcrumbs[] = ['Projects',  '', false];
                $breadcrumbs[] = [$project->name,  URL::asset('/')."/programs/$programid/workstreams/$workstreamid/projects/$project->id", false];
                return $breadcrumbs;
                break;

            case "Risk":

                $risk = Risk::findOrFail($subjectid);

                $breadcrumbs = Breadcrumbs::getBreadCrumb($risk->subject_type, $risk->subject_id);
                $breadcrumbs[] = ['Risks',  '', false];
                $breadcrumbs[] = [$risk->title,  URL::asset('risks/') ."/$risk->id" , false];
                return $breadcrumbs;
                break;

            case "Action":

                $action = Action::findOrFail($subjectid);

                $breadcrumbs = Breadcrumbs::getBreadCrumb($action->subject_type, $action->subject_id);
                $breadcrumbs[] = ['Actions',  URL::action('ActionController@index', [$action->subject_type, $action->subject_id]), false];
                $breadcrumbs[] = [$action->title,  '', false];
                return $breadcrumbs;
                break;

            case "Rag":

                $rag = rag::findOrFail($subjectid);

                $breadcrumbs = Breadcrumbs::getBreadCrumb($rag->subject_type, $rag->subject_id);
                $breadcrumbs[] = ['RAGs',  URL::action('RagController@index', [$rag->subject_type, $rag->subject_id]), false];
                $breadcrumbs[] = [$rag->title,  '', false];
                return $breadcrumbs;
                break;

            case "Task":

                $task = Task::findOrFail($subjectid);

                $breadcrumbs = Breadcrumbs::getBreadCrumb($task->subject_type, $task->subject_id);
                $breadcrumbs[] = ['Tasks',  URL::action('TaskController@indexTask', [$task->subject_type, $task->subject_id]), false];
                $breadcrumbs[] = [$task->title,  URL::asset('tasks/') ."/$task->id" , false];
                return $breadcrumbs;
                break;

            case "Dependency":

                $dependency = Dependency::findOrFail($subjectid);

                $breadcrumbs = Breadcrumbs::getBreadCrumb($dependency->subject_type, $dependency->subject_id);
                $breadcrumbs[] = ['Dependencies',  URL::action('DependencyController@index', [$dependency->subject_type, $dependency->subject_id]), false];
                $breadcrumbs[] = [$dependency->title,  URL::asset('dependencies/') ."/$dependency->id" , false];
                return $breadcrumbs;
                break;

            case "ChangeRequest":

                $changerequest = ChangeRequest::findOrFail($subjectid);

                $breadcrumbs = Breadcrumbs::getBreadCrumb($changerequest->subject_type, $changerequest->subject_id);
                $breadcrumbs[] = ['Change Requests',  URL::action('ChangeRequestController@index', [$changerequest->subject_type, $changerequest->subject_id]), false];
                $breadcrumbs[] = [$changerequest->title,  URL::asset('changerequests/') ."/$changerequest->id" , false];
                return $breadcrumbs;
                break;
        }
    }

    public static function getSubjectName($subjecttype, $subjectid)
    {
        switch($subjecttype)
        {
            case "Program":
                $program = Program::findOrFail($subjectid);
                return $program->name;
                break;
            case "WorkStream":
                $workstream = WorkStream::findOrFail($subjectid);
                return $workstream->name;
                break;
            case "Project":
                $project = Project::findOrFail($subjectid);
                return $project->name;
                break;
            case "Risk":
                $risk = Risk::findOrFail($subjectid);
                return $risk->title;
                break;
            case "Rag":
                $rag = rag::findOrFail($subjectid);
                return $rag->title;
                break;
            case "Task":
                $task = Task::findOrFail($subjectid);
                return $task->title;
                break;
            case "Dependency":
                $dependency = Dependency::findOrFail($subjectid);
                return $dependency->title;
                break;
            case "ChangeRequest":
                $changerequest = ChangeRequest::findOrFail($subjectid);
                return $changerequest->title;
                break;
        }
    }
}
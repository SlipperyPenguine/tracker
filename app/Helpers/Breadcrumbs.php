<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 08/02/2016
 * Time: 07:43
 */

namespace tracker\Helpers;


use Illuminate\Support\Facades\URL;
use tracker\Models\Program;
use tracker\Models\Project;
use tracker\Models\WorkStream;

class Breadcrumbs
{
    public static function getBreadCrumb($subjecttype, $subjectid)
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
        }
    }

    public static function getSubjectName($subjecttype, $subjectid)
    {
        switch($subjecttype)
        {
            case "WorkStream":
                $workstream = WorkStream::findOrFail($subjectid);
                return $workstream->name;
                break;
            case "Project":
                $project = Project::findOrFail($subjectid);
                return $project->name;
                break;
        }
    }
}
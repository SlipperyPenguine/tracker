<?php

namespace tracker\Http\Controllers;

use Illuminate\Http\Request;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\Program;
use tracker\Models\Project;
use tracker\Models\WorkStream;

class WorkstreamController extends Controller
{
    public function show($programid, $workstreamid)
    {
        //$workstream = WorkStream::findOrFail($workstreamid);
        $program = Program::findOrFail($programid);

        $subject = WorkStream::where('id', $workstreamid)
                                    ->with('RAGs', 'Risks', 'Projects.RAGs', 'Members.User', 'Tasks.ActionOwner')
                                   ->first();

        //lazy load the rags
        //$rags = $workstream->RAGs;

        //lazy load risks
        //$risks = $workstream->Risks;

        //lazy load projects
        //$projects = $workstream->Projects;


        //return $workstream;

        $subjecttype = 'WorkStream';
        $subjectid = $subject->id;

        return view('workstream.show', compact('program', 'subject', 'subjecttype', 'subjectid'));

    }
}

<?php

namespace tracker\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\Program;
use tracker\Models\Project;
use tracker\Models\WorkStream;

class WorkstreamController extends Controller
{
    public function show($programid, $workstreamid)
    {
        try
        {
            $program = Program::findOrFail($programid);
        }
        catch(ModelNotFoundException $e)
        {
            App::abort(404, 'Program not found');
        }


        $subject = WorkStream::where('id', $workstreamid)
            ->with('RAGs', 'Risks', 'Projects.RAGs', 'Members.User', 'Tasks.ActionOwner')
            ->first();

        if(!$subject)
            App::abort(404, 'WorkStream not found');


        $subjecttype = 'WorkStream';
        $subjectid = $subject->id;

        return view('workstream.show', compact('program', 'subject', 'subjecttype', 'subjectid'));

    }
}

<?php

namespace tracker\Http\Controllers;

use Illuminate\Http\Request;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\Program;
use tracker\Models\WorkStream;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programlist = Program::all();
        return view('Program.index', compact('programlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $program = Program::where('id', $id)
            ->with('RAGs', 'Risks', 'Members.User', 'Tasks.ActionOwner')
            ->first();

        //get worksteams for this program
        //todo : Move this to a seperate model to ensure single responsibility.  Should add number of active projects to the workstream list.  Maybe a nice small char
        $workstreams = WorkStream::where('program_id', $id)
                        ->orderBy('phase')
                        ->orderBy('status')
                        ->orderBy('name')
                        ->with('RAGs', 'Risks', 'Members.User')
                        ->get();



        //return $program->Tasks;


        return view('Program.show', compact('program', 'workstreams'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "Coming soon";
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
        //
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

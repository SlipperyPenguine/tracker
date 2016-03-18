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
use tracker\Models\rag;

class RagController extends Controller
{
    public function index($subjecttype, $subjectid, Request $request)
    {


        $title = "RAGs for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);

        $breadcrumbs[] = ['RAGs', URL::action('RagController@index', [$subjecttype, $subjectid]), true];

        $rags = rag::where('subject_type', $subjecttype)->where('subject_id', $subjectid)->get();

        return view('Rags.index', compact('subjectid', 'subjecttype', 'rags', 'title', 'breadcrumbs'));

    }
    public function create($subjecttype, $subjectid, Request $request)
    {


        $title = "Create new RAG for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['RAGs', '', false];
        $breadcrumbs[] = ['Create', '', false];

        return view('Rags.create', compact('subjectid', 'subjecttype', 'title', 'breadcrumbs'));

    }

    public function edit($ragid, Request $request)
    {
        $rag = rag::findOrFail($ragid);

        $subjectid = $rag->subject_id;
        $subjecttype = $rag->subject_type;

        $title = "Edit RAG $rag->title for $rag->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['RAGs', URL::action('RagController@index', [$subjecttype, $subjectid]), false];
        $breadcrumbs[] = [$rag->title, URL::action('RagController@show', [$ragid]), false];
        $breadcrumbs[] = ['Edit', '', false];

        return view('Rags.edit', compact('rag', 'title', 'breadcrumbs', 'subjectid', 'subjecttype'));
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
        $rag = new rag();

        $rag->subject_id = $request->subject_id;
        $rag->subject_type = $request->subject_type;
        $rag->title = $request->title;
        $rag->value = $request->value;
        $rag->comments = $request->comments;

        $rag->save();

        flash()->success('Success', "New RAG created successfully");


        return redirect(Session::GetRedirect());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $subject = rag::findOrFail($id);

        $subjectid = $subject->subject_id;
        $subjecttype = $subject->subject_type;

        $title = "Edit RAG $subject->title for $subject->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['RAGs', URL::action('RagController@index', [$subjecttype, $subjectid]), false];
        $breadcrumbs[] = [$subject->title, '', true];

        $subjecttype = 'Rag';


        return view('Rags.show', compact('subject', 'title', 'breadcrumbs', 'subjectid', 'subjecttype'));
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
        $rag = rag::findorFail($id);

        $rag->title = $request->title;
        $rag->value = $request->value;
        $rag->comments = $request->comments;

        $rag->save();

        flash()->success('Success', "RAG updated successfully");

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

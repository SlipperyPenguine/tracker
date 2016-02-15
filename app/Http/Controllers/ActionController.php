<?php

namespace tracker\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use tracker\Helpers\Breadcrumbs;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\Action;

class ActionController extends Controller
{
    public function indexAction($subjecttype, $subjectid, Request $request)
    {


        $title = "Actions for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);

        $breadcrumbs[] = ['Actions', URL::action('ActionController@indexAction', [$subjecttype, $subjectid]), true];

        //return $breadcrumbs;

        //return $subjecttype.'  '.$subjectid;

        $redirect = $request->server('HTTP_REFERER');

        $actions = Action::where('subject_type', $subjecttype)->where('subject_id', $subjectid)->get();

        return view('Actions.index', compact('subjectid', 'subjecttype', 'actions', 'title', 'breadcrumbs'));

    }
    public function createAction($subjecttype, $subjectid, Request $request)
    {


        $title = "Create new Action for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Actions', '', false];
        $breadcrumbs[] = ['Create', '', false];

        $redirect = $request->server('HTTP_REFERER');
        //return $redirect;
        return view('Actions.create', compact('subjectid', 'subjecttype', 'title', 'breadcrumbs', 'redirect'));

    }

    public function editAction($actionid, Request $request)
    {
        $action = Action::findOrFail($actionid);

        $subjectid = $action->subject_id;
        $subjecttype = $action->subject_type;

        $title = "Edit Action $action->title for $action->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Actions', URL::action('ActionController@indexAction', [$subjecttype, $subjectid]), false];
        $breadcrumbs[] = [$action->title, URL::action('ActionController@show', [$actionid]), false];
        $breadcrumbs[] = ['Edit', '', false];

        $redirect = $request->server('HTTP_REFERER');


        return view('Actions.edit', compact('action', 'title', 'breadcrumbs', 'redirect', 'subjectid', 'subjecttype'));
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
        $action = new Action();

        $action->subject_id = $request->subject_id;
        $action->subject_type = $request->subject_type;
        $action->status = $request->status;
        $action->actionee = $request->actionee;
        $action->title = $request->title;
        $action->description = $request->description;
        $action->raised = $request->raised;
        $action->DueDate = Carbon::parse($request->DueDate)->toDateTimeString();

        $action->created_by = Auth::id();

        $action->save();

        flash()->success('Success', "New Action created successfully");


        return redirect($request->redirect);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $subject = Action::findOrFail($id);

        $subjectid = $subject->subject_id;
        $subjecttype = $subject->subject_type;

        $title = "Edit Action $subject->title for $subject->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Actions', URL::action('ActionController@indexAction', [$subjecttype, $subjectid]), false];
        $breadcrumbs[] = [$subject->title, '', true];

        $redirect = $request->server('HTTP_REFERER');

        $subjecttype = 'Action';


        return view('Actions.show', compact('subject', 'title', 'breadcrumbs', 'redirect', 'subjectid', 'subjecttype'));
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
        $action = Action::findorFail($id);

        $action->status = $request->status;
        $action->actionee = $request->actionee;
        $action->title = $request->title;
        $action->description = $request->description;
        $action->raised = $request->raised;
        $action->DueDate = Carbon::parse($request->DueDate)->toDateTimeString();

        $action->save();

        flash()->success('Success', "Action updated successfully");

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

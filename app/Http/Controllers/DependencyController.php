<?php

namespace tracker\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use tracker\Helpers\Breadcrumbs;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\Dependency;

class DependencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subjecttype, $subjectid, Request $request)
    {


        $title = "Dependencies for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);

        $breadcrumbs[] = ['Dependencies', URL::action('DependencyController@index', [$subjecttype, $subjectid]), true];

        //return $breadcrumbs;

        //return $subjecttype.'  '.$subjectid;

        $redirect = $request->server('HTTP_REFERER');

        $dependencies = Dependency::where('subject_type', $subjecttype)->where('subject_id', $subjectid)->get();

        return view('Dependencies.index', compact('subjectid', 'subjecttype', 'dependencies', 'title', 'breadcrumbs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($subjecttype, $subjectid, Request $request)
    {

        $subjectname = Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $title = "Create new Dependency for $subjecttype $subjectname ";

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Dependencies', URL::action('DependencyController@index', [$subjecttype, $subjectid]), true];
        $breadcrumbs[] = ['Create', '', false];

        $redirect = $request->server('HTTP_REFERER');
        //return $redirect;
        return view('Dependencies.create', compact('subjectid', 'subjecttype', 'subjectname', 'title', 'breadcrumbs', 'redirect'));

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
        $dependency = new Dependency();

        $dependency->subject_id = $request->subject_id;
        $dependency->subject_type = $request->subject_type;
        $dependency->subject_name = Breadcrumbs::getSubjectName($request->subject_type, $request->subject_id);
        $dependency->status = $request->status;
        $dependency->title = $request->title;
        $dependency->description = $request->description;
        $dependency->NextReviewDate = Carbon::parse($request->DueDate)->toDateTimeString();

        $dependency->created_by = Auth::id();

        $dependency->unlinked = true;

        if(isset($request->dependent_on_id))
            $dependency->unlinked = false;

        if ($dependency->unlinked)
        {
            //no link, just a name
            $dependency->dependent_on_name = $request->freetextdependency;
        }
        else {
            $dependency->dependent_on_id = $request->dependent_on_id;
            $dependency->dependent_on_type = $request->dependent_on_type;
            $dependency->dependent_on_name = Breadcrumbs::getSubjectName($dependency->dependent_on_type, $dependency->dependent_on_id);
        }

        $dependency->save();

        flash()->success('Success', "New Dependency created successfully");


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
        $subject = Dependency::findOrFail($id);

        $subjectid = $subject->subject_id;
        $subjecttype = $subject->subject_type;

        $title = "Dependency $subject->title for $subject->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Dependencies', URL::action('DependencyController@index', [$subjecttype, $subjectid]), true];
        $breadcrumbs[] = [$subject->title, '', true];

        $redirect = $request->server('HTTP_REFERER');

        $subjecttype = 'Dependency';


        return view('Dependencies.show', compact('subject', 'title', 'breadcrumbs', 'redirect', 'subjectid', 'subjecttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $dependency = Dependency::findOrFail($id);

        $subjectid = $dependency->subject_id;
        $subjecttype = $dependency->subject_type;
        $subjectname = Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $title = "Edit Dependency $dependency->title for $dependency->subject_type $subjectname";

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Dependencies', URL::action('DependencyController@index', [$subjecttype, $subjectid]), true];
        $breadcrumbs[] = [$dependency->title, URL::action('DependencyController@show', [$id]), false];
        $breadcrumbs[] = ['Edit', '', false];

        $redirect = $request->server('HTTP_REFERER');


        return view('Dependencies.edit', compact('dependency', 'title', 'breadcrumbs', 'redirect', 'subjectid', 'subjecttype', 'subjectname'));
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
        $dependency = Dependency::findorFail($id);

        $dependency->status = $request->status;
        $dependency->title = $request->title;
        $dependency->description = $request->description;
        $dependency->NextReviewDate = Carbon::parse($request->DueDate)->toDateTimeString();

        $dependency->save();

        flash()->success('Success', "Dependency updated successfully");

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

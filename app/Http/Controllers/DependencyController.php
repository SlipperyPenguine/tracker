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
use tracker\Models\Dependency;

class DependencyController extends Controller
{

    public function indexall()
    {
        $dependencies = Dependency::with('Owner')->get();

        return view('Dependencies.indexall', compact('dependencies'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subjecttype, $subjectid)
    {
        $title = "Dependencies for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = $this->GetBaseBreadcrumb($subjecttype, $subjectid);

        $dependencies = Dependency::where('subject_type', $subjecttype)->where('subject_id', $subjectid)->get();

        return view('Dependencies.index', compact('subjectid', 'subjecttype', 'dependencies', 'title', 'breadcrumbs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($subjecttype, $subjectid)
    {

        $subjectname = Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $title = "Create new Dependency for $subjecttype $subjectname ";

        $breadcrumbs = $this->GetBaseBreadcrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Create', '', false];

        return view('Dependencies.create', compact('subjectid', 'subjecttype', 'subjectname', 'title', 'breadcrumbs'));

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
        if(isset($request->dependent_on_id))
        {
            //linked dependency
            Dependency::Register([
                'subject_id'        => $request->subject_id,
                'subject_type'      => $request->subject_type,
                'subject_name'      => Breadcrumbs::getSubjectName($request->subject_type, $request->subject_id),
                'status'            => $request->status,
                'title'             => $request->title,
                'description'       => $request->description,
                'NextReviewDate'    => Carbon::parse($request->NextReviewDate)->toDateTimeString(),
                'owner'             => $request->owner,
                'created_by'        => Auth::id(),
                'unlinked'          => false,
                'dependent_on_id'   => $request->dependent_on_id,
                'dependent_on_type' => $request->dependent_on_type,
                'dependent_on_name' => Breadcrumbs::getSubjectName($request->dependent_on_type, $request->dependent_on_id)
            ]);
        }
        else
        {
            //unlinked dependency
            Dependency::Register([
                'subject_id'        => $request->subject_id,
                'subject_type'      => $request->subject_type,
                'subject_name'      => Breadcrumbs::getSubjectName($request->subject_type, $request->subject_id),
                'status'            => $request->status,
                'title'             => $request->title,
                'description'       => $request->description,
                'NextReviewDate'    => Carbon::parse($request->NextReviewDate)->toDateTimeString(),
                'owner'             => $request->owner,
                'created_by'        => Auth::id(),
                'unlinked'          => true,
                'dependent_on_id'   => 0,
                'dependent_on_type' => 'External',
                'dependent_on_name' => $request->freetextdependency
            ]);
        }

        flash()->success('Success', "New Dependency created successfully");

        return redirect(Session::GetRedirect());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Dependency::findOrFail($id);

        $subjectid = $subject->subject_id;
        $subjecttype = $subject->subject_type;

        $title = "Dependency $subject->title for $subject->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = $this->GetBaseBreadcrumb($subjecttype, $subjectid);
        $breadcrumbs[] = [$subject->title, '', true];

        $subjecttype = 'Dependency';
        return view('Dependencies.show', compact('subject', 'title', 'breadcrumbs', 'subjectid', 'subjecttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dependency = Dependency::findOrFail($id);

        $subjectid = $dependency->subject_id;
        $subjecttype = $dependency->subject_type;
        $subjectname = Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $title = "Edit Dependency $dependency->title for $dependency->subject_type $subjectname";

        $breadcrumbs = $this->GetBaseBreadcrumb($subjecttype, $subjectid);
        $breadcrumbs[] = [$dependency->title, URL::action('DependencyController@show', [$id]), false];
        $breadcrumbs[] = ['Edit', '', false];

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

        if(isset($request->dependent_on_id))
        {
            //linked dependency
            $dependency->UpdateDependency([
                'status'            => $request->status,
                'title'             => $request->title,
                'description'       => $request->description,
                'NextReviewDate'    => Carbon::parse($request->NextReviewDate)->toDateTimeString(),
                'owner'             => $request->owner,
                'unlinked'          => false,
                'dependent_on_id'   => $request->dependent_on_id,
                'dependent_on_type' => $request->dependent_on_type,
                'dependent_on_name' => Breadcrumbs::getSubjectName($request->dependent_on_type, $request->dependent_on_id)
            ]);
        }
        else
        {
            //unlinked dependency
            $dependency->UpdateDependency([
                'status'            => $request->status,
                'title'             => $request->title,
                'description'       => $request->description,
                'NextReviewDate'    => Carbon::parse($request->NextReviewDate)->toDateTimeString(),
                'owner'             => $request->owner,
                'unlinked'          => true,
                'dependent_on_id'   => 0,
                'dependent_on_type' => 'External',
                'dependent_on_name' => $request->freetextdependency
            ]);
        }

        flash()->success('Success', "Dependency updated successfully");

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
        $dependency = Dependency::findOrFail($id);

        $dependency->delete();

        flash()->success('Success', "Dependency deleted successfully");

        return redirect()->back();
    }

    /**
     * @param $subjecttype
     * @param $subjectid
     *
     * @return array
     */
    protected function GetBaseBreadcrumb($subjecttype, $subjectid)
    {
        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Dependencies', URL::action('DependencyController@index', [$subjecttype, $subjectid]), true];
        return $breadcrumbs;
    }
}

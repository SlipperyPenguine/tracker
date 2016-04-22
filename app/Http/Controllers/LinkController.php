<?php

namespace tracker\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;
use tracker\Helpers\Session;
use tracker\Helpers\Breadcrumbs;
use tracker\Http\Requests;
use tracker\Models\Link;

class LinkController extends Controller
{
    public function index($subjecttype, $subjectid)
    {


        $title = "Links for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid, true);

        $links = Link::where('subject_type', $subjecttype)->where('subject_id', $subjectid)->get();

        return view('Links.index', compact('subjectid', 'subjecttype', 'links', 'title', 'breadcrumbs'));

    }
    public function create($subjecttype, $subjectid, Request $request)
    {


        $title = "Create new Link for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid, false);
        $breadcrumbs[] = ['Create', '', true];

        return view('Links.create', compact('subjectid', 'subjecttype', 'title', 'breadcrumbs'));

    }

    public function edit($linkid)
    {
        $link = Link::findOrFail($linkid);

        $subjectid = $link->subject_id;
        $subjecttype = $link->subject_type;

        $title = "Edit Link $link->title for $link->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid, false);
        $breadcrumbs[] = [$link->title, URL::action('LinkController@show', [$linkid]), false];
        $breadcrumbs[] = ['Edit', '', false];

        return view('Links.edit', compact('link', 'title', 'breadcrumbs', 'subjectid', 'subjecttype'));
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
        $link = new Link();

        $link->subject_id = $request->subject_id;
        $link->subject_type = $request->subject_type;
        $link->title = $request->title;
        $link->url = $request->url;

        $link->save();

        flash()->success('Success', "New Link created successfully");


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
        $subject = Link::findOrFail($id);

        $subjectid = $subject->subject_id;
        $subjecttype = $subject->subject_type;

        $title = "Edit Link $subject->title for $subject->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid, false);
        $breadcrumbs[] = [$subject->title, '', true];

        $subjecttype = 'Link';

        return view('Links.show', compact('subject', 'title', 'breadcrumbs', 'subjectid', 'subjecttype'));
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
        $link = Link::findorFail($id);

        $link->title = $request->title;
        $link->url = $request->url;

        $link->save();

        flash()->success('Success', "Link updated successfully");

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
        $url = Link::findOrFail($id);
        $url->delete();

        flash()->success('Success', "Link deleted successfully");

        return redirect()->back();
    }


    protected function getBaseBreadcrumb($subjecttype, $subjectid, $active=false)
    {
        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Links', URL::action('LinkController@index', [$subjecttype, $subjectid]), $active];

        return $breadcrumbs;

    }

}

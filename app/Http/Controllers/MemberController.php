<?php

namespace tracker\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use tracker\Helpers\Breadcrumbs;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\Member;

class MemberController extends Controller
{
    public function indexMember($subjecttype, $subjectid, Request $request)
    {


        $title = "Members for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);

        $breadcrumbs[] = ['Members', URL::action('MemberController@indexMember', [$subjecttype, $subjectid]), true];

        $redirect = $request->server('HTTP_REFERER');

        $members = Member::where('subject_type', $subjecttype)->where('subject_id', $subjectid)->get();

        return view('Members.index', compact('subjectid', 'subjecttype', 'members', 'title', 'breadcrumbs'));

    }
    public function createMember($subjecttype, $subjectid, Request $request)
    {


        $title = "Create new Member for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Members', URL::action('MemberController@indexMember', [$subjecttype, $subjectid]), false];
        $breadcrumbs[] = ['Create', '', false];

        $redirect = $request->server('HTTP_REFERER');
        //return $redirect;
        return view('Members.create', compact('subjectid', 'subjecttype', 'title', 'breadcrumbs', 'redirect'));

    }

    public function editMember($memberid, Request $request)
    {
        $member = Member::findOrFail($memberid);

        $subjectid = $member->subject_id;
        $subjecttype = $member->subject_type;

        $title = "Edit Member $member->title for $member->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Members', URL::action('MemberController@indexMember', [$subjecttype, $subjectid]), false];
        $breadcrumbs[] = [$member->User->name, URL::action('MemberController@show', [$memberid]), false];
        $breadcrumbs[] = ['Edit', '', false];

        $redirect = $request->server('HTTP_REFERER');


        return view('Members.edit', compact('member', 'title', 'breadcrumbs', 'redirect', 'subjectid', 'subjecttype'));
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
        $member = new Member();

        $member->subject_id = $request->subject_id;
        $member->subject_type = $request->subject_type;
        $member->user_id = $request->user_id;
        $member->role = $request->role;

        $member->save();

        flash()->success('Success', "New Member created successfully");


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
        $subject = Member::findOrFail($id);

        $subjectid = $subject->subject_id;
        $subjecttype = $subject->subject_type;
        $username = $subject->User->name;

        $title = "$username as $subject->role for $subject->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Members', URL::action('MemberController@indexMember', [$subjecttype, $subjectid]), false];
        $breadcrumbs[] = [$username, '', true];

        $redirect = $request->server('HTTP_REFERER');

        $subjecttype = 'Member';


        return view('Members.show', compact('subject', 'title', 'breadcrumbs', 'redirect', 'subjectid', 'subjecttype'));
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
        $member = Member::findorFail($id);

        $member->role = $request->role;

        $member->save();

        flash()->success('Success', "Member updated successfully");

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

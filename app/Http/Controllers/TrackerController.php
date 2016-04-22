<?php

namespace tracker\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;
use tracker\Helpers\Breadcrumbs;
use tracker\Http\Requests;

class TrackerController extends Controller
{
    public function indexall()
    {
        $items = $this->repository->getAll();
        return view("$this->viewRoot.indexall", compact('items'));
    }

    public function index($subjecttype, $subjectid)
    {
        $title = "$this->viewRoot for $subjecttype ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);
        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid, true);

        $items = null;
        if($subjecttype=='Meeting')
            $items = $this->repository->getMeetingItems($subjectid);
        else
            $items = $this->repository->getBySubjectTypeAndID($subjecttype, $subjectid);

        return view("$this->viewRoot.index", compact('subjectid', 'subjecttype', 'items', 'title', 'breadcrumbs'));

    }

    public function create($subjecttype, $subjectid)
    {
        $meetingid = -1;
        if($subjecttype=='Meeting')
        {
            $meeting = $this->meetingRepository->getByID($subjectid);
            $subjecttype = $meeting->subject_type;
            $subjectid = $meeting->subject_id;
            $meetingid = $meeting->id;
        }

        $subjectname = Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $title = "Create new ".$this->getItemName()." for $subjecttype $subjectname ";

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ['Create', '', false];

        $meetings = $this->meetingRepository->getBySubjectTypeAndID($subjecttype, $subjectid);

        return view("$this->viewRoot.create", compact('subjectid', 'subjecttype', 'subjectname', 'title', 'breadcrumbs', 'meetings', 'meetingid'));

    }

    protected function getBaseBreadcrumb($subjecttype, $subjectid, $active=false)
    {
        $breadcrumbs = Breadcrumbs::getBreadCrumb($subjecttype, $subjectid);
        $breadcrumbs[] = ["$this->viewRoot", URL::action("$this->controllerName@index", [$subjecttype, $subjectid]), $active];

        return $breadcrumbs;

    }

    public function edit($itemId)
    {
        $item = $this->repository->getByID($itemId);

        $subjectid = $item->subject_id;
        $subjecttype = $item->subject_type;
        $subjectname = Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $title = "Edit ".$this->getItemName()." $item->title for $item->subject_type $subjectname";

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid);
        $breadcrumbs[] = [$item->title, URL::action("$this->controllerName@show", [$itemId]), false];
        $breadcrumbs[] = ['Edit', '', false];

        $meetings = $this->meetingRepository->getBySubjectTypeAndID($subjecttype, $subjectid);

        $meetingid = -1;
        if(isset($item->meeting_id))
            $meetingid = $item->meeting_id;

        return view("$this->viewRoot.edit", compact('item', 'title', 'breadcrumbs', 'subjectid', 'subjecttype', 'subjectname', 'meetings', 'meetingid'));
    }

    public function show($id)
    {
        try
        {
            $subject = $this->repository->getByID($id);
        }
        catch(ModelNotFoundException $e)
        {
            return $this->indexall();
        }

        $subjectid = $subject->subject_id;
        $subjecttype = $subject->subject_type;

        $title = "Edit ".$this->getItemName()." $subject->title for $subject->subject_type ".Breadcrumbs::getSubjectName($subjecttype, $subjectid);

        $breadcrumbs = $this->getBaseBreadcrumb($subjecttype, $subjectid);
        $breadcrumbs[] = [$subject->title, '', true];

        return view("$this->viewRoot.show", compact('subject', 'title', 'breadcrumbs'));
    }

    public function destroy($id)
    {
        $item = $this->repository->getByID($id);
        $item->delete();

        flash()->success('Success', $this->getItemName()." deleted successfully");

        return redirect()->back();
    }

    private function getItemName()
    {
        return rtrim($this->viewRoot, "s");
    }

}

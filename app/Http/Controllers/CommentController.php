<?php

namespace tracker\Http\Controllers;

use Illuminate\Http\Request;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;
use tracker\Models\Action;
use tracker\Models\ChangeRequest;
use tracker\Models\Comment;
use tracker\Models\Dependency;
use tracker\Models\Program;
use tracker\Models\Project;
use tracker\Models\rag;
use tracker\Models\Risk;
use tracker\Models\Task;
use tracker\Models\WorkStream;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $subject = $this->getSubject($request->subject_type, $request->subject_id);

        $subject->RecordNewComment($request->comment);

        flash()->success('Success', "New Comment created successfully");

        return redirect($request->server('HTTP_REFERER'));
    }

    public function AjaxStore(Request $request)
    {

        $subject = $this->getSubject($request->subject_type, $request->subject_id);

        $subject->RecordNewComment($request->comment);

        //get all the comments
        $comments = $subject->Comments;

        return view('Comments.partials.ajaxresponse', compact('comments'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //return "delete the record with id:".$id;

        $comment = Comment::findOrFail($id);

        $comment->delete();

        flash()->success('Success', "Comment deleted successfully");

        return redirect()->back();


    }

    /**
     * @param $subjecttype
     * @param $subjectid
     *
     * @return null
     */
    protected function getSubject($subjecttype, $subjectid)
    {
        $subject = null;
        switch($subjecttype)
        {
            case 'Program':
                $subject = Program::findorFail($subjectid);
                break;
            case 'WorkStream':
                $subject = WorkStream::findorFail($subjectid);
                break;
            case 'Project':
                $subject = Project::findorFail($subjectid);
                break;
            case 'Risk':
                $subject = Risk::findorFail($subjectid);
                break;
            case 'Task':
                $subject = Task::findorFail($subjectid);
                break;
            case 'Action':
                $subject = Action::findorFail($subjectid);
                break;
            case 'Rag':
                $subject = rag::findorFail($subjectid);
                break;
            case 'Dependency':
                $subject = Dependency::findorFail($subjectid);
                break;
            case 'ChangeRequest':
                $subject = ChangeRequest::findorFail($subjectid);
                break;
        }
        return $subject;
    }
}

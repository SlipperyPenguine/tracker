<?php

namespace tracker\Http\Controllers;

use Illuminate\Http\Request;
use tracker\Helpers\ObjectFinder;
use tracker\Http\Requests;
use tracker\Models\Comment;


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
        $subject = ObjectFinder::GetObject($request->subject_type, $request->subject_id);

        $subject->RecordNewComment($request->comment);

        flash()->success('Success', "New Comment created successfully");

        return redirect($request->server('HTTP_REFERER'));
    }

    public function AjaxStore(Request $request)
    {

        $subject = ObjectFinder::GetObject($request->subject_type, $request->subject_id);

        $subject->RecordNewComment($request->comment);

        //get all the comments
        $comments = $subject->Comments;

        return view('Comments.partials.ajaxresponse', compact('comments'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        flash()->success('Success', "Comment deleted successfully");

        return redirect()->back();
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 01/02/2016
 * Time: 16:49
 */

namespace tracker\Traits;


use Illuminate\Support\Facades\Auth;
use tracker\Models\User;

trait CommentTrait
{

    public function Comments()
    {
        return $this->belongsToMany( User::class, 'comments', 'subject_id', 'user_id' )
            ->withTimestamps()
            ->withPivot(['comment', 'id'])
            ->where('subject_type', $this->subjecttype);
    }

    public function RecordNewComment( $comment, $userid = null)
    {

        $userid = $userid ?: Auth::id();

        $additionalfields['subject_type'] = $this->subjecttype;
        $additionalfields['subject_id'] = $this->id;
        $additionalfields['comment'] = $comment;

        $this->Comments()->attach($userid, $additionalfields);
    }




}
<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 01/02/2016
 * Time: 16:49
 */

namespace tracker\Traits;


trait ActionTrait
{
    public function Actions() {
        return $this->hasMany('tracker\Models\Action', 'subject_id', 'id')->where('subject_type', $this->subjecttype);
    }

    public function getActiveActionsCountAttribute()
    {
        return $this->Actions()->where('status', 'Open')->count();
    }

    public function getActiveActions()
    {
        return $this->Actions()->Active()->get();
    }
}
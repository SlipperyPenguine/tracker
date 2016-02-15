<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 01/02/2016
 * Time: 16:49
 */

namespace tracker\Traits;


trait TaskTrait
{
    public function Tasks() {
        return $this->hasMany('tracker\Models\Task', 'subject_id', 'id')->where('subject_type', $this->subjecttype);
    }

    public function getActiveTaskCountAttribute()
    {
        return $this->Tasks()->where('status', 'Open')->count();
    }

    public function getActiveTasks()
    {
        return $this->Tasks()->Active()->get();
    }
}
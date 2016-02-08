<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;

class WorkStream extends Model
{

    protected $dates = ['StartDate', 'EndDate'];
    protected $appends = array('ActiveProjectCount', 'ActiveRiskCount', 'ActiveIssueCount');

    public function Program() {

        return $this->belongsTo('tracker\Models\Program',  'program_id', 'id');

    }

    public function Members() {

        return $this->hasMany('tracker\Models\Member', 'subject_id', 'id')->where('subject_type', 'WorkStream');

    }

    public function RAGs() {
        return $this->hasMany('tracker\Models\rag', 'subject_id', 'id')->where('subject_type', 'WorkStream');
    }

    public function Risks() {
        return $this->hasMany('tracker\Models\Risk', 'subject_id', 'id')->where('subject_type', 'WorkStream');
    }

    public function Tasks() {
        return $this->hasMany('tracker\Models\Task', 'subject_id', 'id')->where('subject_type', 'WorkStream');
    }

    public function Projects() {
        return $this->hasMany('tracker\Models\Project', 'work_stream_id', 'id');
    }

    public function getProjectCountAttribute()
    {
        return $this->Members()->count();
    }

    public function getActiveProjectCountAttribute()
    {
        return $this->Projects()->whereBetween('Status', [1,4])->count();
    }

    public function getActiveRiskCountAttribute()
    {
        return $this->Risks()->where('is_an_issue', 0)->where('status', 'Open')->count();
    }

    public function getActiveIssueCountAttribute()
    {
        return $this->Risks()->where('is_an_issue', 1)->where('status', 'Open')->count();
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

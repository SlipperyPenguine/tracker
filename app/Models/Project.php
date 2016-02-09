<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $dates = ['StartDate', 'EndDate'];

    protected $appends = array('StatusText');

    public static function boot()
    {
        parent::boot();

        static::created(function($project){
            $project->AddStandardRAGs();

        });
    }

    protected function AddStandardRAGs()
    {
        rag::create(array('subject_id' => $this->id, 'subject_type' => 'Project' ,'title' => 'Resource', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => $this->id, 'subject_type' => 'Project' ,'title' => 'Schedule', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => $this->id, 'subject_type' => 'Project' ,'title' => 'Costs', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => $this->id, 'subject_type' => 'Project' ,'title' => 'Quality', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => $this->id, 'subject_type' => 'Project' ,'title' => 'Benefits', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => $this->id, 'subject_type' => 'Project' ,'title' => 'Infrastructure', 'value' => 'G', 'comments' => '' ));
        rag::create(array('subject_id' => $this->id, 'subject_type' => 'Project' ,'title' => 'Risks & Issues', 'value' => 'G', 'comments' => '' ));
    }

    public function Program() {

        return $this->belongsTo('tracker\Models\Program',  'program_id', 'id');

    }

    public function WorkStream() {

        return $this->belongsTo('tracker\Models\WorkStream',  'work_stream_id', 'id');

    }

    public function Members() {
        return $this->hasMany('tracker\Models\Member', 'subject_id', 'id')->where('subject_type', 'Project');
    }

    public function RAGs() {
        return $this->hasMany('tracker\Models\rag', 'subject_id', 'id')->where('subject_type', 'Project');
    }

    public function Risks() {
        return $this->hasMany('tracker\Models\Risk', 'subject_id', 'id')->where('subject_type', 'Project');
    }

    public function Tasks() {
        return $this->hasMany('tracker\Models\Task', 'subject_id', 'id')->where('subject_type', 'Project');
    }


    public function getStatusTextAttribute()
    {
        switch($this->Status)
        {
            case 0:
                return 'Pre Gate 1';
            case 1:
                return 'Post Gate 1, concept paper approved';
            case 2:
                return 'Post Review 1, concept paper and SDD approved';
            case 3:
                return 'Post Gate 2, in build';
            case 4:
                return 'Post Gate 3, Rolling out';
            case 5:
                return 'Closed';
            Case 6:
                return 'Cancelled';
            default:
                Return 'Unknown';
        }
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

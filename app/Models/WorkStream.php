<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;
use tracker\Events\WorkStreamCreated;
use tracker\Events\WorkStreamUpdated;
use tracker\Traits\ActionTrait;
use tracker\Traits\AssumptionTrait;
use tracker\Traits\DependencyTrait;
use tracker\Traits\LinkTrait;
use tracker\Traits\MeetingTrait;
use tracker\Traits\MemberTrait;
use tracker\Traits\RagTrait;
use tracker\Traits\RiskTrait;
use tracker\Traits\TaskTrait;

class WorkStream extends Model
{
    public $subjecttype = 'WorkStream';
    use TaskTrait, RagTrait, RiskTrait, MemberTrait, ActionTrait, DependencyTrait, MeetingTrait, LinkTrait, AssumptionTrait;

    protected $dates = ['StartDate', 'EndDate'];
    protected $appends = array('ActiveProjectCount', 'ActiveRiskCount', 'ActiveIssueCount');

    public function Program() {

        return $this->belongsTo('tracker\Models\Program',  'program_id', 'id');

    }

    public function Members() {

        return $this->hasMany('tracker\Models\Member', 'subject_id', 'id')->where('subject_type', 'WorkStream');

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

    public function getStatusTextAttribute()
    {
        return 'Active';
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function($workstream){
            event(new WorkStreamUpdated($workstream));
        });

        static::created(function($workstream){
            event(new WorkStreamCreated($workstream));
        });
    }

}

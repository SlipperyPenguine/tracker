<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;
use tracker\Events\ProjectCreated;
use tracker\Events\ProjectUpdated;
use tracker\Traits\ActionTrait;
use tracker\Traits\CommentTrait;
use tracker\Traits\MemberTrait;
use tracker\Traits\RagTrait;
use tracker\Traits\RiskTrait;
use tracker\Traits\TaskTrait;

class Project extends Model
{
    public $subjecttype = 'Project';
    use TaskTrait, RagTrait, RiskTrait, MemberTrait, CommentTrait, ActionTrait;


    protected $dates = ['StartDate', 'EndDate'];

    protected $appends = array('StatusText');


    public static function boot()
    {
        parent::boot();

        static::updating(function($project){
            event(new ProjectUpdated($project));
        });

        static::created(function($project){
            $project->AddStandardRAGs();
            event(new ProjectCreated($project));
        });
    }


    public function Program() {

        return $this->belongsTo('tracker\Models\Program',  'program_id', 'id');

    }

    public function WorkStream() {

        return $this->belongsTo('tracker\Models\WorkStream',  'work_stream_id', 'id');

    }

    public function getStatusTextAttribute()
    {
        switch($this->Status)
        {
            case 0:
                return 'Pre Gate 0';
            case 1:
                return 'Pre Gate 1';
            case 3:
                return 'Post Gate 1, concept paper approved';
            case 4:
                return 'Post Review 1, concept paper and SDD approved';
            case 5:
                return 'Post Gate 2, in build';
            case 6:
                return 'Post Gate 3, Rolling out';
            case 7:
                return 'Closed';
            Case 8:
                return 'Cancelled';
            default:
                Return 'Unknown';
        }
    }






}

<?php

namespace tracker\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use tracker\Events\TaskCreated;
use tracker\Events\TaskUpdated;
use tracker\Traits\ActionTrait;
use tracker\Traits\AuditTrailTrait;
use tracker\Traits\CommentTrait;

class Task extends Model
{
    public $subjecttype = 'Task';
    use AuditTrailTrait, ActionTrait, CommentTrait;

    protected $dates = ['StartDate', 'EndDate'];

    public function ActionOwner() {

        return $this->hasOne('tracker\Models\User', 'id', 'action_owner');

    }

    public function Creator() {

        return $this->hasOne('tracker\Models\User', 'id', 'created_by');

    }

    public function scopeActive($query)
    {
       // return $query->where('status', 'open')->orWhere('updated_at', '>' , Carbon::now()->addDays(-14));
        return $query->where('status', 'open');
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function($task)
        {
            $task->RecordAuditTrail(false);
     });

        static::updated(function($task)
        {
            event(new TaskUpdated($task));
        });

        static::created(function($task){

            $task->RecordAuditTrail(true);

            event(new TaskCreated($task));

        });
    }
}

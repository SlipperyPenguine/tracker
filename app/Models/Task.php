<?php

namespace tracker\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use tracker\Traits\AuditTrailTrait;

class Task extends Model
{
    protected $subjecttype = 'Task';
    use AuditTrailTrait;

    protected $dates = ['StartDate', 'EndDate'];

    public function ActionOwner() {

        return $this->hasOne('tracker\Models\User', 'id', 'action_owner');

    }

    public function scopeActive($query)
    {
       // return $query->where('status', 'open')->orWhere('updated_at', '>' , Carbon::now()->addDays(-14));
        return $query->where('status', 'open');
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function($task){
            $task->RecordAuditTrail(false);
     });

        static::created(function($task){
            $task->RecordAuditTrail(true);
        });
    }
}

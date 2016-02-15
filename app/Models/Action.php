<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;
use tracker\Traits\AuditTrailTrait;
use tracker\Traits\CommentTrait;

class Action extends Model
{
    protected $subjecttype = 'Action';
    use AuditTrailTrait, CommentTrait;

    protected $dates = ['DueDate'];

    public function Actionee() {

        return $this->hasOne('tracker\Models\User', 'id', 'actionee');

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

        static::updating(function($task){
            $task->RecordAuditTrail(false);
        });

        static::created(function($task){
            $task->RecordAuditTrail(true);
        });
    }
}

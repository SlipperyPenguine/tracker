<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;
use tracker\Events\DecisionCreated;
use tracker\Events\DecisionUpdated;
use tracker\Traits\AuditTrailTrait;
use tracker\Traits\CommentTrait;

class Decision extends Model
{
    public $subjecttype = 'Decision';
    use AuditTrailTrait, CommentTrait;

    protected $dates = ['CreatedDate'];

    public function Creator() {

        return $this->hasOne('tracker\Models\User', 'id', 'created_by');

    }

    public function Owner() {

        return $this->hasOne('tracker\Models\User', 'id', 'owner');

    }

    public function Meeting() {

        return $this->hasOne( Meeting::class , 'id', 'meeting_id');

    }

    public function scopeForMeeting($query, $meeting_id)
    {
        return $query->where('meeting_id', $meeting_id);
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function($decision){
            $decision->RecordAuditTrail(false);
        });

        static::updated(function($decision){
            event(new DecisionUpdated($decision));
        });

        static::created(function($decision){
            $decision->RecordAuditTrail(true);

            event(new DecisionCreated($decision));
        });

        static::deleting(function($decision){
            $decision->DeleteAuditTrail();
            $decision->DeleteComments();
        });
    }

}

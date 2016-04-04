<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;
use tracker\Events\MeetingCreated;
use tracker\Events\MeetingUpdated;
use tracker\Traits\ActionTrait;
use tracker\Traits\AuditTrailTrait;
use tracker\Traits\CommentTrait;

class Meeting extends Model
{
    protected $dates = ['start_date'];

    public $subjecttype = 'Meeting';
    use ActionTrait,AuditTrailTrait, CommentTrait;

    public function Owner() {
        return $this->hasOne(User::class, 'id', 'owner');
    }

    public function Attendees(){
        return $this->belongsToMany(User::class);
    }

    public function getAttendeeListAttribute()
    {
        return $this->Attendees()->lists('id')->toArray();
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function($meeting){
            $meeting->RecordAuditTrail(false);
        });

        static::updated(function($meeting){
            event(new MeetingUpdated($meeting));
        });

        static::created(function($meeting){
            $meeting->RecordAuditTrail(true);

            event(new MeetingCreated($meeting));
        });
    }

}

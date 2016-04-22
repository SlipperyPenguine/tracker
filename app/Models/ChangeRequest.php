<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;
use tracker\Traits\ActionTrait;
use tracker\Traits\AuditTrailTrait;
use tracker\Traits\CommentTrait;
use tracker\Traits\LinkTrait;
use tracker\Traits\RiskTrait;
use tracker\Traits\TaskTrait;

class ChangeRequest extends Model
{
    public $subjecttype = 'ChangeRequest';
    use AuditTrailTrait, CommentTrait, TaskTrait, ActionTrait, RiskTrait, LinkTrait;

    protected $dates = ['submission_date', 'required_by', 'implementation_date'];

    public function Contact() {

        return $this->hasOne('tracker\Models\User', 'id', 'contact');

    }

    public function Creator() {

        return $this->hasOne('tracker\Models\User', 'id', 'created_by');

    }

    public static function boot()
    {
        parent::boot();

        static::updating(function($changerequest)
        {
            //event(new TaskUpdated($task));

            $changerequest->RecordAuditTrail(false);
        });

        static::created(function($changerequest){

            //event(new TaskCreated($task));

            $changerequest->RecordAuditTrail(true);
        });
    }

}

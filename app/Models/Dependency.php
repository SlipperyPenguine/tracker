<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;
use tracker\Traits\ActionTrait;
use tracker\Traits\AuditTrailTrait;
use tracker\Traits\CommentTrait;

class Dependency extends Model
{
    public $subjecttype = 'Dependency';
    use CommentTrait, ActionTrait, AuditTrailTrait;


    protected $dates = ['NextReviewDate'];

    public function Creator() {

        return $this->hasOne('tracker\Models\User', 'id', 'created_by');

    }

    public function Owner() {
        return $this->hasOne('tracker\Models\User', 'id', 'owner');
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function($dependency){
            $dependency->RecordAuditTrail(false);
        });

        static::created(function($dependency){
            $dependency->RecordAuditTrail(true);

            //todo Add the events
        });
    }

}

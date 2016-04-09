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
    protected $fillable = ['subject_id','subject_type','subject_name','status','title','description', 'NextReviewDate', 'created_by','unlinked', 'owner','dependent_on_id', 'dependent_on_type','dependent_on_name'];

    public function Creator() {

        return $this->hasOne('tracker\Models\User', 'id', 'created_by');

    }

    public function Owner() {
        return $this->hasOne('tracker\Models\User', 'id', 'owner');
    }

    public static function Register($attributes)
    {
        return static::create($attributes);
    }

    public function UpdateDependency($attributes)
    {
        return $this->update($attributes);
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function($dependency){
            $dependency->RecordAuditTrail(false);
        });

        static::created(function($dependency){
            $dependency->RecordAuditTrail(true);
        });

            //todo Add the events
            //todo delete audit trail and comments
        static::deleting(function($dependency){
            $dependency->DeleteAuditTrail();
            $dependency->DeleteComments();
            $dependency->DeleteActions();
        });
    }

}

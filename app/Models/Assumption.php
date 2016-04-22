<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;
use tracker\Events\AssumptionCreated;
use tracker\Events\AssumptionUpdated;
use tracker\Traits\ActionTrait;
use tracker\Traits\AuditTrailTrait;
use tracker\Traits\CommentTrait;

class Assumption extends Model
{
    public $subjecttype = 'Assumption';
    use AuditTrailTrait, CommentTrait, ActionTrait;

    protected $dates = ['CreatedDate', 'DueDate'];
    protected $fillable = ['subject_id','subject_type','subject_name','status','title', 'description', 'owner', 'raised', 'DueDate', 'meeting_id', 'created_by'  ];


    public function Creator() {

        return $this->hasOne('tracker\Models\User', 'id', 'created_by');

    }

    public function Owner() {

        return $this->hasOne('tracker\Models\User', 'id', 'owner');

    }

    public function Meeting() {

        return $this->hasOne( Meeting::class , 'id', 'meeting_id');

    }

    public function scopeActive($query)
    {
        // return $query->where('status', 'open')->orWhere('updated_at', '>' , Carbon::now()->addDays(-14));
        return $query->where('status', 'Open');
    }


    public function scopeDashboardAssumptions($query)
    {

        return $query->where('status', 'Open')->Where('DueDate', '<', Carbon::today()->addDays(5));

    }

    public function scopeDueAssumptions($query)
    {

        return $query->where('status', 'Open')->Where('DueDate', '<', Carbon::today()->addDays(5));

    }

    public function scopeForMeeting($query, $meeting_id)
    {
        return $query->where('meeting_id', $meeting_id);
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function($assumption){
            $assumption->RecordAuditTrail(false);
        });

        static::updated(function($assumption){
            event(new AssumptionUpdated($assumption));
        });

        static::created(function($assumption){
            $assumption->RecordAuditTrail(true);

            event(new AssumptionCreated($assumption));
        });

        static::deleting(function($assumption){
            $assumption->DeleteAuditTrail();
            $assumption->DeleteComments();
            $assumption->DeleteActions();
        });
    }
}

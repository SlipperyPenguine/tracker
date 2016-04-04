<?php

namespace tracker\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use tracker\Events\ActionCreated;
use tracker\Events\ActionUpdated;
use tracker\Traits\AuditTrailTrait;
use tracker\Traits\CommentTrait;

class Action extends Model
{
    public $subjecttype = 'Action';
    use AuditTrailTrait, CommentTrait;

    protected $dates = ['DueDate'];

    public function Actionee() {

        return $this->hasOne('tracker\Models\User', 'id', 'actionee');

    }

    public function Creator() {

        return $this->hasOne('tracker\Models\User', 'id', 'created_by');

    }

    public function Meeting() {

        return $this->hasOne( Meeting::class , 'id', 'meeting_id');

    }

    public function scopeActive($query)
    {
        // return $query->where('status', 'open')->orWhere('updated_at', '>' , Carbon::now()->addDays(-14));
        return $query->where('status', 'Open');
    }

    public function scopeDashboardActions($query)
    {

        return $query->where('status', 'Open')->Where('DueDate', '<', Carbon::today()->addDays(5));

    }

    public function scopeDueActions($query)
    {

        return $query->where('status', 'Open')->Where('DueDate', '<', Carbon::today()->addDays(5));

    }

    public static function boot()
    {
        parent::boot();

        static::updating(function($action){
            $action->RecordAuditTrail(false);
        });

        static::updated(function($action){
            event(new ActionUpdated($action));
        });

        static::created(function($action){
            $action->RecordAuditTrail(true);

            event(new ActionCreated($action));
        });
    }
}

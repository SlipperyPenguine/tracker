<?php

namespace tracker\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Risk extends Model
{
    //protected $dates = ['NextReviewDate'];
   // protected $dateFormat = '';

    public static function boot()
    {
        parent::boot();

        static::updating(function($risk){
            $risk->CheckForProbabilityOrImpactChange();
            $risk->RecordAuditTrail(false);


        });

        static::created(function($risk){
            $risk->RecordAuditTrail(true);

        });
    }

    public function Tasks() {
        return $this->hasMany('tracker\Models\Task', 'subject_id', 'id')->where('subject_type', 'Risk');
    }
    public function getActiveTaskCountAttribute()
    {
        return $this->Tasks()->where('status', 'Open')->count();
    }

    public function getActiveTasks()
    {
        return $this->Tasks()->Active()->get();
    }

    public function getNextReviewDateAttribute($date)
    {
        return Carbon::parse($date)->format('d F Y');
    }

    public function getOwnerNameAttribute()
    {
        return User::findorFail($this->owner)->name;
    }


    public function AuditTrail()
    {
       return $this->belongsToMany( User::class, 'risk_audit_trails' )
           ->withTimestamps()
           ->withPivot(['before','after']);
    }

    protected function CheckForProbabilityOrImpactChange()
    {
        $changed = $this->getDirty();
        $fresh = null;
        if(isset($changed['impact'])||isset($changed['probability']))
        {
            $fresh = $this->fresh();
        }

        if(isset($changed['probability']))
        {
            $this->previous_probability = $fresh->probability;
        }
        if(isset($changed['impact']))
        {
            $this->previous_impact = $fresh->impact;

        }
    }

    protected function RecordAuditTrail($inserting, $userid = null)
    {

        $userid = $userid ?: Auth::id();

        $this->AuditTrail()->attach($userid, $this->getChanges($inserting));
    }

    protected function getChanges($inserting)
    {

        $after = '';

        if($inserting)
        {
            $before = '';
            $after = json_encode($this);
        }
        else
        {
            $changed = $this->getDirty();
            $before = json_encode(array_intersect_key($this->fresh()->toArray(), $changed));
            $after = json_encode($changed);
        }
        return compact('before','after');
    }
}

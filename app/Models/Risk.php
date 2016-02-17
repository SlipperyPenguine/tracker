<?php

namespace tracker\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use tracker\Traits\ActionTrait;
use tracker\Traits\AuditTrailTrait;
use tracker\Traits\CommentTrait;

class Risk extends Model
{
    protected $subjecttype = 'Risk';
    use ActionTrait, AuditTrailTrait, CommentTrait;

    //protected $dates = ['NextReviewDate'];

   // protected $dateFormat = '';

    public function RiskOwner() {
        return $this->hasOne('tracker\Models\User', 'id', 'owner');
    }

    public function ActionOwner() {
        return $this->hasOne('tracker\Models\User', 'action_owner', 'id');
    }

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


    public function getNextReviewDateAttribute($date)
    {
        return Carbon::parse($date)->format('d F Y');
    }

    public function getOwnerNameAttribute()
    {
        return User::findorFail($this->owner)->name;
    }

    public function getCurrentRiskClassificationScoreAttribute()
    {
        return $this->probability * $this->impact;
    }

    public function getCurrentRiskClassificationAttribute()
    {
        $score = $this->CurrentRiskClassificationScore;

        if($score > 12)
            return 'Prevent';

        if($score > 9)
            return 'Mitigate';

        if($score > 4)
            return 'Contingency';

        return 'Accept';
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


}

<?php

namespace tracker\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use tracker\Events\RiskCreated;
use tracker\Events\RiskUpdated;
use tracker\Traits\ActionTrait;
use tracker\Traits\AuditTrailTrait;
use tracker\Traits\CommentTrait;
use tracker\Traits\LinkTrait;

class Risk extends Model
{
    public $subjecttype = 'Risk';
    use ActionTrait, AuditTrailTrait, CommentTrait, LinkTrait;
    protected $appends = array('CurrentRiskClassification');

    protected $dates = ['NextReviewDate'];

   // protected $dateFormat = '';

    public function RiskOwner() {
        return $this->hasOne('tracker\Models\User', 'id', 'owner');
    }

    public function ActionOwner() {
        return $this->hasOne('tracker\Models\User', 'action_owner', 'id');
    }

    public function scopeDueReview($query)
    {

        return $query->where('status', 'Open')->Where('NextReviewDate', '<', Carbon::today()->addDays(5));

    }

    public static function boot()
    {
        parent::boot();

        static::updating(function($risk){
            $risk->calculateCurrentRiskClassificationScore();
            $risk->CheckForProbabilityOrImpactChange();
            $risk->RecordAuditTrail(false);
        });

        static::updated(function($risk){

            event(new RiskUpdated($risk));
        });
        static::creating(function($risk){
            $risk->calculateCurrentRiskClassificationScore();
        });

        static::created(function($risk){
            $risk->RecordAuditTrail(true);
            //raised the event
            event(new RiskCreated($risk));

        });
    }

    public function getOpenActionCountAttribute()
    {
        return $this->Actions()->where('status', 'Open')->count();
    }

    public function getOwnerNameAttribute()
    {
        return User::findorFail($this->owner)->name;
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

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeReviewPending($query)
    {
        return $query->where('status','Open')->where('NextReviewDate', '<', Carbon::today()->addDays(5));
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopePrevent($query)
    {
        return $query->where('CurrentRiskClassification', 'Prevent');
    }

    public function scopeTopFive($query)
    {
        return $query->orderBy('CurrentRiskClassificationScore', 'desc')->take(5);
    }

    public function scopeOpen($query)
    {
        return $query->where('status', 'Open');
    }

    public function scopeDashboardRisks($query)
    {

        return $query->where('CurrentRiskClassificationScore', '>', 9)
                            ->orWhere('NextReviewDate', '<', Carbon::today()->addDays(5));

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

    protected function calculateCurrentRiskClassificationScore()
    {
        $this->CurrentRiskClassificationScore = $this->probability * $this->impact;
    }


}

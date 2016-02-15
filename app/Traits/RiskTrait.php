<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 01/02/2016
 * Time: 16:49
 */

namespace tracker\Traits;


trait RiskTrait
{

    public function Risks() {
        return $this->hasMany('tracker\Models\Risk', 'subject_id', 'id')->where('subject_type', $this->subjecttype);
    }

    public function getActiveRiskCountAttribute()
    {
        return $this->Risks()->where('is_an_issue', 0)->where('status', 'Open')->count();
    }

    public function getActiveIssueCountAttribute()
    {
        return $this->Risks()->where('is_an_issue', 1)->where('status', 'Open')->count();
    }



}
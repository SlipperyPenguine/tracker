<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 20/04/2016
 * Time: 22:28
 */

namespace tracker\Traits;


trait AssumptionTrait
{
    public function Assumptions()
    {
        if ($this->subjecttype == 'Meeting') {

            return $this->hasMany('tracker\Models\Assumption', 'meeting_id', 'id');

        } else {
            return $this->hasMany('tracker\Models\Assumption', 'subject_id', 'id')->where('subject_type', $this->subjecttype);

        }
    }
    public function getActiveAssumptionCountAttribute()
    {
        return $this->Assumptions()->where('status', 'Open')->count();
    }

    public function getActiveAssumptions()
    {
        return $this->Assumptions()->Active()->get();
    }

    protected function DeleteAssumptions()
    {
        DB::table('assumptions')->where('subject_type', $this->subjecttype)->where('subject_id', $this->id)->delete();
    }
}
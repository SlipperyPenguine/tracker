<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 01/02/2016
 * Time: 16:49
 */

namespace tracker\Traits;


use Illuminate\Support\Facades\DB;
use tracker\Helpers\ObjectFinder;
use tracker\Models\Action;

trait ActionTrait
{
    public function Actions()
    {
        if ($this->subjecttype == 'Meeting') {

            //$parent = ObjectFinder::GetObject($this->subject_type, $this->subject_id);

/*            return Action::where('subject_type', $parent->subject_type)
                            ->where('subject_id', $parent->subject_id)
                            ->where('meeting_id', $this->id)
                            ->get();*/

            return $this->hasMany('tracker\Models\Action', 'meeting_id', 'id');

        } else {
            return $this->hasMany('tracker\Models\Action', 'subject_id', 'id')->where('subject_type', $this->subjecttype);

        }
    }
    public function getActiveActionsCountAttribute()
    {
        return $this->Actions()->where('status', 'Open')->count();
    }

    public function getActiveActions()
    {
        return $this->Actions()->Active()->get();
    }

    protected function DeleteActions()
    {
        DB::table('actions')->where('subject_type', $this->subjecttype)->where('subject_id', $this->id)->delete();
    }
}
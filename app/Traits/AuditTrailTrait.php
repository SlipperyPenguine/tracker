<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 01/02/2016
 * Time: 16:49
 */

namespace tracker\Traits;


use Illuminate\Support\Facades\Auth;
use tracker\Models\User;

trait AuditTrailTrait
{

    public function AuditTrail()
    {
        return $this->belongsToMany( User::class, 'audit_trails', 'subject_id', 'user_id' )
            ->withTimestamps()
            ->withPivot(['before','after'])
            ->where('subject_type', $this->subjecttype);
    }

    protected function RecordAuditTrail($inserting, $userid = null)
    {

        $userid = $userid ?: Auth::id();

        $additionalfields['subject_type'] = $this->subjecttype;
        $additionalfields['subject_id'] = $this->id;

        $additionalfields = array_merge($additionalfields, $this->getChanges($inserting) );

        $this->AuditTrail()->attach($userid, $additionalfields);
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
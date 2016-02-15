<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 01/02/2016
 * Time: 16:49
 */

namespace tracker\Traits;


trait MemberTrait
{

    public function Members() {
        return $this->hasMany('tracker\Models\Member', 'subject_id', 'id')->where('subject_type', $this->subjecttype);
    }

}
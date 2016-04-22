<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 01/02/2016
 * Time: 16:49
 */

namespace tracker\Traits;


use tracker\Models\Link;

trait LinkTrait
{

    public function Links()
    {
        return $this->hasMany(Link::class, 'subject_id', 'id')->where('subject_type', $this->subjecttype);
    }

}
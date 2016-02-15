<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;
use tracker\Traits\ActionTrait;
use tracker\Traits\MemberTrait;
use tracker\Traits\RagTrait;
use tracker\Traits\RiskTrait;
use tracker\Traits\TaskTrait;

class Program extends Model
{
    protected $subjecttype = 'Program';
    use TaskTrait, RagTrait, RiskTrait, MemberTrait, ActionTrait;

    protected $dates = ['StartDate', 'EndDate'];

    public function WorkStreams() {

        return $this->hasMany('tracker\models\WorkStream', 'program_id', 'id');

    }

    public function Projects() {

        return $this->hasMany('tracker\models\Project', 'program_id', 'id');

    }

}

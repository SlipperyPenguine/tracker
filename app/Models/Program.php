<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $dates = ['StartDate', 'EndDate'];

    public function WorkStreams() {

        return $this->hasMany('tracker\models\WorkStream', 'program_id', 'id');

    }

    public function Projects() {

        return $this->hasMany('tracker\models\Project', 'program_id', 'id');

    }

    public function Members() {

        return $this->hasMany('tracker\Models\Member', 'subject_id', 'id')->where('subject_type', 'Program');

    }

    public function RAGs() {
        return $this->hasMany('tracker\Models\rag', 'subject_id', 'id')->where('subject_type', 'Program');
    }

    public function Risks() {
        return $this->hasMany('tracker\Models\Risk', 'subject_id', 'id')->where('subject_type', 'Program');
    }
}

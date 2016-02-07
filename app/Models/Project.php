<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $dates = ['StartDate', 'EndDate'];

    protected $appends = array('StatusText');

    public function Program() {

        return $this->belongsTo('tracker\Models\Program',  'program_id', 'id');

    }

    public function WorkStream() {

        return $this->belongsTo('tracker\Models\WorkStream',  'work_stream_id', 'id');

    }

    public function Members() {

        return $this->hasMany('tracker\Models\ProjectMember', 'project_id', 'id');

    }


    public function RAGs() {
        return $this->hasMany('tracker\Models\rag', 'subject_id', 'id')->where('subject_type', 'Project');
    }

    public function Risks() {
        return $this->hasMany('tracker\Models\Risk', 'subject_id', 'id')->where('subject_type', 'Project');
    }

    public function getStatusTextAttribute()
    {
        switch($this->Status)
        {
            case 0:
                return $this->Status.' Pre Gate 1';
            case 1:
                return 'Post Gate 1, concept paper approved';
            case 2:
                return 'Post Review 1, concept paper and SDD approved';
            case 3:
                return 'Post Gate 2, in build';
            case 4:
                return 'Post Gate 3, Rolling out';
            case 5:
                return 'Closed';
            Case 6:
                return 'Cancelled';
            default:
                Return 'Unknown';
        }
    }
}

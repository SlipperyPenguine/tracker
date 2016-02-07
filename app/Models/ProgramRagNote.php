<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramRagNote extends Model
{
    public function Program() {

        return $this->belongsTo('tracker\models\Program',  'program_id', 'id');

    }
}

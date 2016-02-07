<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramRisk extends Model
{
    public function Program() {

        return $this->belongsTo('tracker\models\Program',  'program_id', 'id');

    }
}

<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramRiskAction extends Model
{
    public function Program() {

        return $this->belongsTo('tracker\models\Program',  'program_id', 'id');

    }
}

<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;

class WorkStreamRagNote extends Model
{
    public function WorkSteam() {

        return $this->belongsTo('tracker\models\WorkStream',  'work_stream_id', 'id');

    }
}

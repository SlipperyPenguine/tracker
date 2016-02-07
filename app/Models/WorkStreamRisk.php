<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;

class WorkStreamRisk extends Model
{
    public function WorkStream() {

        return $this->belongsTo('tracker\models\WorkStream',  'work_stream_id', 'id');

    }
}

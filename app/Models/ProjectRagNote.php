<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectRagNote extends Model
{
    public function Project() {

        return $this->belongsTo('tracker\models\Project',  'project_id', 'id');

    }
}

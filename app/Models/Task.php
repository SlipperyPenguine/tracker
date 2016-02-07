<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $dates = ['StartDate', 'EndDate'];

    public function ActionOwner() {

        return $this->hasOne('tracker\Models\User', 'id', 'action_owner');

    }
}

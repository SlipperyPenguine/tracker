<?php

namespace tracker\Models;


use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function User() {

        return $this->hasOne('tracker\Models\User', 'id', 'user_id');

    }
}

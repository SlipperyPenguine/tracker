<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;

class rag extends Model
{
    protected $fillable = ['subject_id', 'subject_type' ,'title' , 'value' , 'comments'];
}

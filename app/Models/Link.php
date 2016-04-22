<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public $subjecttype = 'Link';
    protected $fillable = ['subject_id', 'subject_type' ,'title' , 'url'];
}

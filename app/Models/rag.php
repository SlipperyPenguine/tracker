<?php

namespace tracker\Models;

use Illuminate\Database\Eloquent\Model;
use tracker\Traits\AuditTrailTrait;
use tracker\Traits\CommentTrait;

class rag extends Model
{
    use AuditTrailTrait, CommentTrait;
    public $subjecttype = 'Rag';
    protected $fillable = ['subject_id', 'subject_type' ,'title' , 'value' , 'comments'];



    public static function boot()
    {
        parent::boot();

        static::updating(function($rag){
            $rag->RecordAuditTrail(false);
        });

        static::created(function($rag){
            $rag->RecordAuditTrail(true);
        });
    }

    public function getValueTextAttribute()
    {
        switch($this->value)
        {
            case 'G':
                return 'Green';
                break;
            case 'A':
                return 'Amber';
                break;
            case 'R':
                return 'Red';
                break;
        }
    }
}

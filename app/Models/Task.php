<?php

namespace tracker\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $dates = ['StartDate', 'EndDate'];

    public function ActionOwner() {

        return $this->hasOne('tracker\Models\User', 'id', 'action_owner');

    }

    public function scopeActive($query)
    {
       // return $query->where('status', 'open')->orWhere('updated_at', '>' , Carbon::now()->addDays(-14));
        return $query->where('status', 'open');
    }

/*    public function getStartDateAttribute($date)
    {
        return Carbon::parse($date)->format('d F Y');
    }

    public function getEndDateAttribute($date)
    {
        return Carbon::parse($date)->format('d F Y');
    }*/
}

<?php

namespace tracker\Listeners;

use Illuminate\Support\Facades\DB;
use tracker\Events\RiskUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateRiskActionsOnRiskUpdate
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RiskUpdated  $event
     * @return void
     */
    public function handle(RiskUpdated $event)
    {
        $risk = $event->risk;

        //check if the name is dirty
        if($risk->IsDirty('title'))
        {
            //if dirty update the dependency lookup date
            DB::table('actions')->where('subject_type', 'Risk')->where('subject_id', $risk->id)->update(array('subject_name' => $risk->title));
        }
    }
}

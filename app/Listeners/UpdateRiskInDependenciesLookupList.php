<?php

namespace tracker\Listeners;

use tracker\Events\RiskUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Models\DependencyLookup;

class UpdateRiskInDependenciesLookupList
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
            $lookup = DependencyLookup::where('subject_type','Risk')->where('subject_id', $risk->id)->first();

            $lookup->subject_name = $risk->title;

            $lookup->save();
        }

    }
}

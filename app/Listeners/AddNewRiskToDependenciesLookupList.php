<?php

namespace tracker\Listeners;

use tracker\Events\RiskCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Models\DependencyLookup;

class AddNewRiskToDependenciesLookupList
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
     * @param  RiskCreated  $event
     * @return void
     */
    public function handle(RiskCreated $event)
    {
        $risk = $event->risk;

        $lookup = new DependencyLookup();

        $lookup->subject_type = 'Risk';
        $lookup->subject_id = $risk->id;
        $lookup->subject_name = $risk->title;

        $lookup->save();

    }
}

<?php

namespace tracker\Listeners;

use tracker\Events\RiskUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailRiskOwnerAboutUpdatedRisk
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
        //
    }
}

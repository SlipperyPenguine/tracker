<?php

namespace tracker\Listeners;

use tracker\Events\RiskCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailRiskOwnerOfNewRisk
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
        //
    }
}

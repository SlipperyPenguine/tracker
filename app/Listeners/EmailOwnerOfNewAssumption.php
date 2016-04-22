<?php

namespace tracker\Listeners;

use tracker\Events\AssumptionCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailOwnerOfNewAssumption
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
     * @param  AssumptionCreated  $event
     * @return void
     */
    public function handle(AssumptionCreated $event)
    {
        //
    }
}

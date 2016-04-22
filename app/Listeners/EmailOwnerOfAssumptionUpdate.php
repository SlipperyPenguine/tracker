<?php

namespace tracker\Listeners;

use tracker\Events\AssumptionUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailOwnerOfAssumptionUpdate
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
     * @param  AssumptionUpdated  $event
     * @return void
     */
    public function handle(AssumptionUpdated $event)
    {
        //
    }
}

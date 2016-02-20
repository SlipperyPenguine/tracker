<?php

namespace tracker\Listeners;

use tracker\Events\ActionUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailActioneeAboutUpdatedAction
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
     * @param  ActionUpdated  $event
     * @return void
     */
    public function handle(ActionUpdated $event)
    {
        //
    }
}

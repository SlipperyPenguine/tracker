<?php

namespace tracker\Listeners;

use tracker\Events\ActionCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailActioneeOfNewAction
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
     * @param  ActionCreated  $event
     * @return void
     */
    public function handle(ActionCreated $event)
    {
        //
    }
}

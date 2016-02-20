<?php

namespace tracker\Listeners;

use tracker\Events\ActionCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Models\DependencyLookup;

class AddNewActionToDependenciesLookupList
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
        $lookup = new DependencyLookup();

        $lookup->subject_type = 'Action';
        $lookup->subject_id = $event->action->id;
        $lookup->subject_name = $event->action->title;

        $lookup->save();
    }
}

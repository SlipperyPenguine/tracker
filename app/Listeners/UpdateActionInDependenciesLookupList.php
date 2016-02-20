<?php

namespace tracker\Listeners;

use tracker\Events\ActionUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Models\DependencyLookup;

class UpdateActionInDependenciesLookupList
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
        //check if the name is dirty
        if($event->action->IsDirty('title'))
        {
            //if dirty update the dependency lookup date
            $lookup = DependencyLookup::where('subject_type','Action')->where('subject_id', $event->action->id)->first();

            $lookup->subject_name = $event->action->title;

            $lookup->save();
        }
    }
}

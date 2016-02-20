<?php

namespace tracker\Listeners;

use tracker\Events\WorkStreamUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Models\DependencyLookup;

class UpdateWorkStreamInDependenciesLookupList
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
     * @param  WorkStreamUpdated  $event
     * @return void
     */
    public function handle(WorkStreamUpdated $event)
    {
        //check if the name is dirty
        if($event->workstream->IsDirty('name'))
        {
            //if dirty update the dependency lookup date
            $lookup = DependencyLookup::where('subject_type','WorkStream')->where('subject_id', $event->workstream->id)->first();

            $lookup->subject_name = $event->workstream->name;

            $lookup->save();
        }
    }
}

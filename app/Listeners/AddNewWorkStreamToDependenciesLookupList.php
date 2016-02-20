<?php

namespace tracker\Listeners;

use tracker\Events\WorkStreamCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Models\DependencyLookup;

class AddNewWorkStreamToDependenciesLookupList
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
     * @param  WorkStreamCreated  $event
     * @return void
     */
    public function handle(WorkStreamCreated $event)
    {
        $lookup = new DependencyLookup();

        $lookup->subject_type = 'WorkStream';
        $lookup->subject_id = $event->workstream->id;
        $lookup->subject_name = $event->workstream->name;

        $lookup->save();
    }
}

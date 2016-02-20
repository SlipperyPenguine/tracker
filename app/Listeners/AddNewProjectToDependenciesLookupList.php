<?php

namespace tracker\Listeners;

use tracker\Events\ProjectCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Models\DependencyLookup;

class AddNewProjectToDependenciesLookupList
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
     * @param  ProjectCreated  $event
     * @return void
     */
    public function handle(ProjectCreated $event)
    {
        $lookup = new DependencyLookup();

        $lookup->subject_type = 'Project';
        $lookup->subject_id = $event->project->id;
        $lookup->subject_name = $event->project->name;

        $lookup->save();
    }
}

<?php

namespace tracker\Listeners;

use tracker\Events\ProjectUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Models\DependencyLookup;

class UpdateProjectInDependenciesLookupList
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
     * @param  ProjectUpdated  $event
     * @return void
     */
    public function handle(ProjectUpdated $event)
    {
        //check if the name is dirty
        if($event->project->IsDirty('name'))
        {
            //if dirty update the dependency lookup date
            $lookup = DependencyLookup::where('subject_type','Project')->where('subject_id', $event->project->id)->first();

            $lookup->subject_name = $event->project->name;

            $lookup->save();
        }
    }
}

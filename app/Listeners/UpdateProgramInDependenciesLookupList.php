<?php

namespace tracker\Listeners;

use tracker\Events\ProgramUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Models\DependencyLookup;

class UpdateProgramInDependenciesLookupList
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
     * @param  ProgramUpdated  $event
     * @return void
     */
    public function handle(ProgramUpdated $event)
    {
        //check if the name is dirty
        if($event->program->IsDirty('name'))
        {
            //if dirty update the dependency lookup date
            $lookup = DependencyLookup::where('subject_type','Program')->where('subject_id', $event->program->id)->first();

            $lookup->subject_name = $event->program->name;

            $lookup->save();
        }
    }
}

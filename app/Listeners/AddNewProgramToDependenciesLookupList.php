<?php

namespace tracker\Listeners;

use tracker\Events\ProgramCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Models\DependencyLookup;

class AddNewProgramToDependenciesLookupList
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
     * @param  ProgramCreated  $event
     * @return void
     */
    public function handle(ProgramCreated $event)
    {
        $lookup = new DependencyLookup();

        $lookup->subject_type = 'Program';
        $lookup->subject_id = $event->program->id;
        $lookup->subject_name = $event->program->name;

        $lookup->save();
    }
}

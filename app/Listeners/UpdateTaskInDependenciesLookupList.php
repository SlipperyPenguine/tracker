<?php

namespace tracker\Listeners;

use tracker\Events\TaskUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Models\DependencyLookup;

class UpdateTaskInDependenciesLookupList
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
     * @param  TaskUpdated  $event
     * @return void
     */
    public function handle(TaskUpdated $event)
    {
        $task = $event->task;

        //check if the name is dirty
        if($task->IsDirty('title'))
        {
            //if dirty update the dependency lookup date
            $lookup = DependencyLookup::where('subject_type','Task')->where('subject_id', $task->id)->first();

            $lookup->subject_name = $task->title;

            $lookup->save();
        }
    }
}

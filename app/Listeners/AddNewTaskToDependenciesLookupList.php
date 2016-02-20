<?php

namespace tracker\Listeners;

use tracker\Events\TaskCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Models\DependencyLookup;

class AddNewTaskToDependenciesLookupList
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
     * @param  TaskCreated  $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        $task = $event->task;

        $lookup = new DependencyLookup();

        $lookup->subject_type = 'Task';
        $lookup->subject_id = $task->id;
        $lookup->subject_name = $task->title;

        $lookup->save();
    }
}

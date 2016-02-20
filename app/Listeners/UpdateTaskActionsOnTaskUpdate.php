<?php

namespace tracker\Listeners;

use Illuminate\Support\Facades\DB;
use tracker\Events\TaskUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateTaskActionsOnTaskUpdate
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
            DB::table('actions')->where('subject_type', 'Task')->where('subject_id', $task->id)->update(array('subject_name' => $task->title));
        }
    }
}

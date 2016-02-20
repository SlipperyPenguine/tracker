<?php

namespace tracker\Events;

use tracker\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use tracker\Models\Project;

class ProjectCreated extends Event
{
    use SerializesModels;

    public $project;

    /**
     * Create a new event instance.
     *
     * @param Project $project
     *
     * @internal param WorkStream $program
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}

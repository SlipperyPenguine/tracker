<?php

namespace tracker\Events;

use tracker\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use tracker\Models\WorkStream;

class WorkStreamUpdated extends Event
    {
    use SerializesModels;

    public $workstream;

    /**
     * Create a new event instance.
     *
     * @param WorkStream $program
     */
    public function __construct(WorkStream $workstream)
    {
        $this->workstream = $workstream;
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

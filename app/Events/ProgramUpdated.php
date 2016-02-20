<?php

namespace tracker\Events;

use tracker\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use tracker\Models\Program;

class ProgramUpdated extends Event
{
    use SerializesModels;

    public $program;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Program $program)
    {
        $this->program = $program;
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

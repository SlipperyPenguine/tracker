<?php

namespace tracker\Events;

use tracker\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use tracker\Models\Risk;

class RiskCreated extends Event
{
    use SerializesModels;

    public $risk;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Risk $risk)
    {
        $this->risk = $risk;
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

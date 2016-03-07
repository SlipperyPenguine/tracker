<?php

namespace tracker\Listeners;

use tracker\Events\TaskUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Mailers\appMailer;

class EmailTaskOwnerAboutUpdatedTask implements ShouldQueue
{
    protected $mailer;


    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(appMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  ActionUpdated  $event
     * @return void
     */
    public function handle(TaskUpdated $event)
    {
        $this->mailer->emailUserTaskHasChanged($event->task);
    }
}

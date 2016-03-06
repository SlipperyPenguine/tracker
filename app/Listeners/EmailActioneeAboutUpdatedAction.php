<?php

namespace tracker\Listeners;

use tracker\Events\ActionUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Mailers\appMailer;

class EmailActioneeAboutUpdatedAction implements ShouldQueue
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
    public function handle(ActionUpdated $event)
    {
        $this->mailer->emailUserActionHasChanged($event->action);
    }
}

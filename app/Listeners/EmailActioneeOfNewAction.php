<?php

namespace tracker\Listeners;

use tracker\Events\ActionCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Mailers\appMailer;

class EmailActioneeOfNewAction implements ShouldQueue
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
    public function handle(ActionCreated $event)
    {
        $this->mailer->emailUserNewAction($event->action);
    }
}

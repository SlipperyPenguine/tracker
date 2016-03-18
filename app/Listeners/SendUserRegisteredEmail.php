<?php

namespace tracker\Listeners;

use tracker\Events\UserCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Mailers\appMailer;

class SendUserRegisteredEmail implements ShouldQueue
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
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $this->mailer->emailUserRegistration($event->user);
    }
}

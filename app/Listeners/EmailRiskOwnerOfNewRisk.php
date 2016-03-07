<?php

namespace tracker\Listeners;

use tracker\Events\RiskCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Mailers\appMailer;

class EmailRiskOwnerOfNewRisk implements ShouldQueue
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
    public function handle(RiskCreated $event)
    {
        $this->mailer->emailUserNewRisk($event->risk);
    }
}

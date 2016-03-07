<?php

namespace tracker\Listeners;

use tracker\Events\RiskUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Mailers\appMailer;

/**
 * Class EmailRiskOwnerAboutUpdatedRisk
 * @package tracker\Listeners
 */
class EmailRiskOwnerAboutUpdatedRisk
{
    /**
     * @var appMailer
     */
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
     * @param  RiskUpdated  $event
     * @return void
     */
    public function handle(RiskUpdated $event)
    {
        $this->mailer->emailUserRiskUpdated($event->risk);
    }
}

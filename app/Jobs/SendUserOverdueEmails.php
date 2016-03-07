<?php

namespace tracker\Jobs;

use Illuminate\Mail\Mailer;
use tracker\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use tracker\Mailers\appMailer;
use tracker\Models\Action;
use tracker\Models\Risk;
use tracker\Models\Task;
use tracker\Models\User;

class SendUserOverdueEmails extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //if( ($user->notifyDueTasks) || ($user->notifyDueActions) || ($user->notifyDueRisks)  )

        $totalcount = 0;
        //$messages = array();

        $actions = null;
        $risks = null;

        //check if user wants action emails
        if($this->user->notifyDueActions)
        {
            //compile list of action that are overdue
            $actions = Action::where('actionee', $this->user->id)->DueActions()->get();
            $totalcount += $actions->count();
            //$messages['actions'] = $actions->toArray();

        }




        //check if user wants risk emails
        if($this->user->notifyDueRisks)
        {
            //compile list of risks that are overdue
            $risks = Risk::where('owner', $this->user->id)->DueReview()->get();
            $totalcount += $risks->count();
            //$messages['risks'] = $risks->toArray();
        }

        //if there is something due review send it
        if($totalcount>0)
        {

            appMailer::emailUserDueNotfications($this->user, $actions, $risks);
        }


    }
}

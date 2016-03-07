<?php

namespace tracker\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;
use tracker\Jobs\SendUserOverdueEmails;
use tracker\Models\User;

class sendOverdueEmails extends Command
{
    use DispatchesJobs;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tracker:sendOverdueEmails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For users that have requested email updates this command will check for overdue actions, tasks and risks and email the user the details';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //$this->info('will run a job here to do the work through the queue');

        //get list of all users
        $users = User::all();

        //for each user
        foreach($users as $user)
        {
            //check if user wants emails

            if( ($user->notifyDueActions) || ($user->notifyDueRisks)  )
            {
                $job = new SendUserOverdueEmails($user);
                $this->dispatch($job);
            }
        }


    }
}

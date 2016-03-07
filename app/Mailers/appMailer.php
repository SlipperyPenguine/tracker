<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 06/03/2016
 * Time: 12:23
 */

namespace tracker\Mailers;


use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use tracker\Models\Action;
use tracker\Models\Risk;
use tracker\Models\Task;
use tracker\Models\User;

/**
 * Class appMailer
 * @package tracker\Mailers
 */
class appMailer
{
   // protected $from = 'admin@programtracker.online';

    protected $mailer;


    /**
     * appMailer constructor.
     */
    public function __construct(Mailer $mailer )
    {
        $this->mailer = $mailer;
    }

    public function emailUserTaskHasChanged(Task $task)
    {
        //get the actionee for the action
        $user = User::findOrFail($task->ActionOwner->id);

        //check if this user wants emails
        if (!$user->notifyChangedTasks)
            return false;

        //email the user
        $this->SendMail($user->email, 'emails.NotifyUserTaskHasChanged', compact('task'));

        return true;

    }

    public function emailUserNewTask(Task $task)
    {
        //get the actionee for the action
        $user = User::findOrFail($task->ActionOwner->id);

        //check if this user wants emails
        if (!$user->notifyNewTasks)
            return false;

        //email the user
        $this->SendMail($user->email, 'emails.NotifyUserTaskCreated', compact('task'));

        return true;

    }

    public function emailUserActionHasChanged(Action $action)
    {
        //get the actionee for the action
        $user = User::findOrFail($action->Actionee->id);

        //check if this user wants emails
        if (!$user->notifyChangedActions)
            return false;

        //email the user
        $this->SendMail($user->email, 'emails.NotifyUserActionHasChanged', compact('action'));

        return true;

    }


    public function emailUserNewAction(Action $action)
    {
        //get the actionee for the action
        $user = User::findOrFail($action->Actionee->id);

        //check if this user wants emails
        if (!$user->notifyNewActions)
            return false;

        //email the user
        $this->SendMail($user->email, 'emails.NotifyUserActionCreated', compact('action'));

        return true;

    }

    public function emailUserNewRisk(Risk $risk)
    {
        //get the actionee for the action
        $user = User::findOrFail($risk->RiskOwner->id);

        //check if this user wants emails
        if (!$user->notifyNewRisks)
            return false;

        //email the user
        $this->SendMail($user->email, 'emails.NotifyUserRiskCreated', compact('risk'));

        return true;

    }

    public function emailUserRiskUpdated(Risk $risk)
    {
        //get the actionee for the action
        $user = User::findOrFail($risk->RiskOwner->id);

        //check if this user wants emails
        if (!$user->notifyChangedRisks)
            return false;

        //email the user
        $this->SendMail($user->email, 'emails.NotifyUserRiskHasChanged', compact('risk'));

        return true;

    }

    public static function emailUserDueNotfications($user, $actions, $risks)
    {
        $recipient = $user->email;
        //email the user
        //self::SendMail($user->email, 'emails.SendUserDueNotifications', compact('actions', 'risks'));

        Mail::send('emails.SendUserDueNotifications', compact('actions','risks'), function ($message) use ($recipient) {
          $message->to($recipient);
        });
    }

    private function SendMail($recipient, $view, $data = [])
    {
        $this->mailer->send($view, $data, function($message) use ($recipient)
        {
            $message->to($recipient);
        } );
    }
}
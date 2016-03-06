<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 06/03/2016
 * Time: 12:23
 */

namespace tracker\Mailers;


use Illuminate\Contracts\Mail\Mailer;
use tracker\Models\Action;
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

    private function SendMail($recipient, $view, $data = [])
    {
        $this->mailer->send($view, $data, function($message) use ($recipient)
        {
            $message->to($recipient);
        } );
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 11/08/2015
 * Time: 08:54
 */

namespace tracker\Auth;

use Illuminate\Auth\Guard;
use tracker\models\User;


class TrackerGuard extends Guard
{


    /*
    |--------------------------------------------------------------------------
    | isSuperUser()
    |--------------------------------------------------------------------------
    |
    | Checks if a User is a SuperUser
    |
    */
    public function isSuperUser($user = null)
    {

        // If no user is specified, we assume the user context
        // should be the currently logged in user.
        if (is_null($user))
        {
            if (auth()->check())
                $user = auth()->user();
            else
                return false;
        }


        //for now force it
        return ($user->superUser==1);
    }

}
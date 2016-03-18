<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 18/03/2016
 * Time: 08:59
 */

namespace tracker\Helpers;


class Session
{
    public static function SetRedirect($url)
    {
        session(['redirect' => $url]);
    }

    public static function GetRedirect()
    {
        if (session('redirect'))
        {
            return session('redirect');
        }
        else
        {
            return route('home');
        }
    }

}
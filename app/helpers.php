<?php


function flash($title = null, $message = null)
{
    $flash = app('tracker\Http\flash');

    if(func_num_args() == 0)
    {
        return $flash;
    }

    return $flash->message($title, $message);
}


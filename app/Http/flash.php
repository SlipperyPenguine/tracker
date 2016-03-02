<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 07/08/2015
 * Time: 23:36
 */

namespace tracker\Http;


class flash
{
    private function create($title, $message, $color, $icon)
    {
        session()->flash('flash_message',[
            'title' => $title,
            'message' => $message,
            'color' => $color,
            'icon' => $icon
        ] );
    }

    public function message($title, $message)
    {
        return $this->create($title, $message, '#296191', 'fa fa-bell fa-2x swing animated');
    }

    public function success($title, $message)
    {
        return $this->create($title, $message, '#71843f', 'fa fa-check fa-2x fadeInRight animated');
    }

    public function warning($title, $message)
    {
        return $this->create($title, $message, '#c79121', 'fa fa-warning fa-2x swing animated');
    }

    public function error($title, $message)
    {
        return $this->create($title, $message, '#a65858', 'fa fa-cross fa-2x fadeInRight animated' );
    }
}
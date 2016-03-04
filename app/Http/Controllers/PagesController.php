<?php

namespace tracker\Http\Controllers;

use Illuminate\Http\Request;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function home()
    {
        if(auth()->check())
        {
            $controller = new UserController();

            return $controller->dashboard(auth()->user()->id);
        }
        else
        {
            $controller = new ProgramController();

            return $controller->index();
        }
    }


}

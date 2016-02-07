<?php

namespace tracker\Http\Controllers;

use Illuminate\Http\Request;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function minor()
    {
        return view('minor');

    }
}

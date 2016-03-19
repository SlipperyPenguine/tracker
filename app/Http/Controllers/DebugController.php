<?php

namespace tracker\Http\Controllers;

use Illuminate\Http\Request;
use tracker\Http\Requests;
use tracker\Http\Controllers\Controller;

class DebugController extends Controller
{
    public function logfiles()
    {
        $laravellog = \File::get(base_path('storage/logs/laravel.log'));

        return view('debug.logfiles', compact('laravellog'));
    }


    public function deletelaravellog()
    {
        $this->clearfile(base_path('storage/logs/laravel.log'));

    }

    private function clearfile($filepath)
    {
        \File::delete($filepath);
        \File::put($filepath, '');
    }
}

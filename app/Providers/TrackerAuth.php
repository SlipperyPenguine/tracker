<?php

namespace tracker\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Guard;
use Illuminate\Auth\EloquentUserProvider;
use tracker\Auth\TrackerGuard;

class TrackerAuth extends ServiceProvider
{


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }

    public function boot()
    {

        \Auth::extend('tracker_driver', function() {
            $model = \Config::get('auth.model');
            $provider = new EloquentUserProvider(\App::make('hash'), $model);
            return new TrackerGuard($provider, \App::make('session.store'));
        });
    }
}

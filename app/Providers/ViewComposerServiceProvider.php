<?php

namespace tracker\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->AddVariablesForDashboardNavbar();

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }





    private function AddVariablesForDashboardNavbar()
    {

        view()->composer('partials.navbar', function($view)
        {

/*            $CharacterID = SeatUserSetting::where('user_id', auth()->user()->id )
                ->where('setting','main_character_id')
                ->first()->value;*/

            $action = app('request')->route()->getAction();

            $controller = class_basename($action['controller']);

            list($controller, $action) = explode('@', $controller);

            $view->with(compact('controller', 'action'));
        });
    }

}

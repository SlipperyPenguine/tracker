<?php

namespace tracker\Providers;

use Illuminate\Support\ServiceProvider;
use tracker\Models\Project;

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
        $this->AddVariablesForTopBar();
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

            $action = "";
            $controller = "";

            try {

                $route = app('request')->route();
                if (isset($route)) {
                    $action = $route->getAction();

                    $controller = class_basename($action['controller']);

                    list($controller, $action) = explode('@', $controller);
                }
            }
            catch (\Exception $e)
            {
                //do nothing
            }
            
            $view->with(compact('controller', 'action'));
        });
    }

    private function AddVariablesForTopBar()
    {

        view()->composer('partials.topbar', function($view)
        {

            $projects = Project::Active()->get();

            $view->with(compact('projects'));
        });
    }

}

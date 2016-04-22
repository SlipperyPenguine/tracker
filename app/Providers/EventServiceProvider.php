<?php

namespace tracker\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'tracker\Events\RiskUpdated' => [
            'tracker\Listeners\EmailRiskOwnerAboutUpdatedRisk',
            'tracker\Listeners\UpdateRiskActionsOnRiskUpdate',
            'tracker\Listeners\UpdateRiskInDependenciesLookupList',
        ],
        'tracker\Events\RiskCreated' => [
            'tracker\Listeners\EmailRiskOwnerOfNewRisk',
            'tracker\Listeners\AddNewRiskToDependenciesLookupList',
        ],
        'tracker\Events\TaskUpdated' => [
            'tracker\Listeners\EmailTaskOwnerAboutUpdatedTask',
            'tracker\Listeners\UpdateTaskActionsOnTaskUpdate',
            'tracker\Listeners\UpdateTaskInDependenciesLookupList',
        ],
        'tracker\Events\TaskCreated' => [
            'tracker\Listeners\EmailTaskOwnerOfNewTask',
            'tracker\Listeners\AddNewTaskToDependenciesLookupList',
        ],
        'tracker\Events\ActionUpdated' => [
            'tracker\Listeners\EmailActioneeAboutUpdatedAction',
            'tracker\Listeners\UpdateActionInDependenciesLookupList',
        ],
        'tracker\Events\ActionCreated' => [
            'tracker\Listeners\EmailActioneeOfNewAction',
            'tracker\Listeners\AddNewActionToDependenciesLookupList',
        ],
        'tracker\Events\ProgramUpdated' => [
            'tracker\Listeners\UpdateProgramInDependenciesLookupList',
        ],
        'tracker\Events\ProgramCreated' => [
            'tracker\Listeners\AddNewProgramToDependenciesLookupList',
        ],
        'tracker\Events\WorkStreamUpdated' => [
            'tracker\Listeners\UpdateWorkStreamInDependenciesLookupList',
        ],
        'tracker\Events\WorkStreamCreated' => [
            'tracker\Listeners\AddNewWorkStreamToDependenciesLookupList',
        ],
        'tracker\Events\ProjectUpdated' => [
            'tracker\Listeners\UpdateProjectInDependenciesLookupList',
        ],
        'tracker\Events\ProjectCreated' => [
            'tracker\Listeners\AddNewProjectToDependenciesLookupList',
        ],
        'tracker\Events\UserCreated' => [
            'tracker\Listeners\SendUserRegisteredEmail',
        ],
        'tracker\Events\MeetingCreated' => [

        ],
        'tracker\Events\MeetingUpdated' => [

        ],
        'tracker\Events\DecisionCreated' => [

        ],
        'tracker\Events\DecisionUpdated' => [

        ],
        'tracker\Events\AssumptionCreated' => [
            'tracker\Listeners\EmailOwnerOfNewAssumption',
        ],
        'tracker\Events\AssumptionUpdated' => [
            'tracker\Listeners\EmailOwnerOfAssumptionUpdate',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}

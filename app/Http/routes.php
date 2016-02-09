<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function ()
{
    return view('welcome');
});

Route::get('welcome', function ()
{
    return view('welcome');
});


//Authentication
Route::controllers(['auth'=>'Auth\AuthController', 'password'=>'Auth\PasswordController']);


Route::get('/', 'PagesController@welcome');
Route::get('welcome', 'PagesController@welcome');
Route::get('minor', 'PagesController@minor');

Route::get('programs', 'ProgramController@index');
Route::get('programs/{ProgramID}', 'ProgramController@show');
Route::get('programs/{ProgramID}/edit', 'ProgramController@edit');
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}', 'WorkstreamController@show');
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/risksandissues/create',['middleware'=>'auth', 'uses' => 'RiskAndIssueController@createWorkstreamRiskOrIssue' ] );
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/risksandissues/{id}/edit', ['middleware'=>'auth', 'uses' => 'RiskAndIssueController@editWorkstreamRiskOrIssue'] );


Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/projects/create',['middleware'=>'auth', 'uses' => 'ProjectController@create' ] );
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/projects/{id}/edit',['middleware'=>'auth', 'uses' => 'ProjectController@edit' ] );
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/projects/{id}',['uses' => 'ProjectController@show' ] );
Route::post('projects', ['middleware'=>'auth', 'uses' =>  'ProjectController@store'] );
Route::patch('projects/{id}', ['middleware'=>'auth', 'uses' => 'ProjectController@update'] );

Route::post('risksandissues', ['middleware'=>'auth', 'uses' =>  'RiskAndIssueController@store'] );
Route::patch('risksandissues/{id}', ['middleware'=>'auth', 'uses' => 'RiskAndIssueController@update'] );
Route::get('risks/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'RiskAndIssueController@createRisk' ] );
Route::get('risks/{id}/edit', ['middleware'=>'auth', 'uses' => 'RiskAndIssueController@editRisk'] );
Route::get('risks/{id}', ['uses' => 'RiskAndIssueController@show'] );

Route::post('tasks', ['middleware'=>'auth', 'uses' =>  'TaskController@store'] );
Route::patch('tasks/{id}', ['middleware'=>'auth', 'uses' => 'TaskController@update'] );

Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/tasks',[ 'uses' => 'TaskController@indexWorkstreamTask' ] );
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/projects/{ProjectID}/tasks',[ 'uses' => 'TaskController@indexProjectTask' ] );

Route::get('tasks/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'TaskController@createTask' ] );
Route::get('tasks/{id}/edit', ['middleware'=>'auth', 'uses' => 'TaskController@editTask'] );
Route::get('tasks/index/{subjecttype}/{subjectid}', ['uses' => 'TaskController@indexTask'] );




Route::get('api/getUsers', 'ApiController@getUsers');
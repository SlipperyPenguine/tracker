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

Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}', 'WorkstreamController@show');

Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/risksandissues/create',['middleware'=>'auth', 'uses' => 'RiskAndIssueController@createWorkstreamRiskOrIssue' ] );
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/risksandissues/{id}/edit', ['middleware'=>'auth', 'uses' => 'RiskAndIssueController@editWorkstreamRiskOrIssue'] );

Route::post('risksandissues', ['middleware'=>'auth', 'uses' =>  'RiskAndIssueController@store'] );
Route::patch('risksandissues/{id}', ['middleware'=>'auth', 'uses' => 'RiskAndIssueController@update'] );

Route::post('tasks', ['middleware'=>'auth', 'uses' =>  'TaskController@store'] );
Route::patch('tasks/{id}', ['middleware'=>'auth', 'uses' => 'TaskController@update'] );

Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/tasks/create',['middleware'=>'auth', 'uses' => 'TaskController@createWorkstreamTask' ] );
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/tasks/{id}/edit', ['middleware'=>'auth', 'uses' => 'TaskController@editWorkstreamTask'] );

Route::get('api/getUsers', 'ApiController@getUsers');
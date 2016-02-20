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


Route::get('/', 'ProgramController@index');
Route::get('home', 'ProgramController@index');

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

//Risks and Issues
Route::post('risksandissues', ['middleware'=>'auth', 'uses' =>  'RiskAndIssueController@store'] );
Route::patch('risksandissues/{id}', ['middleware'=>'auth', 'uses' => 'RiskAndIssueController@update'] );
Route::get('risks/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'RiskAndIssueController@createRisk' ] );
Route::get('risks/{id}/edit', ['middleware'=>'auth', 'uses' => 'RiskAndIssueController@editRisk'] );
Route::get('risks', ['uses' => 'RiskAndIssueController@indexall'] );
Route::get('risks/{id}', ['uses' => 'RiskAndIssueController@show'] );
Route::get('risks/index/{subjecttype}/{subjectid}', ['uses' => 'RiskAndIssueController@index'] );

//comments
Route::post('comments', ['middleware'=>'auth', 'uses' =>  'CommentController@store'] );
Route::post('AjaxComments', [ 'uses' =>  'CommentController@AjaxStore'] );

//users
Route::get('users', 'UserController@index');
Route::get('users/{id}', 'UserController@show');
Route::get('users/{id}/edit', 'UserController@edit');
Route::post('users', ['middleware'=>'auth', 'uses' =>  'UserController@store'] );
Route::patch('users/{id}', ['middleware'=>'auth', 'uses' => 'UserController@update'] );

//Actions
Route::get('actions/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'ActionController@createAction' ] );
Route::get('actions/{id}/edit', ['middleware'=>'auth', 'uses' => 'ActionController@editAction'] );
Route::get('actions/index/{subjecttype}/{subjectid}', ['uses' => 'ActionController@indexAction'] );
Route::get('actions/{id}', [ 'uses' => 'ActionController@show'] );

Route::post('actions', ['middleware'=>'auth', 'uses' =>  'ActionController@store'] );
Route::patch('actions/{id}', ['middleware'=>'auth', 'uses' => 'ActionController@update'] );

//Members
Route::get('members/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'MemberController@createMember' ] );
Route::get('members/{id}/edit', ['middleware'=>'auth', 'uses' => 'MemberController@editMember'] );
Route::get('members/index/{subjecttype}/{subjectid}', ['uses' => 'MemberController@indexMember'] );
Route::get('members/{id}', [ 'uses' => 'MemberController@show'] );

Route::post('members', ['middleware'=>'auth', 'uses' =>  'MemberController@store'] );
Route::patch('members/{id}', ['middleware'=>'auth', 'uses' => 'MemberController@update'] );

//RAGs
Route::get('rags/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'RagController@create' ] );
Route::get('rags/{id}/edit', ['middleware'=>'auth', 'uses' => 'RagController@edit'] );
Route::get('rags/index/{subjecttype}/{subjectid}', ['uses' => 'RagController@index'] );
Route::get('rags/{id}', [ 'uses' => 'RagController@show'] );

Route::post('rags', ['middleware'=>'auth', 'uses' =>  'RagController@store'] );
Route::patch('rags/{id}', ['middleware'=>'auth', 'uses' => 'RagController@update'] );

//Tasks
Route::post('tasks', ['middleware'=>'auth', 'uses' =>  'TaskController@store'] );
Route::patch('tasks/{id}', ['middleware'=>'auth', 'uses' => 'TaskController@update'] );

Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/tasks',[ 'uses' => 'TaskController@indexWorkstreamTask' ] );
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/projects/{ProjectID}/tasks',[ 'uses' => 'TaskController@indexProjectTask' ] );

Route::get('tasks/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'TaskController@createTask' ] );
Route::get('tasks/{id}/edit', ['middleware'=>'auth', 'uses' => 'TaskController@editTask'] );
Route::get('tasks/index/{subjecttype}/{subjectid}', ['uses' => 'TaskController@indexTask'] );
Route::get('tasks/{id}', ['uses' => 'TaskController@show'] );


//API
Route::get('api/getUsers', 'ApiController@getUsers');
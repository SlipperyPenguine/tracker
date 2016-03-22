<?php

//Home Page - will redirect to user dashboard if they are logged in
Route::get('/', 'PagesController@home');
Route::get('home', ['as' => 'home', 'uses' => 'PagesController@home' ]);

//Authentication
//Route::controllers(['auth'=>'Auth\AuthController', 'password'=>'Auth\PasswordController']);

//new Auth
//Route::group(['middleware' => 'web'], function () {
    Route::auth();

    //Route::get('/home', 'HomeController@index');
//});

//Programs
Route::get('programs', 'ProgramController@index');
Route::get('programs/{ProgramID}', 'ProgramController@show');
Route::get('programs/{ProgramID}/edit', 'ProgramController@edit');

//Work Streams
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}', 'WorkstreamController@show');
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/risksandissues/create',['middleware'=>'auth', 'uses' => 'RiskAndIssueController@createWorkstreamRiskOrIssue' ] );
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/risksandissues/{id}/edit', ['middleware'=>'auth', 'uses' => 'RiskAndIssueController@editWorkstreamRiskOrIssue'] );

//Projects
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/projects/create',['middleware'=>'auth', 'uses' => 'ProjectController@create' ] );
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/projects/{id}/edit',['middleware'=>'auth', 'uses' => 'ProjectController@edit' ] );
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/projects/{id}',['uses' => 'ProjectController@show' ] );
Route::post('projects', ['middleware'=>'auth', 'uses' =>  'ProjectController@store'] );
Route::patch('projects/{id}', ['middleware'=>'auth', 'uses' => 'ProjectController@update'] );
Route::post('AjaxFileUpload', [ 'uses' =>  'ProjectController@AjaxFileUpload'] );

Route::get('projects/{id}/projectupload',['as'=>'MicrosoftProjectUpload' ,'middleware'=>'auth', 'uses' => 'ProjectController@MicrosoftProjectUpload' ] );
Route::post('projects/{id}/projectupload',['middleware'=>'auth', 'uses' => 'ProjectController@StoreMicrosoftProjectUpload' ] );


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
Route::delete('comments/{id}', ['middleware'=>'auth', 'uses' =>  'CommentController@destroy'] );
Route::post('AjaxComments', [ 'uses' =>  'CommentController@AjaxStore'] );

//users
Route::get('users', 'UserController@index');
Route::get('users/{id}', 'UserController@show');
Route::get('users/{id}/dashboard', 'UserController@dashboard');
Route::get('users/{id}/edit', 'UserController@edit');
Route::post('users', ['middleware'=>'auth', 'uses' =>  'UserController@store'] );
Route::patch('users/{id}', ['middleware'=>'auth', 'uses' => 'UserController@update'] );

//Actions
Route::get('actions/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'ActionController@create' ] );
Route::get('actions/{id}/edit', ['middleware'=>'auth', 'uses' => 'ActionController@edit'] );
Route::get('actions/index/{subjecttype}/{subjectid}', ['uses' => 'ActionController@index'] );
Route::get('actions', ['uses' => 'ActionController@indexall'] );
Route::get('actions/{id}', [ 'uses' => 'ActionController@show'] );
Route::post('actions', ['middleware'=>'auth', 'uses' =>  'ActionController@store'] );
Route::patch('actions/{id}', ['middleware'=>'auth', 'uses' => 'ActionController@update'] );
Route::delete('actions/{id}', ['middleware'=>'auth', 'uses' =>  'ActionController@destroy'] );

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
Route::get('tasks', ['uses' => 'TaskController@indexall'] );
Route::get('tasks/index/{subjecttype}/{subjectid}', ['uses' => 'TaskController@indexTask'] );
Route::get('tasks/{id}', ['uses' => 'TaskController@show'] );

//Dependencies
Route::get('dependencies/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'DependencyController@create' ] );
Route::get('dependencies/{id}/edit', ['middleware'=>'auth', 'uses' => 'DependencyController@edit'] );
Route::get('dependencies/index/{subjecttype}/{subjectid}', ['uses' => 'DependencyController@index'] );
Route::get('dependencies/{id}', [ 'uses' => 'DependencyController@show'] );
Route::get('dependencies', [ 'uses' => 'DependencyController@indexall'] );
Route::post('dependencies', ['middleware'=>'auth', 'uses' =>  'DependencyController@store'] );
Route::patch('dependencies/{id}', ['middleware'=>'auth', 'uses' => 'DependencyController@update'] );
Route::delete('dependencies/{id}', ['middleware'=>'auth', 'uses' =>  'DependencyController@destroy'] );

//Change Requests
Route::get('changerequests/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'ChangeRequestController@create' ] );
Route::get('changerequests/{id}/edit', ['middleware'=>'auth', 'uses' => 'ChangeRequestController@edit'] );
Route::get('changerequests/index/{subjecttype}/{subjectid}', ['uses' => 'ChangeRequestController@index'] );
Route::get('changerequests', ['uses' => 'ChangeRequestController@indexall'] );
Route::get('changerequests/{id}', [ 'uses' => 'ChangeRequestController@show'] );
Route::post('changerequests', ['middleware'=>'auth', 'uses' =>  'ChangeRequestController@store'] );
Route::patch('changerequests/{id}', ['middleware'=>'auth', 'uses' => 'ChangeRequestController@update'] );
Route::delete('changerequests/{id}', ['middleware'=>'auth', 'uses' =>  'ChangeRequestController@destroy'] );

//API
Route::get('api/getUsers', 'ApiController@getUsers');
Route::get('api/getDependentLookup', 'ApiController@getDependentLookup');

//Debug
Route::get('debug/logfiles', 'DebugController@logfiles');
Route::post('debug/deletelaravellog', 'DebugController@deletelaravellog');



<?php

//Home Page - will redirect to user dashboard if they are logged in
Route::get('/', ['middleware'=>'auth', 'uses' =>'PagesController@home']);
Route::get('home', ['middleware'=>'auth', 'as' => 'home', 'uses' => 'PagesController@home' ]);

//Authentication
//Route::controllers(['auth'=>'Auth\AuthController', 'password'=>'Auth\PasswordController']);

//new Auth
//Route::group(['middleware' => 'web'], function () {
    Route::auth();

    //Route::get('/home', 'HomeController@index');
//});

//Programs
Route::get('programs', ['middleware'=>'auth', 'uses' => 'ProgramController@index' ]);
Route::get('programs/{ProgramID}', [ 'middleware'=>'auth', 'uses' => 'ProgramController@show' ]);
Route::get('programs/{ProgramID}/edit', ['middleware'=>'auth', 'uses' => 'ProgramController@edit']);

//Work Streams
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}', ['middleware'=>'auth', 'uses' => 'WorkstreamController@show']);
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/risksandissues/create',['middleware'=>'auth', 'uses' => 'RiskAndIssueController@createWorkstreamRiskOrIssue' ] );
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/risksandissues/{id}/edit', ['middleware'=>'auth', 'uses' => 'RiskAndIssueController@editWorkstreamRiskOrIssue'] );

//Projects
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/projects/create',['middleware'=>'auth', 'uses' => 'ProjectController@create' ] );
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/projects/{id}/edit',['middleware'=>'auth', 'uses' => 'ProjectController@edit' ] );
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/projects/{id}',['middleware'=>'auth', 'uses' => 'ProjectController@show' ] );
Route::post('projects', ['middleware'=>'auth', 'uses' =>  'ProjectController@store'] );
Route::patch('projects/{id}', ['middleware'=>'auth', 'uses' => 'ProjectController@update'] );
Route::get('projects/index/{subjecttype}/{subjectid}', ['middleware'=>'auth', 'uses' => 'ProjectController@index'] );
Route::post('AjaxFileUpload', [ 'middleware'=>'auth', 'uses' =>  'ProjectController@AjaxFileUpload'] );

Route::get('projects/{id}/projectupload',['as'=>'MicrosoftProjectUpload' ,'middleware'=>'auth', 'uses' => 'ProjectController@MicrosoftProjectUpload' ] );
Route::post('projects/{id}/projectupload',['middleware'=>'auth', 'uses' => 'ProjectController@StoreMicrosoftProjectUpload' ] );


//Risks and Issues
Route::post('risksandissues', ['middleware'=>'auth', 'uses' =>  'RiskAndIssueController@store'] );
Route::patch('risksandissues/{id}', ['middleware'=>'auth', 'uses' => 'RiskAndIssueController@update'] );
Route::get('risks/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'RiskAndIssueController@createRisk' ] );
Route::get('risks/{id}/edit', ['middleware'=>'auth', 'uses' => 'RiskAndIssueController@editRisk'] );
Route::get('risks', ['middleware'=>'auth', 'uses' => 'RiskAndIssueController@indexall'] );
Route::get('risks/{id}', ['middleware'=>'auth', 'uses' => 'RiskAndIssueController@show'] );
Route::get('risks/index/{subjecttype}/{subjectid}', ['middleware'=>'auth', 'uses' => 'RiskAndIssueController@index'] );

//comments
Route::post('comments', ['middleware'=>'auth', 'uses' =>  'CommentController@store'] );
Route::delete('comments/{id}', ['middleware'=>'auth', 'uses' =>  'CommentController@destroy'] );
Route::post('AjaxComments', [ 'middleware'=>'auth', 'uses' =>  'CommentController@AjaxStore'] );

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
Route::get('actions/index/{subjecttype}/{subjectid}', ['middleware'=>'auth', 'uses' => 'ActionController@index'] );
Route::get('actions', ['middleware'=>'auth', 'uses' => 'ActionController@indexall'] );
Route::get('actions/{id}', [ 'middleware'=>'auth', 'uses' => 'ActionController@show'] );
Route::post('actions', ['middleware'=>'auth', 'uses' =>  'ActionController@store'] );
Route::patch('actions/{id}', ['middleware'=>'auth', 'uses' => 'ActionController@update'] );
Route::delete('actions/{id}', ['middleware'=>'auth', 'uses' =>  'ActionController@destroy'] );

//Assumptions
Route::get('assumptions/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'AssumptionController@create' ] );
Route::get('assumptions/{id}/edit', ['middleware'=>'auth', 'uses' => 'AssumptionController@edit'] );
Route::get('assumptions/index/{subjecttype}/{subjectid}', ['middleware'=>'auth', 'uses' => 'AssumptionController@index'] );
Route::get('assumptions', ['middleware'=>'auth', 'uses' => 'AssumptionController@indexall'] );
Route::get('assumptions/{id}', [ 'middleware'=>'auth', 'uses' => 'AssumptionController@show'] );
Route::post('assumptions', ['middleware'=>'auth', 'uses' =>  'AssumptionController@store'] );
Route::patch('assumptions/{id}', ['middleware'=>'auth', 'uses' => 'AssumptionController@update'] );
Route::delete('assumptions/{id}', ['middleware'=>'auth', 'uses' =>  'AssumptionController@destroy'] );

//Decisions
Route::get('decisions/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'DecisionController@create' ] );
Route::get('decisions/{id}/edit', ['middleware'=>'auth', 'uses' => 'DecisionController@edit'] );
Route::get('decisions/index/{subjecttype}/{subjectid}', ['middleware'=>'auth', 'uses' => 'DecisionController@index'] );
Route::get('decisions', ['middleware'=>'auth', 'uses' => 'DecisionController@indexall'] );
Route::get('decisions/{id}', ['middleware'=>'auth',  'uses' => 'DecisionController@show'] );
Route::post('decisions', ['middleware'=>'auth', 'uses' =>  'DecisionController@store'] );
Route::patch('decisions/{id}', ['middleware'=>'auth', 'uses' => 'DecisionController@update'] );
Route::delete('decisions/{id}', ['middleware'=>'auth', 'uses' =>  'DecisionController@destroy'] );

//Meetings
Route::get('meetings/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'MeetingController@create' ] );
Route::get('meetings/{id}/edit', ['middleware'=>'auth', 'uses' => 'MeetingController@edit'] );
Route::get('meetings/index/{subjecttype}/{subjectid}', ['middleware'=>'auth', 'uses' => 'MeetingController@index'] );
Route::get('meetings', ['middleware'=>'auth', 'uses' => 'MeetingController@indexall'] );
Route::get('meetings/{id}', [ 'middleware'=>'auth', 'uses' => 'MeetingController@show'] );
Route::post('meetings', ['middleware'=>'auth', 'uses' =>  'MeetingController@store'] );
Route::patch('meetings/{id}', ['middleware'=>'auth', 'uses' => 'MeetingController@update'] );
Route::delete('meetings/{id}', ['middleware'=>'auth', 'uses' =>  'MeetingController@destroy'] );

//Members
Route::get('members/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'MemberController@createMember' ] );
Route::get('members/{id}/edit', ['middleware'=>'auth', 'uses' => 'MemberController@editMember'] );
Route::get('members/index/{subjecttype}/{subjectid}', ['middleware'=>'auth', 'uses' => 'MemberController@indexMember'] );
Route::get('members/{id}', [ 'middleware'=>'auth', 'uses' => 'MemberController@show'] );
Route::post('members', ['middleware'=>'auth', 'uses' =>  'MemberController@store'] );
Route::patch('members/{id}', ['middleware'=>'auth', 'uses' => 'MemberController@update'] );

//RAGs
Route::get('rags/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'RagController@create' ] );
Route::get('rags/{id}/edit', ['middleware'=>'auth', 'uses' => 'RagController@edit'] );
Route::get('rags/index/{subjecttype}/{subjectid}', ['middleware'=>'auth', 'uses' => 'RagController@index'] );
Route::get('rags/{id}', [ 'middleware'=>'auth', 'uses' => 'RagController@show'] );
Route::post('rags', ['middleware'=>'auth', 'uses' =>  'RagController@store'] );
Route::patch('rags/{id}', ['middleware'=>'auth', 'uses' => 'RagController@update'] );

//Tasks
Route::post('tasks', ['middleware'=>'auth', 'uses' =>  'TaskController@store'] );
Route::patch('tasks/{id}', ['middleware'=>'auth', 'uses' => 'TaskController@update'] );
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/tasks',[ 'middleware'=>'auth', 'uses' => 'TaskController@indexWorkstreamTask' ] );
Route::get('programs/{ProgramID}/workstreams/{WorkstreamID}/projects/{ProjectID}/tasks',[ 'middleware'=>'auth', 'uses' => 'TaskController@indexProjectTask' ] );
Route::get('tasks/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'TaskController@createTask' ] );
Route::get('tasks/{id}/edit', ['middleware'=>'auth', 'uses' => 'TaskController@editTask'] );
Route::get('tasks', ['middleware'=>'auth', 'uses' => 'TaskController@indexall'] );
Route::get('tasks/index/{subjecttype}/{subjectid}', ['middleware'=>'auth', 'uses' => 'TaskController@indexTask'] );
Route::get('tasks/{id}', ['middleware'=>'auth', 'uses' => 'TaskController@show'] );

//Dependencies
Route::get('dependencies/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'DependencyController@create' ] );
Route::get('dependencies/{id}/edit', ['middleware'=>'auth', 'uses' => 'DependencyController@edit'] );
Route::get('dependencies/index/{subjecttype}/{subjectid}', ['middleware'=>'auth', 'uses' => 'DependencyController@index'] );
Route::get('dependencies/{id}', [ 'middleware'=>'auth', 'uses' => 'DependencyController@show'] );
Route::get('dependencies', [ 'middleware'=>'auth', 'uses' => 'DependencyController@indexall'] );
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

//Links
Route::get('links/create/{subjecttype}/{subjectid}',['middleware'=>'auth', 'uses' => 'LinkController@create' ] );
Route::get('links/{id}/edit', ['middleware'=>'auth', 'uses' => 'LinkController@edit'] );
Route::get('links/index/{subjecttype}/{subjectid}', ['uses' => 'LinkController@index'] );
Route::get('links/{id}', [ 'uses' => 'LinkController@show'] );
Route::post('links', ['middleware'=>'auth', 'uses' =>  'LinkController@store'] );
Route::patch('links/{id}', ['middleware'=>'auth', 'uses' => 'LinkController@update'] );
Route::delete('links/{id}', ['middleware'=>'auth', 'uses' =>  'LinkController@destroy'] );

//API
Route::get('api/getUsers', 'ApiController@getUsers');
Route::get('api/getDependentLookup', 'ApiController@getDependentLookup');
Route::get('api/project/getExtendedAttributes', 'ApiController@getProjectExtendedAttributes');
Route::get('api/project/AjaxParseFile', 'ProjectController@AjaxParseFile');
Route::post('api/setbodyclass', 'ApiController@setBodyClass');

//Debug
Route::get('debug/logfiles', 'DebugController@logfiles');
Route::post('debug/deletelaravellog', 'DebugController@deletelaravellog');



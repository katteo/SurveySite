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



// Authentication routes...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Admin\UserController@postRegister');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'Main\MainController@index');
    Route::get('/issues/{issue_id}', 'Main\MainController@show');
    Route::post('/issues/save/response', 'Admin\IssueController@saveResponse');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {
    
    get('/', 'AdminController@index');

    Route::group(['prefix' => 'issues'], function() {
        get('/', 'IssueController@showList');
        get('/add', 'IssueController@create');
        get('/status/{issue_status}', 'IssueController@showListByStatus'); 
        get('/{issue_id}', 'IssueController@show');
        post('/store', 'IssueController@store');
        post('/update/{issue_id}', 'IssueCOntroller@update');
        
    });

    Route::group(['prefix' => 'questions'], function() {
        Route::post('/add', 'QuestionController@store');
    });
    
    Route::group(['prefix' => 'users', 'middleware' => 'auth.admin'], function() {
        get('/', 'UserController@showList');
        get('/add', 'UserController@create');
        post('/store', 'UserController@store');
        get('/type/{user_role}', 'UserController@showListByRole');
        get('{user_id}', 'UserController@show');
    });
  
});
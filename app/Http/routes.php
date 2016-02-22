<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Home Route
Route::get('/', 'HomeController@getIndex');

// Projects Routes
Route::get('projects', 'ProjectsController@getProjectsIndex');
Route::get('projects/{slug}', 'ProjectController@getProject');

// Admin Routes
Route::group(['prefix' => 'admin'], function() {
	Route::get('/', 'AdminController@getAdminIndex');

	Route::get('projects', 'AdminController@getProjectsIndex');
	Route::get('projects/{slug}', 'AdminController@getProject');
	Route::post('projects/{slug}', 'AdminController@postProject');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

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
Route::group(['prefix' => 'projects'], function() {
	Route::get('/', 'ProjectsController@getProjectsIndex');
	Route::get('{slug}', 'ProjectController@getProject');
});

// Pages Route
Route::group(['prefix' => 'page'], function() {
	Route::group(['prefix' => 'videos'], function() {
		Route::get('/', 'PagesController@getVideosIndex');
		Route::get('{slug}', 'PagesController@getVideo');
	});
	
	Route::get('contact', 'PagesController@getContactPage');
	Route::post('contact', 'PagesController@postContactPage');
});

Route::group(['prefix' => 'account'], function() {
	Route::get('/', 'AccountController@getAccountIndex');

	Route::get('settings', 'AccountController@getAccountSettings');
	Route::post('settings', 'AccountController@postAccountSettings');

	Route::get('orders', 'AccountController@getOrders');

	// there are more... I cant think of them at the moment
});

// Admin Routes
Route::group(['prefix' => 'admin'], function() {
	Route::get('/', 'AdminController@getAdminIndex');

	Route::get('projects', 'AdminController@getProjectsIndex');
	Route::get('projects/{slug}', 'AdminController@getProject');
	Route::post('projects/{slug}', 'AdminController@postProject');

	Route::get('videos', 'AdminController@getVideosIndex');
	Route::get('videos/{slug}', 'AdminController@getVideo');
	Route::post('videos/{slug}', 'AdminController@postVideo');

	// there are more... I cant think of them at the moment
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

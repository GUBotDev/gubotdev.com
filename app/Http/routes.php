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
Route::get('/', ['uses' => 'HomeController@getIndex', 'as' => 'home']);



// Page Routes
Route::group(['prefix' => 'page'], function() {

	// Project Routes
	Route::group(['prefix' => 'projects'], function() {

		Route::get('/', 'PagesController@getProjectsIndex');
		Route::get('{slug}', 'PagesController@getProject');

	});

	// Videos Routes
	Route::group(['prefix' => 'videos'], function() {
		Route::get('/', 'PagesController@getVideosIndex');
		Route::get('{slug}', 'PagesController@getVideo');
	});
	
	Route::get('contact', 'PagesController@getContactPage');
	Route::post('contact', 'PagesController@postContactPage');

});

// Account Routes
Route::group(['prefix' => 'account', 'middleware' => 'auth'], function() {

	Route::get('/', 'AccountController@getAccountIndex');

	Route::get('settings', 'AccountController@getAccountSettings');
	Route::post('settings', 'AccountController@postAccountSettings');

	Route::get('orders', 'AccountController@getOrdersIndex');
	Route::get('orders/{slug}', 'AccountController@getOrder');
	Route::get('orders/{slug}', 'AccountController@postOrder');

});

// Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'admin']], function() {

	Route::get('/', 'AdminController@getAdminIndex');

	Route::get('projects', 'AdminController@getProjectsIndex');
	Route::get('projects/{slug}', 'AdminController@getProject');
	Route::post('projects/{slug}', 'AdminController@postProject');

	Route::get('orders', 'AccountController@getOrdersIndex');
	Route::get('orders/{slug}', 'AccountController@getOrder');
	Route::get('orders/{slug}', 'AccountController@postOrder');

	Route::get('videos', 'AdminController@getVideosIndex');
	Route::get('videos/{slug}', 'AdminController@getVideo');
	Route::post('videos/{slug}', 'AdminController@postVideo');

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

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

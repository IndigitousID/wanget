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

// ------------------------------------------------------------------------------------
// LOGIN PAGE
// ------------------------------------------------------------------------------------
Route::group(['prefix' => 'cms', 'namespace' => 'CMS\\'], function()
{
	Route::post('/login',												['uses' => 'AuthController@postLogin', 	'as' => 'cms.login.post']);
});

// ------------------------------------------------------------------------------------
// CMS
// ------------------------------------------------------------------------------------
Route::group(['prefix' => 'cms', 'namespace' => 'CMS\\', 'middleware' => ['auth', 'cms']], function()
{
	// ------------------------------------------------------------------------------------
	// LOGOUT
	// ------------------------------------------------------------------------------------
	Route::get('/logout',											['uses' => 'AuthController@getLogout', 'as' => 'cms.logout.get']);
	
	// ------------------------------------------------------------------------------------
	// ME
	// ------------------------------------------------------------------------------------
	Route::resource('profile',  		'ProfileController',		['names' => ['index' => 'cms.profile.index', 'create' => 'cms.profile.create', 'store' => 'cms.profile.store', 'show' => 'cms.profile.show', 'edit' => 'cms.profile.edit', 'update' => 'cms.profile.update', 'destroy' => 'cms.profile.destroy']]);
	Route::resource('password',  		'PasswordController',		['names' => ['index' => 'cms.password.index', 'create' => 'cms.password.create', 'store' => 'cms.password.store', 'show' => 'cms.password.show', 'edit' => 'cms.password.edit', 'update' => 'cms.password.update', 'destroy' => 'cms.password.destroy']]);

	// ------------------------------------------------------------------------------------
	// DASHBOARD
	// ------------------------------------------------------------------------------------
	Route::get('/dashboard',										['uses' => 'DashboardController@index', 'as' => 'cms.dashboard.index']);
	
	// ------------------------------------------------------------------------------------
	// ARTICLE
	// ------------------------------------------------------------------------------------
	Route::resource('articles',  	'ArticleController',			['names' => ['index' => 'cms.articles.index', 'create' => 'cms.articles.create', 'store' => 'cms.articles.store', 'show' => 'cms.articles.show', 'edit' => 'cms.articles.edit', 'update' => 'cms.articles.update', 'destroy' => 'cms.articles.destroy']]);

	// ------------------------------------------------------------------------------------
	// CATEGORY
	// ------------------------------------------------------------------------------------
	Route::resource('categories',  	'CategoryController',			['names' => ['index' => 'cms.categories.index', 'create' => 'cms.categories.create', 'store' => 'cms.categories.store', 'show' => 'cms.categories.show', 'edit' => 'cms.categories.edit', 'update' => 'cms.categories.update', 'destroy' => 'cms.categories.destroy']]);

	// ------------------------------------------------------------------------------------
	// TAG
	// ------------------------------------------------------------------------------------
	Route::resource('tags',  		'TagController',				['names' => ['index' => 'cms.tags.index', 'create' => 'cms.tags.create', 'store' => 'cms.tags.store', 'show' => 'cms.tags.show', 'edit' => 'cms.tags.edit', 'update' => 'cms.tags.update', 'destroy' => 'cms.tags.destroy']]);

	// ------------------------------------------------------------------------------------
	// COMMENT
	// ------------------------------------------------------------------------------------
	Route::resource('comments',  	'CommentController',			['names' => ['index' => 'cms.comments.index', 'create' => 'cms.comments.create', 'store' => 'cms.comments.store', 'show' => 'cms.comments.show', 'edit' => 'cms.comments.edit', 'update' => 'cms.comments.update', 'destroy' => 'cms.comments.destroy']]);

	// ------------------------------------------------------------------------------------
	// USER
	// ------------------------------------------------------------------------------------
	Route::resource('guests',  		'GuestController',				['names' => ['index' => 'cms.guests.index', 'create' => 'cms.guests.create', 'store' => 'cms.guests.store', 'show' => 'cms.guests.show', 'edit' => 'cms.guests.edit', 'update' => 'cms.guests.update', 'destroy' => 'cms.guests.destroy']]);

	// ------------------------------------------------------------------------------------
	// AJAX
	// ------------------------------------------------------------------------------------
	Route::get('/category/by/name',									['uses' => 'CategoryController@ajaxName', 'as' => 'ajax.category.index']);
	Route::get('/tag/by/name',										['uses' => 'TagController@ajaxName', 'as' => 'ajax.tag.index']);
});


// ------------------------------------------------------------------------------------
// WEB
// ------------------------------------------------------------------------------------
Route::group(['prefix' => 'web', 'namespace' => 'Onegate\\'], function()
{
	// ------------------------------------------------------------------------------------
	// HOME
	// ------------------------------------------------------------------------------------
	Route::get('/home',												['uses' => 'HomeController@index', 	'as' => 'onegate.home.index']);

	// ------------------------------------------------------------------------------------
	// BLOG
	// ------------------------------------------------------------------------------------
	Route::get('/blogs',											['uses' => 'BlogController@index', 	'as' => 'onegate.blogs.index']);
	Route::get('/blog/{slug}',										['uses' => 'BlogController@show', 	'as' => 'onegate.blogs.show']);
	
	Route::post('/blog/{slug}/comments',							['uses' => 'CommentController@store', 	'as' => 'onegate.comments.store']);

	// ------------------------------------------------------------------------------------
	// CONTACT
	// ------------------------------------------------------------------------------------
	Route::get('/contacts',											['uses' => 'ContactController@index', 	'as' => 'onegate.contacts.index']);
	Route::post('/contacts',										['uses' => 'ContactController@store', 	'as' => 'onegate.contacts.store']);
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

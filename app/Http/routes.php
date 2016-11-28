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

// Route::get('/', function () {
// 	return Redirect::route('dashboard');
// });
Route::get('/', ['as'=>'index','uses' => 'FrontendController@index']);
Route::get('home', ['as'=>'home','uses' => 'FrontendController@home']);

Route::group(['middleware' => 'guest'], function(){

	Route::get('login', ['as'=>'login','uses' => 'Auth\AuthController@login']);
	Route::post('login', ['as'=> 'postlogin','uses' => 'Auth\AuthController@doLogin']);

	Route::get('register', ['as'=>'register','uses' => 'UserController@create']);
	Route::post('register', ['as'=>'postRegister','uses' => 'UserController@store']);
	
	// Password reset link request routes...
	Route::get('password/email', ['as' => 'passwordRequest','uses' => 'Auth\PasswordController@getEmail']);
	Route::post('password/email', ['as' => 'postPasswordRequest', 'uses' => 'Auth\PasswordController@postEmail']);
	// Password reset routes...
	Route::get('password/reset/{token}', ['as' => 'getReset', 'uses' =>'Auth\PasswordController@getReset']);
	Route::post('password/reset', ['as' => 'postReset', 'uses' => 'Auth\PasswordController@postReset']);

	// social login route
	Route::get('login/fb', ['as'=>'login/fb','uses' => 'SocialController@loginWithFacebook']);
	Route::get('login/gp', ['as'=>'login/gp','uses' => 'SocialController@loginWithGoogle']);

});

Route::group(array('middleware' => 'auth'), function()
{
	Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
	Route::get('profile', ['as' => 'profile', 'uses' => 'UserController@profile']);
	// Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'Auth\AuthController@dashboard'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'Auth\AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'Auth\AuthController@doChangePassword'));

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function()
{
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'Auth\AuthController@dashboard'));

	// Demo CRUD
	Route::get('demo',['as' => 'demo.index', 'uses' => 'DemoController@index']);
	Route::get('demo/create',['as' => 'demo.create', 'uses' => 'DemoController@create']);
	Route::post('demo',['as' => 'demo.store', 'uses' => 'DemoController@store']);
	Route::get('demo/{id}/edit',['as' => 'demo.edit', 'uses' => 'DemoController@edit']);
	Route::get('demo/{id}/show',['as' => 'demo.show', 'uses' => 'DemoController@show']);
	Route::put('demo/{id}',['as' => 'demo.update', 'uses' => 'DemoController@update']);
	Route::get('demo/delete/{id}',['as' => 'demo.delete', 'uses' => 'DemoController@destroy']);

	// Category CRUD
	Route::get('category',['as' => 'category.index', 'uses' => 'CategoryController@index']);
	Route::get('category/create',['as' => 'category.create', 'uses' => 'CategoryController@create']);
	Route::post('category',['as' => 'category.store', 'uses' => 'CategoryController@store']);
	Route::get('category/{id}/edit',['as' => 'category.edit', 'uses' => 'CategoryController@edit']);
	Route::get('category/{id}/show',['as' => 'category.show', 'uses' => 'CategoryController@show']);
	Route::put('category/{id}',['as' => 'category.update', 'uses' => 'CategoryController@update']);
	Route::delete('category/{id}',['as' => 'category.delete', 'uses' => 'CategoryController@destroy']);

});

/* // Language CRUD
	Route::get('language',['as' => 'language.index', 'uses' => 'LanguageController@index']);
	Route::get('language/create',['as' => 'language.create', 'uses' => 'LanguageController@create']);
	Route::post('language',['as' => 'language.store', 'uses' => 'LanguageController@store']);
	Route::get('language/{id}/edit',['as' => 'language.edit', 'uses' => 'LanguageController@edit']);
	Route::get('language/{id}/show',['as' => 'language.show', 'uses' => 'LanguageController@show']);
	Route::put('language/{id}',['as' => 'language.update', 'uses' => 'LanguageController@update']);
	Route::delete('language/{id}',['as' => 'language.delete', 'uses' => 'LanguageController@destroy']);

*/

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

Route::get('/', function () {
  // from welcome to index
  // doesn't have to be index.blade.php
  // can be index.php
  return view('index');
});

// Route::group, static method?
// Route::group, apply something to its group memeber
// prefix means /api/authenticate url
Route::group(['prefix' => 'api'], function()
{
  // route::resource is the RESTFUL
  // so authenticate
  // authenticate/create
  // authenticate/{something}/edit
  // etc
  // Here we only use AuthenticateController's index
  
  // /authenticate/index, AuthenticateController's index to handle
	Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);

  // post to /authenticate, AuthenticateController's authenticate to handle
	Route::post('authenticate', 'AuthenticateController@authenticate');
});

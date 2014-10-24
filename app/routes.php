<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
] );

Route::get('/info', function()
{
	return View::make('info');
});

Route::get('/users', function()
{
	$user = DB::table('users')->find(2);
    return $user->username;
});

/*
 * Registration!
 */
Route::get ('register', [
            'as' => 'register_path',
            'uses' => 'RegistrationController@create'
            ]
);

Route::post ('register', [
            'as' => 'register_path',
            'uses' => 'RegistrationController@store'
            ]
);


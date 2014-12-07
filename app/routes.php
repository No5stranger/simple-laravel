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

Route::pattern('id', '[0-9]+');

Route::filter('old', function()
    {
        if (Input::get('age') < 20)
        {
            return "Can't pass filter";
        }
    });

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('hello', 'HomeController@showWelcome');

Route::post('post', function()
    {
        return 'This is a post method';
    });

Route::match(array('GET', "POST"), 'match', function()
    {
        return 'This router match GET and POST method';
    });

Route::get('id/{id}', function($id)
    {
        return 'Hello ' . $id;
    });

Route::get('user/{name?}', function($name = 'cjp')
    {
        return 'Hello ' . $name;
    })
    ->where('name', '[a-zA-Z]+');

Route::get('age', array('before' => 'old', function()
        {
            return 'You are too old';
        }));

Route::get('/routed/named', array('as' => 'named', function()
        {
            return 'this routes has a alias name';
        }));

Route::group(array('before' => 'old'), function()
        {
            Route::get('/a', function()
            {
            });

            Route::get('/b', function()
            {
            });
        });

Route::get('auth', 'HomeController@authTest');

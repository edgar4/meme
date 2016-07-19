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

Route::get('/', [
    'uses' => 'MemeController@index',
    'as' => 'meme_index',
]);


Route::group(
    ['prefix' => 'meme',

    ],
    function () {
        Route::get('/show', [
            'uses' => 'MemeController@show',
            'as' => 'meme_show',
        ]);
        Route::post('/make', 'MemeController@makeMeme');

    });

Route::auth();

Route::get('/info', 'MemeController@info');

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

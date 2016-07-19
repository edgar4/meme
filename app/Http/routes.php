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
            'uses' => 'AdminController@show',
            'as' => 'meme_show',
        ]);
        Route::post('/make', 'CategorysController@makeMeme');

    });

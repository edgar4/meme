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
    'uses' => 'FrontController@index',
    'as' => 'meme_index',
]);


Route::group(['prefix' => 'memes'],function () {

	// Routes for creating new meme
    Route::get('/new', ['uses' => 'FrontController@createMeme', 'as' => 'get_new_meme']);

    Route::post('/new', ['uses' => 'MemeController@createMeme', 'as' => 'post_new_meme']);


    // Routes for retrieving memes
    Route::get('/{id}', [ 'uses' => 'MemeController@singleMeme', 'as' => 'get_single_meme' ]);



    Route::get('/show', [
        'uses' => 'MemeController@show',
        'as' => 'meme_show',
    ]);

    

});

Route::auth();

Route::get('/info', 'MemeController@info');


Route::get('auth/via/{platform}', [ 'uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'auth_login_via' ]);
Route::get('auth/{platform}/callback', [ 'uses' => 'Auth\AuthController@handleProviderCallback', 'as' => 'auth_login_via_platform_callback' ]);



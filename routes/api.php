<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/api/user', function (Request $request) {
    return $request->user();
});

JsonApi::register('default', ['namespace' => 'Api', 'id' => '[\d]+'], function ($api, $router) {
    $api->resource('users', [
        'controller' => 'UserController',
        'has-many' => 'stories',

    ]);

    $api->resource('stories', [
        'controller' => 'StoryController',
        'has-one' => 'user',
        'has-many' => 'characters',

    ]);

    $api->resource('characters', [
        'controller' => 'CharacterController',
        'has-one' => 'story'
    ]);
});

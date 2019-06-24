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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'Api'], function () {
    Route::get('posts/show/all', array(
        'as' => 'posts-show_all', 
        'uses' => 'PostController@index'
    ), function () {
        return redirect()->action('PostController@index');
    });

    Route::get('posts/show/{id}', array(
        'as' => 'posts-show_byId', 
        'uses' => 'PostController@show'
    ), function ($id) {
        return redirect()->action('PostController@show');
    });
});

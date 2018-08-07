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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('genres', 'Api\GenresController@index');
Route::get('genres/{slug}', 'Api\GenresController@moviesBySlug');
Route::get('movies', 'Api\MovieController@index');
Route::get('movies/{slug}', 'Api\MovieController@show');
Route::get('seriales', 'Api\SerialeController@index');
Route::get('seriales/{seriale}', 'Api\SerialeController@show');
Route::get('seriales/{seriale}/season/{id}', 'Api\SerialeController@showSeason');
Route::get('seriales/{seriale}/season/{season}/episode/{episode}', 'Api\SerialeController@showEpisode');

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
Route::get('series', 'Api\SerieController@index');
Route::get('series/{serie}', 'Api\SerieController@show');
Route::get('series/{serie}/season/{season}', 'Api\SerieController@showSeason');
Route::get('series/{serie}/season/{season}/episode/{episode}', 'Api\SerieController@showEpisode');

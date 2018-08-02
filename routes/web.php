<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin'
], function () {
    Route::get('/', function() {
        return view('admin.index');
    })->name('admin.index');
    Route::resource('genre', 'Admin\GenreController');
    Route::resource('movie', 'Admin\MovieController');
    Route::resource('seriale', 'Admin\SerialeController');
    Route::resource('seriale/{seriale}/sezone', 'Admin\SezoneController');
    Route::resource('seriale/{seriale}/sezone/{sezone}/episode', 'Admin\EpisodeController');
    Route::post('movie/{id}/embeds', 'Admin\MovieController@addEmbed');
    Route::post('movie/{id}/shikolinks', 'Admin\MovieController@addShikolinks');
    Route::post('movie/{id}/shkarkolinks', 'Admin\MovieController@addShkarkolinks');
    Route::post('movie/{id}/trailerlinks', 'Admin\MovieController@addTrailerlinks');
    Route::post('seriale/{seriale}/sezone/{sezone}/episode/{id}/embeds', 'Admin\EpisodeController@addEmbed');
    Route::post('seriale/{seriale}/sezone/{sezone}/episode/{id}/shikolinks', 'Admin\EpisodeController@addShikolinks');
    Route::post('seriale/{seriale}/sezone/{sezone}/episode/{id}/shkarkolinks', 'Admin\EpisodeController@addShkarkolinks');
    Route::post('seriale/{seriale}/sezone/{sezone}/episode/{id}/trailerlinks', 'Admin\EpisodeController@addTrailerlinks');
});
Route::delete('/embeds/{id}', 'Admin\EmbedController@destroy');
Route::delete('/shikolinks/{id}', 'Admin\ShikolinkController@destroy');
Route::delete('/shkarkolinks/{id}', 'Admin\ShkarkolinkController@destroy');
Route::delete('/trailerlinks/{id}', 'Admin\TrailerlinkController@destroy');

Route::group(['middleware' => 'guest'], function (){
    Route::get('/', 'Show\HomepageController@index')->name('homepage');
    Route::get('/genre/{slug}', 'Show\MovieController@ShowByGenreSlug')->name('genre.bySlug');
    Route::get('/seriales', 'Show\SerialeController@index')->name('seriales.index');
});
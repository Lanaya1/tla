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
Auth::routes();
Route::post('deconnexion', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');

Route::get('anime/id={id}', 'AnimeController@search')->name('anime.search');

// Admin
Route::middleware(['auth'])->group(function() {
    Route::get('admin/', 'AdminController@home')->name('admin.home');
    Route::get('admin/anime/{id}', 'AdminController@anime')->name('admin.anime');
    Route::post('admin/search', 'AnimeController@search')->name('admin.search');
    Route::post('episode/create', 'EpisodeController@create')->name('episode.create');
});
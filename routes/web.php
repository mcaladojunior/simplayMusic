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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/artists', 'ArtistController@index')->name('artists.index');
Route::get('/artists/create', 'ArtistController@create')->name('artists.create');
Route::post('/artists', 'ArtistController@store')->name('artists.store');
Route::get('/artists/{artist}', 'ArtistController@show')->name('artists.show');
Route::get('/artists/{artist}/edit', 'ArtistController@edit')->name('artists.edit');
Route::put('/artists/update', 'ArtistController@update')->name('artists.update');
Route::delete('/artists/delete', 'ArtistController@destroy')->name('artists.destroy');

Route::get('/artists/{artist}/albums', 'ArtistController@albums')->name('artists.albums');

Route::get('/albums', 'AlbumController@index')->name('albums.index');
Route::get('/albums/create', 'AlbumController@create')->name('albums.create');
Route::post('/albums', 'AlbumController@store')->name('albums.store');
Route::get('/albums/{album}', 'AlbumController@show')->name('albums.show');
Route::get('/albums/{album}/edit', 'AlbumController@edit')->name('albums.edit');
Route::put('/albums/update', 'AlbumController@update')->name('albums.update');
Route::delete('/albums/delete', 'AlbumController@destroy')->name('albums.destroy');

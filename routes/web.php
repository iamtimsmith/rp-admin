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

Route::get('/', 'PagesController@home')->name('site-home');
Route::get('/about', 'PagesController@about');
Route::get('/monsters', 'MonstersController@index');
Route::get('/spells', 'SpellsController@index');
Route::get('/notes', 'NotesController@index');
Route::get('/locations', 'LocationsController@index');
Route::get('/party', 'PartyController@index');
Route::get('/npcs', 'NpcsController@index');
Route::get('/encounters', 'EncountersController@index');

Route::resource('monsters', 'MonstersController');
Route::resource('spells', 'SpellsController');
Route::resource('notes', 'NotesController');
Route::resource('locations', 'LocationsController');
Route::resource('party', 'PartyController');
Route::resource('npcs', 'NpcsController');
Route::resource('encounters', 'EncountersController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/license', 'PagesController@license');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/documentation', 'PagesController@documentation');

// Named Routes
Route::get('/locations/{id}', 'LocationsController@show')->name('location');
Route::get('/notes/{id}', 'NotesController@show')->name('note');
Route::get('/party/{id}', 'PartyController@show')->name('character');
Route::get('/npcs/{id}', 'NpcsController@show')->name('npc');
Route::get('/encounters/{id}', 'EncounterController@show')->name('encounter');

Route::get('/settings/{user}', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::get('/settings/{user}/delete', 'UserController@deleteaccount' );
Route::get('/account-deleted', 'PagesController@deleted')->name('deleted');
Route::patch('/settings/{user}/update', ['as' => 'users.update', 'uses' => 'UserController@update']);
Route::patch('/settings/{user}/destroy', ['as' => 'users.destroy', 'uses' => 'UserController@destroy']);
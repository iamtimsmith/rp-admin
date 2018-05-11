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

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/monsters', 'MonstersController@index');
Route::get('/spells', 'SpellsController@index');
Route::get('/notes', 'NotesController@index');
Route::get('/locations', 'LocationsController@index');

Route::resource('monsters', 'MonstersController');
Route::resource('spells', 'SpellsController');
Route::resource('notes', 'NotesController');
Route::resource('locations', 'LocationsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/logout', 'Auth\LoginController@logout');

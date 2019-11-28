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

// USER /////////////////////////////////////////////////////////////////////////////////////
Route::resource('user', 'UserController');

// MOVIE /////////////////////////////////////////////////////////////////////////////////////
Route::resource('movie','MovieController');
Route::get('movie/year/{year}', 'MovieController@lookForYear')->name('movie.year');


// PERSON /////////////////////////////////////////////////////////////////////////////////////
Route::resource('person','PersonController');

// GENRE /////////////////////////////////////////////////////////////////////////////////////
Route::resource('genre','GenreController');

// AUTH /////////////////////////////////////////////////////////////////////////////////////
Route::get('logout', 'LoginController@logout')->name('logout');
Auth::routes();

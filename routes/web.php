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
/*
Route::get('users', 'UserController@index')->name('user.index');
Route::get('user/create', 'UserController@create')->name('user.create');
Route::post('user/store', 'UserController@store')->name('user.store');
Route::get('user/{id}', 'UserController@show')->name('user.show');
Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit');
Route::patch('user/{id}', 'UserController@update')->name('user.update');
Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');
*/

Route::resource('user', 'UserController');

// MOVIE /////////////////////////////////////////////////////////////////////////////////////
/*
Route::get('movies', 'MovieController@index')->name('movie.index');
Route::get('movie/create', 'MovieController@create')->name('movie.create');
Route::post('movie/store', 'MovieController@store')->name('movie.store');
Route::get('movie/{id}', 'MovieController@show')->name('movie.show');
Route::get('movie/{id}/edit', 'MovieController@edit')->name('movie.edit');
Route::patch('movie/{id}', 'MovieController@update')->name('movie.update');
Route::delete('movie/{id}', 'MovieController@destroy')->name('movie.destroy');
*/
Route::resource('movie','MovieController');


// PERSON /////////////////////////////////////////////////////////////////////////////////////
/*
Route::get('people', 'PersonController@index')->name('person.index');
Route::get('person/create', 'PersonController@create')->name('person.create');
Route::post('person/store', 'PersonController@store')->name('person.store');
Route::get('person/{id}', 'PersonController@show')->name('person.show');
Route::get('person/{id}/edit', 'PersonController@edit')->name('person.edit');
Route::patch('person/{id}', 'PersonController@update')->name('person.update');
Route::delete('person/{id}', 'PersonController@destroy')->name('person.destroy');
*/
Route::resource('person','PersonController');

// GENRE /////////////////////////////////////////////////////////////////////////////////////
Route::get('genres', 'GenreController@index')->name('genre.index');
Route::get('genre/create', 'GenreController@create')->name('genre.create');
Route::post('genre/store', 'GenreController@store')->name('genre.store');
Route::get('genre/{id}', 'GenreController@show')->name('genre.show');
Route::get('genre/{id}/edit', 'GenreController@edit')->name('genre.edit');
Route::patch('genre/{id}', 'GenreController@update')->name('genre.update');
Route::delete('genre/{id}', 'GenreController@destroy')->name('genre.destroy');

Route::resource('genre','GenreController');

// AUTH /////////////////////////////////////////////////////////////////////////////////////
Route::get('logout', 'LoginController@logout')->name('logout');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('movies/list','MoviesController@index')->name('movieList');
Route::get('movies/add','MoviesController@addmovie')->name('addmovie');
Route::post('movies/add','MoviesController@store');
Route::get('movies/show/{id}','MoviesController@show')->name('show');
Route::get('movies/delete/{id}','MoviesController@delete')->name('delete');
Route::get('movies/edit/{id}','MoviesController@edit')->name('edit');
Route::post('movies/update/{id}','MoviesController@update')->name('update');






















//`Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

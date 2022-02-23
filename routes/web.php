<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('movies/list','MoviesController@index')->name('movieList');
Route::get('movies/add','MoviesController@addmovie')->name('addmovie');
Route::post('movies/add','MoviesController@store');






















//`Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

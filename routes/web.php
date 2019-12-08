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

Route::get('search', 'SearchController@index')->name('search');
Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/storeSurvivor', function () {
    return view('newSurvivor');
})->name('storeSurvivor'); 

Route::get('/reports', function () {
    return view('reports');
})->name('reportsPage'); 

Route::get('/tradeItems', function () {
    return view('trade');
})->name('tradeView');
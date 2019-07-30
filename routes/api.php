<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/survivors', 'SurvivorController@index')->name("home"); //lists all survivors
Route::get('/survivors/{id}', 'SurvivorController@show'); //lists an especific survivor
Route::get('/inventories', 'InventoryController@index'); //lists all inventories
Route::get('/reports/averageItems', 'SurvivorController@averageItems'); //reports average items per survivor
Route::get('/reports/percentage', 'SurvivorController@infectedPercentage'); //reports infection percentage
Route::get('/reports/lostPoints', 'SurvivorController@lostInventoryPoints'); //reports lost points due to infected survivors

Route::post('/survivors', 'SurvivorController@store')->name("store"); //stores new survivor and it's inventory
Route::post('/survivors/trade', 'SurvivorController@trade'); //trade items between survivors

Route::put('/survivors/{id}', 'SurvivorController@update'); //update an especific survivor
Route::put('/survivors/report/{id}', 'SurvivorController@reportAsInfected'); //report and especific survivor as infected
Route::put('/survivors/location/{id}', 'SurvivorController@updateLastLocation'); //update survivor's location


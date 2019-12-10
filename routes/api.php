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


Route::post('/survivors', 'SurvivorController@store')->name("store"); //stores new survivor and it's inventory
Route::post('/survivors/trade', 'SurvivorController@trade')->name("trade"); //trade items between survivors

Route::get('/survivors', 'SurvivorController@index')->name("survivors"); //lists all survivors
Route::get('/survivors/{id}', 'SurvivorController@show'); //lists an especific survivor
Route::get('/inventories', 'InventoryController@index'); //lists all inventories

Route::get('/reports/get', 'SurvivorController@calc')->name("genInfo"); //gets all averages and percentages to send them to view

Route::get('/reports/averageItems', 'SurvivorController@averageItems'); //reports average items per survivor
Route::get('/reports/percentage', 'SurvivorController@infectedPercentage'); //reports infection percentage
Route::get('/reports/lostPoints', 'SurvivorController@lostPoints'); //reports lost points due to infected survivors

Route::put('/survivors/report/', 'SurvivorController@report')->name("reportSurvivor"); //report an especific survivor as infected

Route::put('/survivors/update', 'SurvivorController@update')->name("update"); //update an especific survivor

Route::put('/survivors/updateLocation/', 'SurvivorController@updateLastLocation')->name("updateLocation"); //update survivor's location


<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/showstatus/{id?}','TaskController@statuallshow');
Route::post('/addstatus','TaskController@statusadd')->name('add.staus');
Route::post('/add-multi-status','TaskController@addmultistatus');
Route::put('/status-update/{id}','TaskController@updatestatus');

Route::delete('/delete-status/{id}','TaskController@deletestatus');
Route::delete('/delete-status-details','TaskController@deletedetailsstatus');

Route::delete('/delete-multi-status/{id}','TaskController@deletemultistatus');



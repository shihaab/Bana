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

Route::get('/rooms', 'App\Http\Controllers\RoomController@GetAll');

Route::get('/getroomitemsbyid/{id}', 'App\Http\Controllers\RoomController@GetItemsById');

Route::get('/createroom/{name}', 'App\Http\Controllers\RoomController@CreateRoom');

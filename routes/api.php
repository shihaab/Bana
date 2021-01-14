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

Route::get('/rooms/{key}', 'App\Http\Controllers\RoomController@GetAll');

Route::get('/getroomitemsbyid/{id}', 'App\Http\Controllers\RoomController@GetItemsById');

Route::get('/createroom/{name}', 'App\Http\Controllers\RoomController@CreateRoom');
Route::get('/deleteroom/{id}', 'App\Http\Controllers\RoomController@DeleteRoom');

Route::get('/createitem/{type}/{url}/{callout_id}/{name}/{room_id}', 'App\Http\Controllers\RoomController@CreateItem');
Route::get('/deleteitem/{id}', 'App\Http\Controllers\RoomController@DeleteItem');

Route::get('/createmember/{key}', 'App\Http\Controllers\HouseholdController@CreateMember');
Route::get('/logout', 'App\Http\Controllers\HouseholdController@Logout');

Route::get('/ring/{key}', 'App\Http\Controllers\HouseholdController@Ring');
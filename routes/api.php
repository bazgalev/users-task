<?php

use App\Http\Controllers\Api\UsersController;
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

//TODO: delete this route
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::namespace('Api')->group(function () {
    Route::resource('users', 'UsersController', ['except' => ['create', 'edit']]);
    Route::resource('cities', 'CitiesController', ['except' => ['create', 'edit']]);
});

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
| is assigned the "api/v1" middleware group. Enjoy building your API!
|
*/

Route::/*middleware('auth:api')->*/post('/users/login', function (Request $request) {
    return response()->json(["code"=>20000, "data" => [ "accessToken" => 'adflskfdajf-token']]);
});

//Route::apiResource('users', PhotoController::class);

<?php

use App\Models\User;
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

Route::get('/salaries', function () {
    $user = User::whereHas('roles')->get();
    return $user->toJson(JSON_PRETTY_PRINT);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

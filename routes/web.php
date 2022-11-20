<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

use Illuminate\Routing\RouteGroup;
use Illuminate\Routing\RouteUri;

Route::get('/', function () {
    if (Auth::check()) {
        return back();
    } else {
        return redirect('/login');
    }
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::controller(HomeController::class)->group(function () {
    // dashboard
    Route::get('/dashboard', 'index')->name('home');

    // pengganjian
    Route::get('/salary', 'salary')->name('view.salary');

    // management
    Route::get('/management/user', 'user')->name('view.user');
    Route::get('/management/role', 'role')->name('view.role');
    Route::get('/management/permission', 'permission')->name('view.permission');
});

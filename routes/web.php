<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Send\Message;
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

Route::get('/', [Message::class, 'form']);
Route::post('/', [Message::class, 'send']);

Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function () {
    Route::get('login', [Login::class, 'form'])->name('Auth_Login');
    Route::post('login', [Login::class, 'process']);
});

Route::get('/dashboard', [Dashboard::class, 'index'])->middleware('auth')->name('Dashboard');
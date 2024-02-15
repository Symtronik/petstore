<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetstoreApiController;
use App\Http\Controllers\OrderApiController;
use App\Http\Controllers\UserApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout');
});

Route::get('/pet', [PetstoreApiController::class, 'index']) -> name('components.pet');
Route::get('/order', [OrderApiController::class, 'index']) -> name('components.order');
Route::get('/user', [UserApiController::class, 'index']) -> name('components.user');


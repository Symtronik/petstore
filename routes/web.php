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



Route::get('/', [PetstoreApiController::class, 'index']) -> name('partials.pet');
Route::get('/pet/add', function () {return view('partials.petAdd');});
Route::post('/', [PetstoreApiController::class, 'add']) -> name('partials.pet.add');
Route::get('/pet/search', [PetstoreApiController::class, 'search']) -> name('partials.pet');
Route::delete('/pet/delete/{id}', [PetstoreApiController::class, 'delete']) -> name('partials.pet.delete');
Route::get('/order', [OrderApiController::class, 'index']) -> name('partials.order');
Route::get('/user', [UserApiController::class, 'index']) -> name('partials.user');


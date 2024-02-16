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



Route::get('/pet', [PetstoreApiController::class, 'index']) -> name('partials.pet');
Route::get('/pet/add', function () {return view('partials.petAdd');});
Route::post('/pet', [PetstoreApiController::class, 'add']) -> name('partials.pet.add');
Route::get('/pet/edit/{id}', [PetstoreApiController::class, 'edit']) -> name('partials.pet.edit');
Route::post('/pet/update', [PetstoreApiController::class, 'update']) -> name('partials.pet.update');
Route::get('/pet/search', [PetstoreApiController::class, 'search']) -> name('partials.pet.search');
Route::delete('/pet/delete/{id}', [PetstoreApiController::class, 'delete']) -> name('partials.pet.delete');
Route::get('/order', [OrderApiController::class, 'index']) -> name('partials.order');
Route::get('/user', [UserApiController::class, 'index']) -> name('partials.user');


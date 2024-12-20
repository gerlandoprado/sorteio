<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipanteController;

Route::get('/', [ParticipanteController::class, 'home'])->name('home');
Route::post('/', [ParticipanteController::class, 'store']);

Route::resource('participantes', ParticipanteController::class);
Route::get('sortear', [ParticipanteController::class, 'sortear'])->name('participantes.sortear');
Route::post('/store-update', [ParticipanteController::class, 'storeUpdate'])->name('store.update');


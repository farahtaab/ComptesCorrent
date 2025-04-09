<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/compte', [CompteController::class, 'crear']);
Route::post('/compte/{id}/ingressar', [CompteController::class, 'ingressar']);
Route::post('/compte/{id}/retirar', [CompteController::class, 'retirar']);
Route::post('/compte/{id}/transferir', [CompteController::class, 'transferir']);

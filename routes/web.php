<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\partidasController;
use App\Http\Controllers\timesController;

Route::get('/',[PageController::class,'home']);
Route::get('/partidas', [partidasController::class,'partidas']);
Route::get('/times', [timesController::class,'times']);

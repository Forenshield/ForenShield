<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class,'login']);

Route::get('data1/create',[APIController::class,'data1'])->middleware('auth:api');
Route::post('data2/create',[APIController::class,'data2']);
Route::post('data3/create',[APIController::class,'data3']);
Route::post('data4/create',[APIController::class,'data4']);

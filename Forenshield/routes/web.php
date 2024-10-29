<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\CrimeSceneController;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');

Route::prefix('/users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('/enroll', [UserController::class, 'enroll'])->name('admin.users.enroll');
    Route::get('/get', [UserController::class, 'getOne'])->name('admin.users.get.one');
    Route::get('/delete', [UserController::class, 'deleteOne'])->name('admin.users.delete.one');
});

Route::prefix('/crime-scene')->group(function () {
    Route::get('/', [CrimeSceneController::class, 'index'])->name('admin.crime-scene.index');
    Route::post('/enroll', [CrimeSceneController::class, 'enroll'])->name('admin.crime-scene.enroll');
    Route::get('/get', [CrimeSceneController::class, 'getOne'])->name('admin.crime-scene.get.one');
    Route::get('/delete', [CrimeSceneController::class, 'deleteOne'])->name('admin.crime-scene.delete.one');
});

Route::prefix('/attachment')->group(function () {
    Route::get('/list/{id}', [EvidenceController::class, 'index'])->name('admin.attachments.index');
    Route::post('/enroll', [EvidenceController::class, 'enroll'])->name('admin.attachments.enroll');
    Route::get('/delete', [EvidenceController::class, 'deleteOne'])->name('admin.attachments.delete.one');
    Route::get('/view/{hash}', [EvidenceController::class, 'show'])->name('admin.attachments.view.one');
});


Route::prefix('/history')->group(function () {
    Route::get('/data1', [APIController::class, 'data1Index'])->name('admin.history.data1');
    Route::get('/live/data1', [APIController::class, 'data1Live'])->name('admin.live.data1');
});

Route::prefix('/history')->group(function () {
    Route::get('/data2/{id}', [APIController::class, 'data2Index'])->name('admin.history.data2');
    Route::get('/data3/{id}', [APIController::class, 'data3Index'])->name('admin.history.data3');
    Route::get('/data4/{id}', [APIController::class, 'data4Index'])->name('admin.history.data4');
});

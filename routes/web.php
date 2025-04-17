<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'index'])->name('users.list');
Route::prefix('users')->group(function () {
    Route::get('', [UserController::class, 'index'])->name('users.list');
    Route::get('create', [UserController::class, 'create'])->name('users.create');
    Route::post('store', [UserController::class, 'store'])->name('users.store');
    Route::get('show/{id}', [UserController::class, 'show'])->name('users.view');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

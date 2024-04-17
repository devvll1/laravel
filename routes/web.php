<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenderController;

Route::controller(UserController::class)->group(function () {
    Route::get('/','login')->name('login');
    Route::post('/process/login','processLogin');
    Route::get('/logout', function () {
    return view('login.logout'); // return the logout confirmation view
    })->name('logout.get'); 
    Route::post('/logout', 'logout')->name('logout');
});

Route::group(['middleware' => 'auth'], function() {
    Route::controller(GenderController::class)->group(function () {
        Route::get('/genders', [GenderController::class, 'index'])->name('genders.index');
        Route::get('/genders/{id}', [GenderController::class, 'show'])->name('genders.show');
        Route::delete('/genders/{id}', [GenderController::class, 'destroy'])->name('genders.destroy');
    });
    
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', 'store')->name('users.store');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        Route::get('/full-name', [UserController::class, 'showFullName'])->name('full-name.show');
    });
});
<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/user/user', [UserController::class, 'index'])->name('user');
  
    //
    Route::get('/user/user/add', [UserController::class, 'add']);
    Route::post('/user/user/add', [UserController::class, 'insert']);
    //
    Route::get('/user/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('/user/user/edit/{id}', [UserController::class, 'update']);
    Route::get('/user/user/delete/{id}', [UserController::class, 'deleted']);

});



Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/role/role', [RoleController::class, 'index'])->name('role');

  
    //
    Route::get('/role/role/add', [RoleController::class, 'add']);
    Route::post('/role/role/add', [RoleController::class, 'insert']);
    //
    Route::get('/role/role/edit/{id}', [RoleController::class, 'edit']);
    Route::post('/role/role/edit/{id}', [RoleController::class, 'update']);
    Route::get('/role/role/delete/{id}', [RoleController::class, 'delete']);

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

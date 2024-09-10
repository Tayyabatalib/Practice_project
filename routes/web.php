<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\PermissionRegistrar;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('user', UserController::class);

//User Route

// Route::resource('users', UserController::class);
Route::get('/users/index',[UserController::class,'index'])->name('users.index');

Route::get('/users/creates',[UserController::class,'create'])->name('users.create');

Route::post('/users/store',[UserController::class,'store'])->name('users.store');

Route::get('/users/show/{id}',[UserController::class,'show'])->name('users.show');

Route::get('/users/edit/{id}',[UserController::class,'edit'])->name('users.edit');

Route::put('/users/update/{id}',[UserController::class,'update'])->name('users.update');

Route::delete('/users/destroy/{id}',[UserController::class,'destroy'])->name('users.destroy');

Route::get('/users/display',[UserController::class,'display'])->name('users.display');

Route::post('/users/assignRoleTOPermission',[UserController::class,'assignRoleTOPermission'])
       ->name('users.assignRoleTOPermission');

// Role Routes 

Route::get('/role/index',[RoleController::class,'index'])->name('roles.index');

Route::get('/role/create',[RoleController::class,'create'])->name('roles.create');

Route::post('/role/store',[RoleController::class,'store'])->name('roles.store');

Route::get('/role/show/{id}',[RoleController::class,'show'])->name('roles.show');

Route::get('/role/edit/{id}',[RoleController::class,'edit'])->name('roles.edit');

Route::put('/role/update/{id}',[RoleController::class,'update'])->name('roles.update');

Route::delete('/role/destroy/{id}',[RoleController::class,'destroy'])->name('roles.destroy');

// Permissions Route

Route::get('/permission/index',[PermissionController::class,'index'])->name('permissions.index');

Route::get('/permission/create',[PermissionController::class,'create'])->name('permissions.create');

Route::post('/permission/store',[PermissionController::class,'store'])->name('permissions.store');

Route::get('/permission/show/{id}',[PermissionController::class,'show'])->name('permissions.show');

Route::get('/permission/edit/{id}',[PermissionController::class,'edit'])->name('permissions.edit');

Route::put('/permission/update/{id}',[PermissionController::class,'update'])->name('permissions.update');

Route::delete('/permission/destroy/{id}',[PermissionController::class,'destroy'])->name('permissions.destroy');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Admin\GymClassController;

Route::get('/', function(){
    return view('admin.dashboard');
})->name('dashboard');

// Gestor de roles
Route::resource('roles', RoleController::class);

// Usuarios
Route::resource('users', UserController::class);

// Membresías
Route::resource('memberships', MembershipController::class)
    ->names('memberships');

// Entrenadores
Route::resource('trainers', TrainerController::class)
    ->names('trainers');

// Clases
Route::resource('classes', GymClassController::class)
    ->names('classes');

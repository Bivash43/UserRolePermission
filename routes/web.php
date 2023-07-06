<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);

Route::post('users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRoles');
Route::post('roles/{role}/assign-permission', [RoleController::class, 'assignPermissions'])->name('roles.assignPermissions');

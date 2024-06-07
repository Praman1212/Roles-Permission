<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




Route::resource('permission',PermissionController::class);


Route::resource('role',RoleController::class);

Route::get('role/{id}/givePermission', [RoleController::class, 'givePermissionToRole'])->name('role.givePermission');

Route::put('role/{id}/givePermission', [RoleController::class, 'updatePermissionToRole'])->name('role.givePermission');


Route::resource('user',UserController::class);



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

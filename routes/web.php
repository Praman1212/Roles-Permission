<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['role:super-admin|admin|editor']], function () {

    
    Route::resource('role', RoleController::class);
    
    Route::delete('role/{role}',[RoleController::class,'destroy'])->name('role.destroy')->middleware('permission:delete-role');
    
    Route::get('role/create',[RoleController::class,'create'])->name('role.create')->middleware('permission:create-role');
    
    Route::get('edit/{role}/edit',[RoleController::class,'edit'])->name('role.edit')->middleware('permission:edit-role');
    Route::patch('role/{role}',[RoleController::class,'update'])->name('role.update')->middleware('permission:update-role');

    
    Route::resource('permission', PermissionController::class);
    Route::delete('permission/{permission}',[permissionController::class,'destroy'])->name('permission.destroy')->middleware('permission:delete-role');
    
    Route::get('role/create',[RoleController::class,'create'])->name('role.create')->middleware('permission:create-role');
    
    Route::get('edit/{role}/edit',[RoleController::class,'edit'])->name('role.edit')->middleware('permission:edit-role');
    Route::patch('role/{role}',[RoleController::class,'update'])->name('role.update')->middleware('permission:update-role');



    Route::get('role/{id}/givePermission', [RoleController::class, 'givePermissionToRole'])->name('role.givePermission');

    Route::put('role/{id}/givePermission', [RoleController::class, 'updatePermissionToRole'])->name('role.givePermission');

    Route::resource('user', UserController::class);
});









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

require __DIR__ . '/auth.php';

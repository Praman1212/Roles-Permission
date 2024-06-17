<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['role:super-admin|admin']], function () {

    //Role route
    Route::resource('role', RoleController::class);

    //User route
    Route::resource('user', UserController::class);
    
    //Route for products
    Route::resource('product',ProductController::class);

    //Route for permission
    Route::resource('permission', PermissionController::class);





    //For roles, permissions , products and category

    //Roles route 

    Route::get('role',[RoleController::class,'index'])->name('role.index');

    Route::delete('role/{role}', [RoleController::class, 'destroy'])->name('role.destroy')->middleware('permission:delete-role');

    Route::get('role/create', [RoleController::class, 'create'])->name('role.create')->middleware('permission:create-role');

    Route::get('edit/{role}/edit', [RoleController::class, 'edit'])->name('role.edit')->middleware('permission:edit-role');

    Route::patch('role/{role}', [RoleController::class, 'update'])->name('role.update')->middleware('permission:update-role');


    //Permission route
    

    Route::get('permission/create', [PermissionController::class, 'create'])->name('permission.create');

    Route::delete('permission/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy')->middleware('permission:delete-role');


    Route::get('permission/{role}/edit', [RoleController::class, 'edit'])->name('role.edit')->middleware('permission:edit-role');

    Route::patch('role/{role}', [RoleController::class, 'update'])->name('role.update')->middleware('permission:update-role');


    
    //Product route
    Route::get('product',[ProductController::class,'index'])->name('product.index');

    Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('permission:delete-product');

    Route::get('product/create', [ProductController::class, 'create'])->name('product.create')->middleware('permission:create-product');

    Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit')->middleware('permission:edit-product');

    Route::patch('product/{product}', [ProductController::class, 'update'])->name('product.update')->middleware('permission:update-product');

    
    
    
    
    
    
    
    
    
    
    
    //giving the permission

    Route::get('role/{id}/givePermission', [RoleController::class, 'givePermissionToRole'])->name('role.givePermission');

    Route::put('role/{id}/givePermission', [RoleController::class, 'updatePermissionToRole'])->name('role.givePermission');

    

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

<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\ProductsController;

Route::prefix('auth')->group(function (){
    Route::post('register', [AuthController::class, 'register'])->name('registration');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth.basic');
});

Route::prefix('members')->middleware('auth.basic')->group(function(){
      Route::get("/",[MembersController::class, 'index']);
      Route::post("/",[MembersController::class, 'create']);
      Route::put("/",[MembersController::class, 'update']);
      Route::delete("/{id}",[MembersController::class, 'delete']);
});

Route::prefix('roles')->middleware('auth.basic')->group(function (){
    Route::get('/', [RolesController::class, 'index']);
    Route::post('/', [RolesController::class, 'create']);
    Route::put("/",[RolesController::class, 'update']);
    Route::delete('/{id}', [RolesController::class, 'delete']);
});

Route::prefix('products')->middleware('auth.basic')->group(function (){
    Route::post('/', [ProductsController::class, 'create']);
    Route::delete('/{id}', [ProductsController::class, 'delete']);
    Route::put('/', [ProductsController::class, 'update']);
    Route::get("/",[ProductsController::class, 'index']);
});

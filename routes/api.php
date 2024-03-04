<?php

use App\Http\Controllers\api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CategoryController::class)->name('api.')->group(function () {
    Route::get('category/{id}', 'index')->name('category');
    Route::post('category/create', 'store')->name('category.create');
    Route::get('category/{id}/show', 'show')->name('category.show');
    Route::patch('category/{id}/edit', 'update')->name('category.edit');
    Route::delete('category/{id}/destroy', 'destroy')->name('category.destroy');
});

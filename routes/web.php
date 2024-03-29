<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\deleted\DeletedContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::middleware(RedirectIfAuthenticated::class)->group(function () {
        Route::get('/', 'login_view')->name('login');
        Route::post('/', 'login');
        Route::get('/register', 'register_view')->name('register');
        Route::post('/register', 'register');
    });

    Route::middleware(Authenticate::class)->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });
});

Route::middleware(Authenticate::class)->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('/show', 'show')->name('show');
        Route::patch('/details', 'details')->name('details');
        Route::patch('/password', 'password')->name('password');
        Route::patch('/picture', 'picture')->name('picture');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'index')->name('category');
    });

    Route::controller(ContactController::class)->group(function () {
        Route::get("/contact", 'index')->name('contact');
        Route::get("/contact/create", 'create')->name('contact.create');
        Route::post("/contact/create", 'store');
        Route::get("/contact/{contact}/show", 'show')->name('contact.show');
        Route::get("/contact/{contact}/edit", 'edit')->name('contact.edit');
        Route::patch("/contact/{contact}/edit", 'update');
        Route::patch("/contact/{contact}/picture", 'picture')->name('contact.picture');
        Route::delete("/contact/{contact}/destroy", 'destroy')->name('contact.destroy');
    });

    Route::controller(DeletedContactController::class)->group(function () {
        Route::get("/contact/deleted", 'index')->name('contact.deleted');
        Route::patch("/contact/{id}/restore", 'restore')->name('contact.restore');
        Route::delete("/contact/{id}/delete", 'delete')->name('contact.delete');
    });
});

// composer require --dev barryvdh/laravel-ide-helper
// php artisan ide-helper:generate

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Livewire\AdminCategories;
use App\Livewire\AdminPaises;
use App\Livewire\AdminPreguntas;
use App\Livewire\AdminSettings;
use App\Livewire\FormAuth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth.session'])->group(function () {
    Route::get('/dashboard/', [AdminController::class, 'index'])->name('dashboard')->lazy();
    Route::get('/admin-categorias/{id?}/', AdminCategories::class)->name('admin-categorias')->lazy();
    Route::get('/admin-paises/', AdminPaises::class)->name('admin-paises')->lazy();
    Route::get('/admin-preguntas/', AdminPreguntas::class)->name('admin-preguntas')->lazy();
    Route::get('/admin-ajustes/', AdminSettings::class)->name('admin-ajustes')->lazy();

    Route::get('/logout/', [AuthController::class, 'logout'])->name('user-logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/iniciar-sesion/', FormAuth::class)->name('login');
});
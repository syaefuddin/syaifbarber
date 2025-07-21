<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MStyleController;
use App\Http\Controllers\MTeamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StyleRambutController;
use Filament\Pages\Auth\Login;

// Redirect /home ke /
Route::redirect('/home', '/')->name('redirect.home');

// Route utama diarahkan ke HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route tambahan untuk proses POST login admin Filament
Route::post('/admin/login', [Login::class, 'authenticate'])->name('filament.admin.auth.login.post');

Route::get('/about_menu', [AboutController::class, 'index'])->name('about.menu');
Route::get('/style_menu', [MStyleController::class, 'index'])->name('style.menu');
Route::get('/team_menu', [MTeamController::class, 'index'])->name('team.menu');

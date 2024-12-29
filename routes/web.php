<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\RoleHeroController;
use App\Http\Controllers\RegisterController;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/role_hero', [RoleHeroController::class, 'index'])->name('role_hero');
// Route untuk menampilkan form tambah
Route::get('/role_hero/tambah', [RoleHeroController::class, 'tambah'])->name('role_hero_tambah');
// Route untuk menyimpan data baru
Route::post('/role_hero/tambah', [RoleHeroController::class, 'action_tambah'])->name('role_hero_tambah');
// mengedit data role_hero
Route::get('/role_hero/{id}/edit', [RoleHeroController::class, 'edit'])->name('role_hero_edit');
Route::put('/role_hero/{id}/edit', [RoleHeroController::class, 'update'])->name('role_hero_update');
// Route untuk menghapus data role hero
Route::delete('/role_hero/{id}', [RoleHeroController::class, 'destroy'])->name('role_hero.destroy');


// // Route untuk hapus data
// Route::delete('/role_hero/{id}/hapus', [RoleHeroController::class, 'hapus'])->name('role_hero_hapus');

// HERO
Route::get('/hero', [HeroController::class, 'index'])->name('hero');
Route::get('/hero/tambah', [HeroController::class, 'tambah'])->name('hero_tambah');
Route::post('/hero/tambah', [HeroController::class, 'action_tambah'])->name('hero_tambah');
Route::get('/hero/{id}/edit', [HeroController::class, 'edit'])->name('hero_edit'); // Route untuk form edit
Route::put('/hero/{id}/edit', [HeroController::class, 'update'])->name('hero_update'); // Route untuk update data
Route::delete('/hero/{id}', [HeroController::class, 'hapus'])->name('hero.destroy'); // Route untuk hapus data

// login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//REGISTER
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

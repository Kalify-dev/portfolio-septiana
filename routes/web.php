<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/artikel/{article:slug}', [HomeController::class, 'show'])->name('artikel.show');
Route::post('/artikel/{article:slug}/komentar', [HomeController::class, 'storeComment'])->name('artikel.comment');

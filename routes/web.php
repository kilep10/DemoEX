<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [ReportController::class,'index'])->middleware(['auth','verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/create', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/store', [ReportController::class, 'store'])->name('reports.store');
});

Route::middleware(Admin::class)->group(function(){
    Route::get('/admin', [AdminController::class,'index'])->name('admin.index');
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;

Route::middleware(['auth'])->group(function(){
    Route::get('/', [PengaduanController::class, 'index']);
    Route::resource('pengaduans', PengaduanController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

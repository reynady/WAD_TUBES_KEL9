<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\HomeController;

Route::middleware(['auth'])->group(function(){
    Route::get('/', [PengaduanController::class, 'index'])->name('pengaduans.index');
    Route::resource('pengaduans', PengaduanController::class);
});


Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::post('login', function () {
    $credentials = request(['email', 'password']);
    if (auth()->attempt($credentials)) {
        return redirect()->route('pengaduans.index');
    }
    return back()->withErrors(['email' => 'Invalid credentials']);
});

Route::post('logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
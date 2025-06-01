<?php
use App\Http\Controllers\LaporanController;

Route::get('/laporan/pengaduan', [LaporanController::class, 'index']);
Route::get('/laporan/pengaduan/kategori/{kategori}', [LaporanController::class, 'byKategori']);
Route::get('/laporan/pengaduan/daterange', [LaporanController::class, 'byDateRange']);
Route::post('/laporan/pengaduan/generate', [LaporanController::class, 'generateReport']);
Route::delete('/laporan/pengaduan/{id}', [LaporanController::class, 'destroy']);

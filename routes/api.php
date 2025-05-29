<?php

use App\Http\Controllers\Api\PengaduanController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/status/pengaduan', [PengaduanController::class, 'index']);
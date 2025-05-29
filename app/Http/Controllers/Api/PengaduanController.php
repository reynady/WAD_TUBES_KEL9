<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::with('user')->get();
        return response()->json($pengaduans);
    }
}

<?php

use App\Models\Laporan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        return response()->json(Laporan::all());
    }

    public function byKategori($kategori)
    {
        return response()->json(Laporan::where('kategori', $kategori)->get());
    }

    public function byDateRange(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $laporans = Laporan::whereBetween('periode_awal', [$request->start_date, $request->end_date])->get();
        return response()->json($laporans);
    }

    public function generateReport(Request $request)
{
    $request->validate([
        'kategori' => 'required|string',
        'periode_awal' => 'required|date',
        'periode_akhir' => 'required|date',
    ]);

    $pengaduan = Pengaduan::where('kategori', $request->kategori)
        ->whereBetween('tanggal_pengaduan', [$request->periode_awal, $request->periode_akhir]);

    if ($pengaduan->count() === 0) {
        return response()->json([
            'message' => 'Tidak ditemukan data pengaduan sesuai filter.'
        ], 404);
    }

    $laporan = Laporan::create([
        'kategori' => $request->kategori,
        'jumlah_pengaduan' => $pengaduan->count(),
        'jumlah_selesai' => $pengaduan->where('status', 'Selesai')->count(),
        'periode_awal' => $request->periode_awal,
        'periode_akhir' => $request->periode_akhir,
    ]);

    return response()->json($laporan, 201);
}


    public function destroy($id)
    {
        Laporan::destroy($id);
        return response()->json(['message' => 'Laporan berhasil dihapus']);
    }
}

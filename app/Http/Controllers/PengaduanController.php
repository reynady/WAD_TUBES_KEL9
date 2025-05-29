<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index()
    {
    $pengaduans = Pengaduan::with('user')->get();
    return view('admin.pengaduan.index', compact('pengaduans'));
    }

    public function create()
    {
        return view('admin.pengaduans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'status' => 'required|in:menunggu,diproses,selesai,ditolak',
        ]);

        Pengaduan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'user_id' => auth()->id(),
        ]);
        
        return redirect()->route('pengaduans.index')->with('success', 'Pengaduan berhasil ditambahkan.');
        
    public function edit(Pengaduan $pengaduan)
    {
        return view('admin.pengaduans.edit', compact('pengaduan'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Diproses,Selesai,Ditolak',
        ]);

        if ($pengaduan->status === 'Menunggu' && !in_array($request->status, ['Diproses', 'Ditolak'])) {
            return back()->withErrors(['status' => 'Status error. Harap coba lagi.']);
    }

    $pengaduan->update(['status' => $request->status]);
    return redirect()->route('pengaduans.index')->with('success', 'Status pengaduan berhasil diubah.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();
        return redirect()->route('pengaduans.index')->with('success', 'Pengaduan berhasil dihapus.');
    }
}


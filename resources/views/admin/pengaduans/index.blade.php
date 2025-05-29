@extends('layouts.app')

@section('content')
    <h1>Daftar Pengaduan</h1>
    <a href="{{ route('pengaduans.create') }}" class="btn btn-primary mb-3">Tambah Pengaduan</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Pengadu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengaduans as $pengaduan)
                <tr>
                    <td>{{ $pengaduan->judul }}</td>
                    <td>{{ $pengaduan->deskripsi }}</td>
                    <td>{{ $pengaduan->status }}</td>
                    <td>{{ $pengaduan->user->name ?? 'Tidak Diketahui' }}</td>
                    <td>
                        <a href="{{ route('pengaduans.edit', $pengaduan) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('pengaduans.destroy', $pengaduan) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada pengaduan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
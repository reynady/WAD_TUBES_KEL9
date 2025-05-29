@extends('layouts.app')

@section('content')
    <h1>Edit Status Pengaduan</h1>
    <form action="{{ route('pengaduans.update', $pengaduan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $pengaduan->judul }}" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" disabled>{{ $pengaduan->deskripsi }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                <option value="Menunggu" {{ $pengaduan->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="Diproses" {{ $pengaduan->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="Selesai" {{ $pengaduan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                <option value="Ditolak" {{ $pengaduan->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pengaduans.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
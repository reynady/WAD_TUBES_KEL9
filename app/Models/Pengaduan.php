<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
        'lokasi',
        'status',
        'tanggal_pengaduan'
    ];
}



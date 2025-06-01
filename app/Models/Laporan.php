<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = ['pengaduan_id', 'tanggal', 'kategori', 'status'];

    public function pengaduans()
{
    return $this->hasMany(Pengaduan::class);
}

}
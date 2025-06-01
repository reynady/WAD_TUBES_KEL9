<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    public function up()
{
    Schema::create('laporans', function (Blueprint $table) {
        $table->id();
        $table->string('kategori');
        $table->unsignedInteger('jumlah_pengaduan');
        $table->unsignedInteger('jumlah_selesai');
        $table->date('periode_awal');
        $table->date('periode_akhir');
        $table->timestamps();

    });

    }

    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}

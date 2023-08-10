<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->string('keperluan');
            $table->string('no_hp');
            $table->date('waktu_awal');
            $table->date('waktu_akhir');
            $table->enum('status', ['pending', 'terima', 'tolak'])->default('pending');
            $table->foreignId('dinas_dipinjam_id');
            $table->foreignId('dinas_peminjam_id');
            $table->foreignId('ruangan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}

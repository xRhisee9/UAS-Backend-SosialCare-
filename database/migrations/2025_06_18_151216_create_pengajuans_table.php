<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->foreignId('jenis_bantuan_id')->constrained('jenis_bantuans')->onDelete('cascade');
            $table->date('tanggal_pengajuan');
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu'); // PASTIKAN BARIS INI ADA DAN BENAR
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
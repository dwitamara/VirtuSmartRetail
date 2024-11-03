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
        Schema::create('pengembalian_barang_ke_supplier', function (Blueprint $table) {
            $table->id('id_pengembalian');
            $table->foreignId('id_retur')->constrained('retur_barang','id_retur');
            $table->date('tanggal_pengembalian');
            $table->foreignId('dikirim_oleh')->constrained('karyawan','id_karyawan');
            $table->enum('status_pengiriman', ['pending', 'dikirim', 'diterima_supplier']);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian_barang_ke_supplier');
    }
};

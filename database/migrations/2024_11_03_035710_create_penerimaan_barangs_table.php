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
        Schema::create('penerimaan_barang', function (Blueprint $table) {
            $table->id('id_penerimaan');
            $table->foreignId('id_po')->constrained('purchase_orders','id_po');
            $table->date('tanggal_terima');
            $table->foreignId('diterima_oleh')->constrained('karyawan','id_karyawan');
            $table->enum('status', ['selesai', 'sebagian', 'rusak', 'pending']);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaan_barang');
    }
};

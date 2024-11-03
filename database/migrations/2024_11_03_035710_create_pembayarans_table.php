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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->foreignId('id_po')->constrained('purchase_orders', 'id_po');
            $table->date('tanggal_pembayaran');
            $table->decimal('jumlah_dibayar', 10, 2);
            $table->enum('status_pembayaran', ['pending', 'selesai']);
            $table->foreignId('disetujui_oleh')->constrained('karyawan', 'id_karyawan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};

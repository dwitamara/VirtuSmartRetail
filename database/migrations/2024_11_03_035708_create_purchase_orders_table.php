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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id('id_po');
            $table->string('no_po')->unique();
            $table->foreignId('dibuat_oleh')->constrained('karyawan', 'id_karyawan');
            $table->timestamp('waktu_dibuat');
            $table->enum('status', ['pending', 'disetujui', 'selesai', 'dibatalkan']);
            $table->timestamp('waktu_disetujui')->nullable();
            $table->timestamp('waktu_selesai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};

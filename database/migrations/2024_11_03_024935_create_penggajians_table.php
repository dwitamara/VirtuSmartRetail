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
        Schema::create('penggajian', function (Blueprint $table) {
            $table->id('id_penggajian');
            $table->foreignId('id_karyawan')->constrained('karyawan','id_karyawan');
            $table->date('gaji_bulan');
            $table->decimal('potongan', 10, 2);
            $table->decimal('tunjangan', 10, 2);
            $table->decimal('total_gaji', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggajian');
    }
};

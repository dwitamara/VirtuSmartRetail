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
        Schema::create('retur_barang_items', function (Blueprint $table) {
            $table->id('id_item_retur');
            $table->foreignId('id_retur')->constrained('retur_barang', 'id_retur');
            $table->foreignId('id_item_po')->constrained('purchase_order_items', 'id_item_po');
            $table->integer('jumlah_diretur');
            $table->enum('kondisi_barang', ['rusak', 'tidak sesuai', 'lainnya']);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retur_barang_items');
    }
};

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
        Schema::create('penerimaan_barang_items', function (Blueprint $table) {
            $table->id('id_item_penerimaan');
            $table->foreignId('id_penerimaan')->constrained('penerimaan_barang', 'id_penerimaan');
            $table->foreignId('id_item_po')->constrained('purchase_order_items', 'id_item_po');
            $table->integer('jumlah_diterima');
            $table->enum('kondisi', ['baik', 'rusak', 'hilang']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaan_barang_items');
    }
};

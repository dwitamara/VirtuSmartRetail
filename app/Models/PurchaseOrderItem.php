<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    use HasFactory;

    protected $table = 'purchase_order_items';
    protected $primaryKey = 'id_item_po';
    protected $fillable = ['id_po', 'nama_barang', 'deskripsi_barang', 'jumlah', 'harga_perkiraan', 'total_harga'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturBarangItem extends Model
{
    use HasFactory;

    protected $table = 'retur_barang_items';
    protected $primaryKey = 'id_item_retur';
    protected $fillable = ['id_retur', 'id_item_po', 'jumlah_diretur', 'kondisi_barang', 'catatan'];
}

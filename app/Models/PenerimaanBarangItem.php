<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanBarangItem extends Model
{
    use HasFactory;

    protected $table = 'penerimaan_barang_items';
    protected $primaryKey = 'id_item_penerimaan';
    protected $fillable = ['id_penerimaan', 'id_item_po', 'jumlah_diterima', 'kondisi'];
}

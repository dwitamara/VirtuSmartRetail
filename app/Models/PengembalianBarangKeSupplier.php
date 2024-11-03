<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengembalianBarangKeSupplier extends Model
{
    use HasFactory;

    protected $table = 'pengembalian_barang_ke_suppliers';
    protected $primaryKey = 'id_pengembalian';
    protected $fillable = ['id_retur', 'tanggal_pengembalian', 'dikirim_oleh', 'status_pengiriman', 'catatan'];
}

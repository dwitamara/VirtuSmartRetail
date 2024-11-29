<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransaksiPenjualan;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $table = 'detail_penjualan';
    protected $primaryKey = 'id_detail';
    protected $fillable = ['id_penjualan', 'id_produk', 'jumlah', 'harga_satuan'];

    public function produk()
{
    return $this->belongsTo(Produk::class, 'id_produk');
}
public function transaksiPenjualan()
{
    return $this->belongsTo(TransaksiPenjualan::class, 'id_penjualan', 'id_penjualan');
}

}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailPenjualan;
use App\Models\Pelanggan;

class TransaksiPenjualan extends Model
{
    use HasFactory;
    


    protected $table = 'transaksi_penjualan';
    protected $primaryKey = 'id_penjualan';
    protected $fillable = ['id_pelanggan', 'tanggal_penjualan', 'total_harga'];

    public function pelanggan()
{
    return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
}

    public function detailPenjualan()
{
    return $this->hasMany(DetailPenjualan::class, 'id_penjualan', 'id_penjualan');
}
}





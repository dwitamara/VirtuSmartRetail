<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokOpname extends Model
{
    use HasFactory;

    protected $table = 'stokopname';
    protected $primaryKey = 'id_stokopname';
    protected $fillable = ['id_produk', 'tanggal_opname', 'jumlah_sebenarnya', 'selisih'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}

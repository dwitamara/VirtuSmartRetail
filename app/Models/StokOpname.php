<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokOpname extends Model
{
    use HasFactory;

    protected $table = 'stokopnames';
    protected $primaryKey = 'id_stokopname';
    protected $fillable = ['id_produk', 'tanggal_opname', 'jumlah_sebenarnya', 'selisih'];
}

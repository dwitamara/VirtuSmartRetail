<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturBarang extends Model
{
    use HasFactory;

    protected $table = 'retur_barangs';
    protected $primaryKey = 'id_retur';
    protected $fillable = ['id_po', 'tanggal_retur', 'diajukan_oleh', 'status', 'alasan'];
}

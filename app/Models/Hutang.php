<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    use HasFactory;

    protected $table = 'hutangs';
    protected $primaryKey = 'id_hutang';
    protected $fillable = ['id_supplier', 'tanggal_hutang', 'jumlah_hutang', 'status'];
}

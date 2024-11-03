<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $table = 'purchase_orders';
    protected $primaryKey = 'id_po';
    protected $fillable = ['no_po', 'dibuat_oleh', 'waktu_dibuat', 'status', 'waktu_disetujui', 'waktu_selesai'];
}

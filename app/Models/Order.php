<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'pemesanans';
    protected $fillable = [
        'id_pelanggan',
        'id_pakaian',
        'no_resi',
        'tgl_pesan',
        'status_pesan',
        'status_sewa',
        'total_bayar'
        

    ];
}

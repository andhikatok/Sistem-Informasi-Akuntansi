<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $table = 'tabel_pembelian';
    protected $primaryKey = 'id_transaksi_pembelian';
    public $timestamps = false;
    protected $fillable = [
        'tanggal_transaksi',
        'id_invoice',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'id_invoice');
    }



    use HasFactory;
}

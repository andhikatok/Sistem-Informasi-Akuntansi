<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'tabel_invoice';
    protected $primaryKey = 'id_invoice';
    public $timestamps = false;

    protected $fillable = [
        'tanggal_invoice',
        'jatuh_tempo',
        'total_harga',
        'id_barang',
        'jumlah',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_barang');
    }

    use HasFactory;
}

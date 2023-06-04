<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'tabel_penjualan';
    protected $primaryKey = 'id_transaksi_penjualan';
    public $timestamps = false;
    protected $fillable = [
        'tanggal_transaksi',
        'id_customer',
        'id_outlet',
        'id_barang',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'id_customer');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_barang');
    }



    use HasFactory;
}

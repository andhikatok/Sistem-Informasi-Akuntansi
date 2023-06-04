<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tabel_barang';
    protected $primaryKey = 'id_barang';
    public $timestamps = false;

    protected $fillable = [
        'nama_barang',
        'harga_beli',
        'harga_jual',
        'stok',
        'id_supplier',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }


    public function contact()
    {
        return $this->belongsToMany(Contact::class, 'trans', 'id_barang', 'id_customer')
            ->withPivot('id_outlet');
    }

    public function outlet()
    {
        return $this->belongsToMany(Outlet::class, 'trans', 'id_barang', 'id_outlet')
            ->withPivot('id_customer');
    }
    public function sales()
    {
        return $this->hasMany(Sales::class, 'id_barang');
    }


    use HasFactory;
}

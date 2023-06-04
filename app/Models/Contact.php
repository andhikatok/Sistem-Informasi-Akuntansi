<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'tabel_customer';
    protected $primaryKey = 'id_customer';
    public $timestamps = false;

    protected $fillable = [
        'nama_customer',
        'alamat',
        'kota',
        'no_tlp',
        'email',
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'trans', 'id_customer', 'id_barang')
            ->withPivot('id_outlet');
    }
    public function sales()
    {
        return $this->hasMany(Sales::class, 'id_customer');
    }

    use HasFactory;
}

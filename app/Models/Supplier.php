<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'tabel_supplier';
    protected $primaryKey = 'id_supplier';
    public $timestamps = false;

    protected $fillable = [
        'nama_supplier',
        'alamat',
        'kota',
        'no_tlp',
        'email',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_supplier');
    }


    use HasFactory;
}

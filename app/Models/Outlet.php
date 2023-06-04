<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $table = 'tabel_outlet';
    public $timestamps = false;
    protected $primaryKey = 'id_outlet';
    protected $fillable = [
        'nama_outlet',
        'alamat',
        'kota',
        'no_tlp',
    ];

    public function contact()
    {
        return $this->belongsToMany(Contact::class, 'trans', 'id_outlet', 'id_customer')
            ->withPivot('id_barang');
    }

    public function sales()
    {
        return $this->hasMany(Sales::class, 'id_outlet');
    }

    use HasFactory;
}

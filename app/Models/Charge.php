<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $table = "tabel_biaya";
    protected $primaryKey = "id_biaya";
    public $timestamps = false;

    protected $fillable = [
        'tanggal_biaya',
        'jenis_biaya',
        'jumlah_biaya',
    ];



    use HasFactory;
}

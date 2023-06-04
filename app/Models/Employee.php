<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'tabel_pegawai';
    protected $primaryKey = 'id_pegawai';
    public $timestamps = false;

    protected $fillable = [
        'nama_pegawai',
        'alamat',
        'no_tlp',
        'email',
        'gaji',
    ];


    use HasFactory;
}

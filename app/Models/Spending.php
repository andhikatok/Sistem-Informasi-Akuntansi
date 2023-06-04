<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    protected $table = "tabel_pengeluaran";
    protected $primaryKey = "id_pengeluaran";
    public $timestamps = false;

    protected $fillable = [
        'tanggal_pengeluaran',
        'jenis_pengeluaran',
        'jumlah_pengeluaran',
    ];

    use HasFactory;
}

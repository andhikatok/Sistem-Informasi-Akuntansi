<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $table = 'tabel_buku_besar';
    protected $primaryKey = 'id_buku_besar';
    public $timestamps = false;

    protected $fillable = [
        'id_kas_bank',
        'id_biaya',
        'id_pegawai',
        'id_pengeluaran',
        'kredit',
        'debit',
        'saldo_kredit',
        'saldo_debit',

    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_kas_bank');
    }

    use HasFactory;
}

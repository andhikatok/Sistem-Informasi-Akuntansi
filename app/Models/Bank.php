<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Bank extends Model
{


    protected $table = 'tabel_kas_bank';
    public $timestamps = false;
    protected $primaryKey = 'id_kas_bank';

    protected $fillable = [
        'tanggal',
        'keterangan',
        'debit',
        'kredit',
        'saldo',
    ];


    public function Ledger()
    {
        return $this->hasMany(Ledger::class);
    }

    use HasFactory;
}

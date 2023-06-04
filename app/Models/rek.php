<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class rek extends Model
{
    protected $tabel = 'tabel_bank';
    use HasFactory;
    protected $primaryKey = 'id_bank';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'no'
    ];

    public function Bank()
    {
        return $this->hasMany(Bank::class, 'id_bank');
    }
}

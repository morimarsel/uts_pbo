<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class PenerimaBeasiswa extends Model
{

    use HasFactory;

    protected $fillable = [
        'nama_mahasiswa',
        'nim',
        'ipk',
        'beasiswa_id',
        'fakultas', // jangan lupa ini juga, karena ada di migration
    ];


    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Beasiswa extends Model
{

    use HasFactory;

    protected $fillable = [
        'nama_beasiswa',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_berakhir',
    ];

    public function penerimaBeasiswa()
    {
        return $this->hasMany(PenerimaBeasiswa::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiKegiatan extends Model
{
    use HasFactory;

    // Nama tabel (opsional, Laravel otomatis plural lowercase dari nama model)
    protected $table = 'informasikegiatans';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'tanggal_kegiatan',
        'kegiatan',
    ];
}

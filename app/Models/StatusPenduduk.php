<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statuspenduduk extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'penduduks';

    // Primary key custom
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $keyType = 'string';

    // Field yang boleh diisi (mass assignable)
    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'tempat_lahir',
        'tgl_lahir',
        'status',
        'jk',
        'gol',
    ];
}

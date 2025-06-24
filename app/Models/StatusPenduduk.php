<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPenduduk extends Model
{
    use HasFactory;

    protected $table = 'statuspenduduks'; // sesuai dengan nama tabel di migration
    protected $primaryKey = 'nik';        // karena primary key-nya bukan "id"
    public $incrementing = false;         // karena NIK bukan auto increment
    protected $keyType = 'string';

    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'tempat_lahir',
        'tgl_lahir',
        'status',
        'jenis_kelamin',
        'gol_darah',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembuatanSurat extends Model
{
    use HasFactory;

    // ✅ Tambahkan ini untuk mengarahkan ke nama tabel yang sesuai di database
    protected $table = 'pembuatansurats';

    protected $primaryKey = 'kode_surat';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['kode_surat', 'jenis_surat', 'nik', 'file_surat'];

    public function penduduk()
    {
        return $this->belongsTo(Statuspenduduk::class, 'nik', 'nik');
    }
}

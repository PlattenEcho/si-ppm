<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPenerimaan extends Model
{
    use HasFactory;

    protected $table = 'surat_penerimaan';

    protected $fillable = [
        'id_pendaftaran',
        'nomor_surat',
        'kepada',
        'fakultas_instansi',
        'no_surat_magang',
        'tanggal_surat_magang',
        'file'
    ];
}

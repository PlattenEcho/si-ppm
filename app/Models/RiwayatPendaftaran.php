<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pendaftaran';

    protected $fillable = [
        'id_pendaftaran',
        'status_pendaftaran',
        'catatan',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }

    public function getStatusPendaftaranAttribute($value)
    {
        $statusCodes = [
            1 => 'Menunggu Verifikasi',
            2 => 'Verifikasi Berhasil',
            3 => 'Verifikasi Gagal',
            4 => 'Seleksi',
            5 => 'Diterima',
            6 => 'Ditolak',
            7 => 'Dalam Proses Magang',
            8 => 'Magang Selesai',
            9 => 'Batal',
        ];

        return $statusCodes[$value] ?? 'Unknown Status';
    }

}
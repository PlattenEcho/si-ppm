<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran'; // Specify the primary key column name

    protected $fillable = [
        'id_pendaftaran',
        'id_user',
        'name',
        'nim',
        'alamat',
        'jenjang',
        'universitas',
        'email',
        'no_telp',
        'motivasi',
        'rencana_kegiatan',
        'status_pendaftaran',
        'bidang',
        'scan_ktm',
        'surat_pengantar',
        'periode'
    ];

    // Jika Anda memiliki relasi dengan tabel users, tambahkan relasinya di sini
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function riwayatPendaftaran()
    {
        return $this->hasMany(RiwayatPendaftaran::class, 'id_pendaftaran');
    }



    public static function codes()
    {
        return collect(
            [
                ['bidang' => 1, 'label' => 'Komunikasi'],
                ['bidang' => 2, 'label' => 'Informatika'],
                ['bidang' => 3, 'label' => 'Media'],
                ['bidang' => 4, 'label' => 'Infrastruktur'],
                ['bidang' => 5, 'label' => 'Statistika'],
            ]
        );

    }

    public static function statusCodes()
    {
        return collect([
            ['status_pendaftaran' => 1, 'label' => 'Menunggu Verifikasi'],
            ['status_pendaftaran' => 2, 'label' => 'Verifikasi Berhasil'],
            ['status_pendaftaran' => 3, 'label' => 'Verifikasi Gagal'],
            ['status_pendaftaran' => 4, 'label' => 'Seleksi'],
            ['status_pendaftaran' => 5, 'label' => 'Diterima'],
            ['status_pendaftaran' => 6, 'label' => 'Ditolak'],
            ['status_pendaftaran' => 7, 'label' => 'Dalam Proses Magang'],
            ['status_pendaftaran' => 8, 'label' => 'Magang Selesai'],
            ['status_pendaftaran' => 9, 'label' => 'Batal'],
        ]);
    }

    public function getJenjangAttribute($value)
    {
        $jenjangCodes = [
            1 => 'SMK',
            2 => 'S1',
            3 => 'Lainnya',
        ];

        return $jenjangCodes[$value] ?? 'Unknown';
    }

    public function getStatusAttribute()
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

        return $statusCodes[$this->attributes['status_pendaftaran']] ?? 'Unknown Status';
    }

    public function getBidangAttribute()
    {
        $bidangCodes = [
            1 => 'Komunikasi',
            2 => 'Informatika',
            3 => 'Media',
            4 => 'Infrastruktur',
            5 => 'Statistika',
        ];

        return $bidangCodes[$this->attributes['bidang']] ?? 'Unknown Bidang';
    }
}
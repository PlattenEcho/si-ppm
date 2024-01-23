<?php

namespace Database\Seeders;

use App\Models\StatusPendaftaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_status' => 'Menunggu Verifikasi'],
            ['nama_status' => 'Verifikasi Berhasil'],
            ['nama_status' => 'Verifikasi Gagal'],
            ['nama_status' => 'Proses Seleksi'],
            ['nama_status' => 'Diterima'],
            ['nama_status' => 'Ditolak'],
            ['nama_status' => 'Dalam Proses Magang'],
            ['nama_status' => 'Magang Selesai'],
            ['nama_status' => 'Batal'],
        ];

        // Masukkan data ke dalam tabel
        StatusPendaftaran::insert($data);

    }
}

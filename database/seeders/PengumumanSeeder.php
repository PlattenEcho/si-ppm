<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengumuman')->insert([
            'title' => 'Selamat anda diterima!',
            'no_telp' => '082169992772',
            'nama_kontak' => 'Hanry Sugihastomo',
            'link' => 'wa.link/yuvh1v',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/SMPTE_Color_Bars.svg/1200px-SMPTE_Color_Bars.svg.png',
        ]);
    }
}

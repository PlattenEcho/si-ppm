<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['nama' => 'Admin'],
            ['nama' => 'Kepala Diskominfo'],
            ['nama' => 'Mahasiswa'],
        ];

        // Insert data into the 'roles' table
        DB::table('roles')->insert($roles);
    }
}

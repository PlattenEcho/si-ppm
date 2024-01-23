<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{

    public function viewDashboardAdmin()
    {
        $data = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'data' => [65, 59, 80, 81, 56],
        ];


        return view('admin.dashboard', compact('data'));
    }



    public function viewDaftarPeserta()
    {
        return view('admin.daftar_peserta');
    }

    public function viewPengaturan()
    {
        return view('admin.pengaturan');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboardMahasiswa()
    {
        return view('mahasiswa.dashboard');
    }

    public function viewDashboardAdmin()
    {
        $labels = ['January', 'February', 'March', 'April', 'May'];
        $data = [65, 59, 80, 81, 56];

        return view('admin.dashboard', compact('labels', 'data'));
    }

    public function viewDashboardKepalaDinas()
    {
        return view('kepala_dinas.dashboard');
    }
}

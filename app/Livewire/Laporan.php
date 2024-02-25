<?php

namespace App\Livewire;

use Ramsey\Uuid\Uuid;
use App\Models\Pendaftaran;
use Livewire\Component;

class Laporan extends Component
{
    public $jangka_waktu = '-';
    public $bulan;
    public $periode;
    public $tahun;
    public $diterima = 0;
    public $ditolak = 0;
    public $total = 0;
    public $bulanVisible = false;
    public $periodeVisible = false;
    public $tahunVisible = false;

    public $bulanList;

    public $periodeList;

    public $tahunList;

    public function mount()
    {
        $this->bulanList = Pendaftaran::selectRaw('MONTH(created_at) as bulan')
            ->distinct()
            ->orderBy('bulan')
            ->pluck('bulan')
            ->map(function ($bulan) {
                return [
                    'uuid' => Uuid::uuid4()->toString(),
                    'bulan' => $bulan,
                ];
            });

        $this->periodeList = Pendaftaran::select('periode')
            ->distinct()
            ->pluck('periode')
            ->map(function ($periode) {
                return [
                    'uuid' => Uuid::uuid4()->toString(),
                    'periode' => $periode,
                ];
            });

        $this->tahunList = Pendaftaran::selectRaw('YEAR(created_at) as tahun')
            ->distinct()
            ->orderBy('tahun')
            ->pluck('tahun')
            ->map(function ($tahun) {
                return [
                    'uuid' => Uuid::uuid4()->toString(),
                    'tahun' => $tahun,
                ];
            });
        
            
    }

    public function render()
    {   
        sleep(1);
        $data = $this->getData();
        $this->diterima = $data['diterima'];
        $this->ditolak = $data['ditolak'];
        $this->total = $data['total'];

        return view('livewire.laporan', [
            'diterima' => $this->diterima,
            'ditolak' => $this->ditolak,
            'total' => $this->total,
            'jangka_waktu' => $this->jangka_waktu
        ]);
    }
    
    

    public function getData()
    {
        $query = Pendaftaran::query();

        if ($this->jangka_waktu == 'bulanan' && $this->bulan) {
            $query->whereMonth('created_at', '=', $this->bulan)->whereYear('created_at', now()->year);
        } elseif ($this->jangka_waktu == 'periodik' && $this->periode) {
            $query->where('periode', $this->periode);
        } elseif ($this->jangka_waktu == 'tahunan' && $this->tahun) {
            $query->whereYear('created_at', '=', $this->tahun);
        }

        $data = $query->get();
        $newDiterima = $data->where('status_pendaftaran', 5)->count();
        $newDitolak = $data->where('status_pendaftaran', 6)->count();
        $newTotal = $data->count();

        return [
            'diterima' => $newDiterima,
            'ditolak' => $newDitolak,
            'total' => $newTotal,
        ];

    }
    // public function updatedBulan($value)
    // {
    //     $this->getData();
    // }

    // public function updatedPeriode($value)
    // {
    //     $this->getData();
    // }

    // public function updatedTahun($value)
    // {
    //     $this->getData();
    // }

}

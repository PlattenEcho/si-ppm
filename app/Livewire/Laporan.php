<?php

namespace App\Livewire;

use App\Exports\TemplateExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;
use Ramsey\Uuid\Uuid;
use App\Models\Pendaftaran;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use PhpOffice\PhpSpreadsheet\Writer as Writer;

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

    public $pendaftarans;

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
        $this->pendaftarans = $data['pendaftaran'];
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

    public function exportExcel()
    {
        if ($this->jangka_waktu == '-') {
            redirect()->to('/admin/cetak-laporan')->with('error', 'Atur filter terlebih dahulu!');
        } else {
            $inputFileType = 'Xlsx'; // Xlsx - Xml - Ods - Slk - Gnumeric - Csv
            $inputFileName = public_path('Excel/Template Rekap.xlsx');

            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
            $spreadsheet = $reader->load($inputFileName);
            $sheet = $spreadsheet->getActiveSheet();

            $rowIndex = 11;
            $nomor = 1;

            if ($this->jangka_waktu == 'bulanan') {
                $tipe = 'Bulan';
                $waktu = date('F', mktime(0, 0, 0, $this->bulan, 1));
            } else if ($this->jangka_waktu == 'periodik') {
                $tipe = 'Periode';
                $waktu = $this->periode;
            } else if ($this->jangka_waktu == 'tahunan') {
                $tipe = 'Tahun';
                $waktu = date('Y', strtotime($this->tahun . '-01-01')); // Mengambil hanya tahun
            } else {
                $tipe = 'Bulan';
                $waktu = date('F', mktime(0, 0, 0, $this->bulan, 1));
            }

            $sheet->setCellValue('A1', 'REKAP - ' . strtoupper($this->jangka_waktu));
            $sheet->setCellValue('C6', $this->diterima);
            $sheet->setCellValue('C7', $this->ditolak);
            $sheet->setCellValue('C8', $this->total);
            $sheet->setCellValue('I6', $tipe);
            $sheet->setCellValue('J6', $waktu);
            $sheet->setCellValue('J7', date('d-m-Y'));

            foreach ($this->pendaftarans as $pendaftaran) {
                $rowColor = ($rowIndex % 2 == 0) ? 'FFFFFF' : 'DDEBF7';
                $sheet->getStyle('A' . $rowIndex . ':K' . $rowIndex)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB($rowColor);

                $sheet->getStyle('A' . $rowIndex . ':K' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $sheet->getStyle('A' . $rowIndex . ':K' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN)->getColor()->setARGB('FFFFFF');
                $sheet->setCellValue('A' . $rowIndex, $nomor);
                $sheet->setCellValue('B' . $rowIndex, $pendaftaran->id_pendaftaran);
                $sheet->setCellValue('C' . $rowIndex, $pendaftaran->id_user);
                $sheet->setCellValue('D' . $rowIndex, $pendaftaran->nim);
                $sheet->setCellValue('E' . $rowIndex, $pendaftaran->jenjang);
                $sheet->setCellValue('F' . $rowIndex, $pendaftaran->universitas);
                $sheet->setCellValue('G' . $rowIndex, $pendaftaran->email);
                $sheet->setCellValue('H' . $rowIndex, $pendaftaran->no_telp);
                $sheet->setCellValue('I' . $rowIndex, $pendaftaran->getStatusAttribute());
                $sheet->setCellValue('J' . $rowIndex, $pendaftaran->getCodeLabelAttribute('bidang'));
                $sheet->setCellValue('K' . $rowIndex, $pendaftaran->periode);

                $rowIndex++;
                $nomor++;
            }

            $writer = new Xlsx($spreadsheet);

            $response = new StreamedResponse(
                function () use ($writer) {
                    $writer->save('php://output');
                }
            );
            $response->headers->set('Content-Type', 'application/vnd.ms-excel');
            $response->headers->set('Content-Disposition', 'attachment;filename="ExportScan.xlsx"');
            $response->headers->set('Cache-Control', 'max-age=0');
            return $response;
        }
    }

    public function exportPDF()
    {
        if ($this->jangka_waktu == '-') {
            redirect()->to('/admin/cetak-laporan')->with('error', 'Atur filter terlebih dahulu!');
        } else {
            $inputFileType = 'Xlsx'; // Xlsx - Xml - Ods - Slk - Gnumeric - Csv
            $inputFileName = public_path('Excel/Template Rekap_PDF1.xlsx');

            $reader = IOFactory::createReader($inputFileType);
            $spreadsheet = $reader->load($inputFileName);
            $sheet = $spreadsheet->getActiveSheet()->setShowGridLines(false);
            $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE)->setPaperSize(PageSetup::PAPERSIZE_A4);

            $rowIndex = 11;
            $nomor = 1;

            if ($this->jangka_waktu == 'bulanan') {
                $tipe = 'Bulan';
                $waktu = date('F', mktime(0, 0, 0, $this->bulan, 1));
            } else if ($this->jangka_waktu == 'periodik') {
                $tipe = 'Periode';
                $waktu = $this->periode;
            } else if ($this->jangka_waktu == 'tahunan') {
                $tipe = 'Tahun';
                $waktu = date('Y', strtotime($this->tahun . '-01-01')); // Mengambil hanya tahun
            } else {
                $tipe = 'Bulan';
                $waktu = date('F', mktime(0, 0, 0, $this->bulan, 1));
            }

            $sheet->setCellValue('A1', 'REKAP - ' . strtoupper($this->jangka_waktu));
            $sheet->setCellValue('C6', $this->diterima);
            $sheet->setCellValue('C7', $this->ditolak);
            $sheet->setCellValue('C8', $this->total);
            $sheet->setCellValue('H6', $tipe);
            $sheet->setCellValue('I6', $waktu);
            $sheet->setCellValue('I7', date('d-m-Y'));


            foreach ($this->pendaftarans as $pendaftaran) {
                $rowColor = ($rowIndex % 2 == 0) ? 'FFFFFF' : 'DDEBF7';
                $sheet->getStyle('A' . $rowIndex . ':J' . $rowIndex)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB($rowColor);

                $sheet->getStyle('A' . $rowIndex . ':J' . $rowIndex)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $sheet->getStyle('A' . $rowIndex . ':J' . $rowIndex)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN)->getColor()->setARGB('FFFFFF');

                $sheet->setCellValue('A' . $rowIndex, $nomor);
                $sheet->setCellValue('B' . $rowIndex, $pendaftaran->id_pendaftaran);
                $sheet->setCellValue('C' . $rowIndex, $pendaftaran->id_user);
                $sheet->setCellValue('D' . $rowIndex, $pendaftaran->name);
                $sheet->setCellValue('E' . $rowIndex, $pendaftaran->jenjang);
                $sheet->setCellValue('F' . $rowIndex, $pendaftaran->universitas);
                $sheet->setCellValue('G' . $rowIndex, $pendaftaran->no_telp);
                $sheet->setCellValue('H' . $rowIndex, $pendaftaran->getStatusAttribute());
                $sheet->setCellValue('I' . $rowIndex, $pendaftaran->getCodeLabelAttribute('bidang'));
                $sheet->setCellValue('J' . $rowIndex, $pendaftaran->periode);

                $rowIndex++;
                $nomor++;
            }

            IOFactory::registerWriter('Pdf', Dompdf::class);

            $writer = IOFactory::createWriter($spreadsheet, 'Pdf');
            $response = new StreamedResponse(
                function () use ($writer) {
                    $writer->save('php://output');
                }
            );
            $response->headers->set('Content-Type', 'application/pdf');
            $response->headers->set('Content-Disposition', 'attachment;filename="ExportScan.pdf"');
            $response->headers->set('Cache-Control', 'max-age=0');
            return $response;
            
        }
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
            'pendaftaran' => $data,
            'diterima' => $newDiterima,
            'ditolak' => $newDitolak,
            'total' => $newTotal,
        ];

    }

}

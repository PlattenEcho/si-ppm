<?php

namespace App\Livewire;

use App\Models\Pendaftaran;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use NcJoes\OfficeConverter\OfficeConverter;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;

class SuratPenerimaan extends ModalComponent
{
    public $pendaftaran;
    public $pendaftaranId;
    public $no_surat;
    public $kepada;
    public $fakultas_instansi;
    public $no_surat_magang;
    public $tanggal_surat_magang;
    public $loading = false;
    public $listeners = ['refresh-me' => 'render'] ;

    public function mount($pendaftaranId)
    {
        $this->pendaftaranId = $pendaftaranId;
        $this->pendaftaran = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->firstOrFail();
        $suratPenerimaan = \App\Models\SuratPenerimaan::where('id_pendaftaran', $this->pendaftaranId)->first();
        if ($suratPenerimaan) {
            $this->no_surat = $suratPenerimaan->nomor_surat;
            $this->kepada = $suratPenerimaan->kepada;
            $this->fakultas_instansi = $suratPenerimaan->fakultas_instansi;
            $this->no_surat_magang = $suratPenerimaan->no_surat_magang;
            $this->tanggal_surat_magang = Carbon::parse($suratPenerimaan->tanggal_surat_magang)->isoFormat('D MMMM Y');
        }
    }

    public function render()
    {
        $suratPenerimaan = \App\Models\SuratPenerimaan::where('id_pendaftaran', $this->pendaftaranId)->first();

        return view('livewire.surat-penerimaan', ['suratPenerimaan' => $suratPenerimaan]);
    }

    public function createSuratPenerimaan()
    {
        $this->loading = true;
        $this->validate([
            'no_surat' => 'required',
            'kepada' => 'required',
            'no_surat_magang' => 'required',
            'tanggal_surat_magang' => 'required|date',
        ]);

        $templatePath = public_path('Word\Template Surat Penerimaan.docx');
        $phpWord = new PhpWord();
        $templateProcessor = new TemplateProcessor($templatePath);
        Carbon::setLocale('id');

        $templateProcessor->setValue('nomor_surat', $this->no_surat);
        $templateProcessor->setValue('datenow', Carbon::now()->format('d F Y'));
        $templateProcessor->setValue('kepada', $this->kepada);
        $templateProcessor->setValue('fakultas_instansi', $this->fakultas_instansi);
        $templateProcessor->setValue('universitas', $this->pendaftaran->universitas);
        $templateProcessor->setValue('no_surat_magang', $this->no_surat_magang);
        $templateProcessor->setValue('tanggal_surat_magang', Carbon::parse($this->tanggal_surat_magang)->isoFormat('D MMMM Y'));
        $templateProcessor->setValue('nama', $this->pendaftaran->name);
        $templateProcessor->setValue('nim', $this->pendaftaran->nim);
        $templateProcessor->setValue('prodi', $this->pendaftaran->program_studi);
        $templateProcessor->setValue('tanggal_mulai', Carbon::parse($this->pendaftaran->tanggal_mulai)->isoFormat('D MMMM Y'));
        $templateProcessor->setValue('tanggal_akhir', Carbon::parse($this->pendaftaran->tanggal_akhir)->isoFormat('D MMMM Y'));
        Storage::makeDirectory('public/surat_penerimaan');
        $docxFilePath = 'storage/surat_penerimaan/' . $this->pendaftaran->name . '_Surat Penerimaan Diskominfo.docx';
        $templateProcessor->saveAs($docxFilePath);
        $pdfFilePath = 'storage/surat_penerimaan/' . $this->pendaftaran->name . '_Surat Penerimaan Diskominfo.pdf';
        $command = '"C:\Program Files\LibreOffice\program\soffice.exe" --headless --convert-to pdf "' . $docxFilePath . '" --outdir "' . public_path('storage/surat_penerimaan') . '"';
        shell_exec($command);
        // Delete the DOCX file
        unlink($docxFilePath);


        \App\Models\SuratPenerimaan::create([
            'id_pendaftaran' => $this->pendaftaranId,
            'nomor_surat' => $this->no_surat,
            'kepada' => $this->kepada,
            'fakultas_instansi' => $this->fakultas_instansi,
            'no_surat_magang' => $this->no_surat_magang,
            'tanggal_surat_magang' => $this->tanggal_surat_magang,
            'file' => "surat_penerimaan/" . $this->pendaftaran->name . '_Surat Penerimaan Diskominfo.pdf',
        ]);


        $this->dispatch('surat-penerimaan', pendaftaranId: $this->pendaftaranId);
        $this->loading = false;

    }

    public function editSuratPenerimaan()
    {
        $this->loading = true;
        $this->validate([
            'no_surat' => 'required',
            'kepada' => 'required',
            'no_surat_magang' => 'required',
            'tanggal_surat_magang' => 'required|date',
        ]);

        $templatePath = public_path('Word\Template Surat Penerimaan.docx');
        $phpWord = new PhpWord();
        $templateProcessor = new TemplateProcessor($templatePath);
        Carbon::setLocale('id');

        $templateProcessor->setValue('nomor_surat', $this->no_surat);
        $templateProcessor->setValue('datenow', Carbon::now()->format('d F Y'));
        $templateProcessor->setValue('kepada', $this->kepada);
        $templateProcessor->setValue('fakultas_instansi', $this->fakultas_instansi);
        $templateProcessor->setValue('universitas', $this->pendaftaran->universitas);
        $templateProcessor->setValue('no_surat_magang', $this->no_surat_magang);
        $templateProcessor->setValue('tanggal_surat_magang', Carbon::parse($this->tanggal_surat_magang)->isoFormat('D MMMM Y'));
        $templateProcessor->setValue('nama', $this->pendaftaran->name);
        $templateProcessor->setValue('nim', $this->pendaftaran->nim);
        $templateProcessor->setValue('prodi', $this->pendaftaran->program_studi);
        $templateProcessor->setValue('tanggal_mulai', Carbon::parse($this->pendaftaran->tanggal_mulai)->isoFormat('D MMMM Y'));
        $templateProcessor->setValue('tanggal_akhir', Carbon::parse($this->pendaftaran->tanggal_akhir)->isoFormat('D MMMM Y'));

        $docxFilePath = 'storage/surat_penerimaan/' . $this->pendaftaran->name . '_Surat Penerimaan Diskominfo.docx';
        $templateProcessor->saveAs($docxFilePath);

        $pdfFilePath = 'storage/surat_penerimaan/' . $this->pendaftaran->name . '_Surat Penerimaan Diskominfo.pdf';
        $command = '"C:\Program Files\LibreOffice\program\soffice.exe" --headless --convert-to pdf "' . $docxFilePath . '" --outdir "' . public_path('storage/surat_penerimaan') . '"';
        shell_exec($command);
        unlink($docxFilePath);

        $suratPenerimaan = \App\Models\SuratPenerimaan::where('id_pendaftaran', $this->pendaftaranId)->first();
        $suratPenerimaan->update([
            'nomor_surat' => $this->no_surat,
            'kepada' => $this->kepada,
            'fakultas_instansi' => $this->fakultas_instansi,
            'no_surat_magang' => $this->no_surat_magang,
            'tanggal_surat_magang' => $this->tanggal_surat_magang,
            'file' => "surat_penerimaan/" . $this->pendaftaran->name . '_Surat Penerimaan Diskominfo.pdf',
        ]);

        $this->emit('refresh-me');
    }

    public function download()
    {
        $suratPenerimaan = \App\Models\SuratPenerimaan::where('id_pendaftaran', $this->pendaftaranId)->first();

        if ($suratPenerimaan) {
            $filePath = storage_path('app/public/' . $suratPenerimaan->file);

            if (file_exists($filePath)) {
                return response()->download($filePath, $this->pendaftaran->name . '_Surat Penerimaan Diskominfo.pdf');
            } else {
                session()->flash('error', 'File not found.');
            }
        } else {
            session()->flash('error', 'Surat Penerimaan not found.');
        }

    }
}

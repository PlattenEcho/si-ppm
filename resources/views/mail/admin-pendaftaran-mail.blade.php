<x-mail::message>
# {{ $pendaftaran->id_pendaftaran }} - {{ $pendaftaran->name }} - Pendaftaran Baru

Pendaftaran baru sudah diterima.

@component('mail::table')
    | Kolom         | Nilai         | 
    |----------------------|-------------|
    | ID Pendaftaran   |  {{ $pendaftaran->id_pendaftaran }}  | 
    | Nama             |  {{ $pendaftaran->name }}            |
    | NIM              |  {{ $pendaftaran->nim }}             |
    | Jenjang          |  {{ $pendaftaran->jenjang }}         |
    | Universitas      |  {{ $pendaftaran->universitas }}     |
    | Email            |  {{ $pendaftaran->email }}           |
    | No.telp          |  {{ $pendaftaran->no_telp }}         |
    | Bidang           |{{ $pendaftaran->getCodeLabelAttribute('bidang') }}            |
@endcomponent


{{-- <x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }} --}}
</x-mail::message>
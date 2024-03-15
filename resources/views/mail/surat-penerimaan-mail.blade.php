<x-mail::message>
# Hi,  {{ $name }}

Terima kasih sudah mendaftar magang di Diskominfo Semarang. Surat Pendaftaran sudah dibuat dan dapat anda download di attachment email atau halaman cek status.

{{-- Status Pendaftaran: **{{ $status }}** --}}
<x-mail::button :url="'http://127.0.0.1:8000/pendaftaran/cek-status'">
Cek Surat
</x-mail::button>

Terima Kasih,<br>
Dinas Komunikasi, Informatika, Statistik dan Persandian <br>
Kota Semarang
</x-mail::message>

<x-mail::message>
# Hi, {{ $name }}

Terima kasih sudah mendaftar magang di Diskominfo Semarang. Jangan lupa untuk cek status pendaftaran secara berkala. Berikut adalah status pendaftaran saat ini.
<p style="text-align: center">Status Pendaftaran:
    <p style="text-align: center; font-weight: bold;">{{ $status }}</p>
</p>

{{-- Status Pendaftaran: **{{ $status }}** --}}
<x-mail::button :url="''">
Cek Status
</x-mail::button>

Terima Kasih,<br>
Dinas Komunikasi, Informatika, Statistik dan Persandian <br>
Kota Semarang
</x-mail::message>

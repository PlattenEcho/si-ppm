<x-mail::message>
# Hi, {{ $name }}

Akun sudah terdaftar, mohon verifikasi akun dengan kode berikut.
<p style="text-align: center">Kode:
    <p style="text-align: center; font-weight: bold;">{{ $kode }}</p>
</p>
<x-mail::button :url="''">
Link Verifikasi
</x-mail::button>

Terimakasih,<br>
Dinas Komunikasi, Informatika, Statistik dan Persandian <br>
Kota Semarang
</x-mail::message>

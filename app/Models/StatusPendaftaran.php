<?php

// app/Models/StatusPendaftaran.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'status_pendaftaran';

    protected $fillable = [
        'nama_status',
    ];
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'status_pendaftaran');
    }
    // Tidak ada relasi dengan tabel lain dalam contoh ini
}

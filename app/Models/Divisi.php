<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'divisi';
    public $timestamps = false;

    protected $fillable = [
        'nama_divisi',
    ];

    // Relasi dengan model Pendaftaran
    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'divisi');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;
    protected $table = 'pengaturan';
    protected $fillable = [
        'buka_tidak',
        'kuota',
        'tanggal_buka',
        'tanggal_tutup',
        'periode'
    ];

}

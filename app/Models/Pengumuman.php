<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';
    public $timestamps = false; 
    protected $fillable = [
        'title',
        'no_telp',
        'nama_kontak',
        'link',
        'image',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'idrole'; // Assuming 'idrole' is the primary key

    // Other model configurations...

    protected $fillable = [
        'nama',
    ];

    // Relationships or other methods can be added here
}

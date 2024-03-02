<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'idrole',
        'profile_completed',
        'foto',
        'kode_verifikasi'
    ];

    protected $guarded = ['id'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function getImageURL()
    {
        if ($this->foto) {
            return url("storage/" . $this->foto);
        }
        return "https://freesvg.org/img/abstract-user-flat-4.png";
    }

    public function roles()
    {
        return $this->belongsTo(Role::class, 'idrole');
    }

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'id_user');
    }



}

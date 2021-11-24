<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'avatar',
        'no_wa',
        'alamat'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function estimasies()
    {
        return $this->hasMany(Estimasi::class);
    }

    public function pengerjaans()
    {
        return $this->hasMany(Pengerjaan::class);
    }

    /* 
    function menampilkana avatar dari link,
    jika user tidak mempunyai avatar 
    */
    public function getAvatarUrl()
    {
        if ($this->avatar != null) {
            return Storage::url($this->avatar);
        } else {
            return 'https://ui-avatars.com/api/?name=' . str_replace(' ', '+', $this->first_name) .
                '&background=e29000&color=ffffff&size=100';
        }
    }
}

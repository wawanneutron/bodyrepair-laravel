<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        "users_id", "no_booking", "nopol",
        "nama_mobil", "catatan",
        "tgl_kedatangan", "status"
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function estimasies()
    {
        return $this->belongsTo(Estimasi::class, 'id', 'booking_id');
    }

    public function pengerjaan()
    {
        return $this->belongsTo(Pengerjaan::class, 'id', 'booking_id');
    }

    public function galleyPengerjaans()
    {
        return $this->hasMany(PengerjaanGallery::class, 'booking_id', 'id')
            ->orderBy('created_at', 'desc');
    }
}

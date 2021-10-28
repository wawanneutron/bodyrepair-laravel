<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengerjaan extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'booking_id', 'estimasi_id', 'status'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function pengerjaanGalleries()
    {
        return $this->hasMany(PengerjaanGallery::class);
    }

    public function estimasi()
    {
        return $this->belongsTo(Estimasi::class);
    }
}

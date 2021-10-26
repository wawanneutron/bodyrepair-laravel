<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengerjaanGallery extends Model
{
    use HasFactory;

    protected $fillable = ['pengerjaan_id', 'nama_pengerjaan', 'status'];

    public function booking()
    {
        return $this->belongsTo(Pengerjaan::class);
    }
}

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
}

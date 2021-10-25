<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimasi extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'booking_id', 'total_harga'];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'id');
    }

    public function priceLists()
    {
        return $this->belongsToMany(PriceList::class);
    }
}

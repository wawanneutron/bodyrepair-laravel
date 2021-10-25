<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
    use HasFactory;

    protected $fillable = ['kd_price_list', 'jenis_pekerjaan', 'harga'];

    public function estimasis()
    {
        return $this->belongsToMany(Estimasi::class);
    }
}

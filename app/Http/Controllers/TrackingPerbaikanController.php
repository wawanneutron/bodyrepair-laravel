<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Pengerjaan;
use App\Models\PengerjaanGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackingPerbaikanController extends Controller
{
    public function tracking(Request $request)
    {
        try {
            //code...
            $trackings = Booking::with('users', 'estimasies', 'pengerjaan', 'galleyPengerjaans')
                ->where('no_booking', $request->tracking)
                ->get();
        } catch (\Exception $e) {
            return view('pages.success');
        }
        return view('pages.tracking', compact('trackings'));
    }
}

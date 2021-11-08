<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class TrackingPerbaikanController extends Controller
{
    public function tracking(Request $request)
    {
        $this->validate($request, [
            'tracking' => 'required|exists:App\Models\Booking,no_booking'
        ]);
        $trackings = Booking::with('users', 'estimasies', 'pengerjaan', 'galleyPengerjaans')
            ->where('no_booking', $request->tracking)
            ->get();

        return view('pages.tracking', compact('trackings'));
    }
}

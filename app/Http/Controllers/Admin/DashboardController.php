<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookingDiterima = Booking::where('status', 'diterima')->count();
        $bookingDitunda = Booking::where('status', 'ditunda')->count();

        return view('pages.dashboard-admin.dashboard', [
            'diterima' => $bookingDiterima,
            'ditunda'  => $bookingDitunda
        ]);
    }
}

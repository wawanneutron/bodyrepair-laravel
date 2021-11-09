<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Pengerjaan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookingDiterima = Booking::where('status', 'diterima')->count();
        $bookingDitunda = Booking::where('status', 'ditunda')->count();
        $pengerjaanSelesai = Pengerjaan::where('status', 'selesai')->count();
        $pengerjaanDikerjakan = Pengerjaan::where('status', 'proses')->count();

        return view('pages.dashboard-admin.dashboard', [
            'diterima' => $bookingDiterima,
            'ditunda'  => $bookingDitunda,
            'selesai' => $pengerjaanSelesai,
            'proses' => $pengerjaanDikerjakan,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Estimasi;
use App\Models\PriceList;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function jenisPekerjaan()
    {
        $priceList = PriceList::all();
        $pdf = PDF::loadView('pages.dashboard-admin.laporan.laporan-pricelist', [
            'data' => $priceList
        ]);
        return $pdf->download('laporan-pricelist.pdf');
    }

    public function bookingMasuk()
    {
        $booking = Booking::all();
        $pdf = PDF::loadView('pages.dashboard-admin.laporan.laporan-booking-masuk', [
            'data' => $booking
        ]);
        return $pdf->download('laporan-booking-masuk.pdf');
    }

    public function estimasi($id)
    {
        $estimasiBooking = Estimasi::findOrFail($id);
        $subTotal = $estimasiBooking->priceLists()->sum('harga');

        $pdf = PDF::loadView('pages.dashboard-admin.laporan.laporan-estimasi', [
            'estimasi' => $estimasiBooking,
            'subtotal' => $subTotal
        ])->setPaper('a4', 'landscape');

        return $pdf->download('laporan-estimasi-harga.pdf');
    }
}

/* gunakan stream untuk preview dan download untuk mendownload */
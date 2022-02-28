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
        $subTotal = $estimasiBooking->total_harga;

        $pdf = PDF::loadView('pages.dashboard-admin.laporan.laporan-estimasi', [
            'estimasi' => $estimasiBooking,
            'subtotal' => $subTotal
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-estimasi-harga.pdf');
    }

    public function inputPeriodik()
    {
        return view('pages.dashboard-admin.laporan.laporan-periodik');
    }

    public function printReport(Request $request)
    {
        $estimasiBooking = Estimasi::whereBetween('created_at', [
            $request->startDate,
            $request->endDate
        ])->get();
        // dd($estimasiBooking);
        $subTotal = $estimasiBooking->sum('total_harga');

        $pdf = PDF::loadView('pages.dashboard-admin.laporan.laporan-print-periodik', [
            'estimasies' => $estimasiBooking,
            'subtotal' => $subTotal
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-periodik.pdf');
    }
}

/* gunakan stream untuk preview dan download untuk mendownload */
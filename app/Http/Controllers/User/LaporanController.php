<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Estimasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class LaporanController extends Controller
{
    public function laporanEstimasi($id)
    {
        $estimasiBooking = Estimasi::findOrFail($id);
        $subTotal = $estimasiBooking->priceLists()->sum('harga');

        $pdf = PDF::loadView('pages.dashboard-user.laporan.laporan-estimasi', [
            'estimasi' => $estimasiBooking,
            'subtotal' => $subTotal
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-estimasi-harga.pdf');
    }
    /* gunakan stream untuk preview dan download untuk mendownload */
}

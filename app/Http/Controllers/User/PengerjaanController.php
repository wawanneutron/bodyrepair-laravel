<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengerjaan;
use App\Models\PengerjaanGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengerjaanController extends Controller
{
    public function index()
    {
        $pengerjaan = Pengerjaan::where('users_id', Auth::user()->id)->get();

        return view('pages.dashboard-user.pengerjaan.index', compact('pengerjaan'));
    }

    public function details($id)
    {
        $detailPengerjaan = Pengerjaan::findOrFail($id);
        $subTotal = $detailPengerjaan->estimasi->priceLists()->sum('harga');
        $dataPengerjaan = PengerjaanGallery::where('pengerjaan_id', $detailPengerjaan->id)->get();

        return view('pages.dashboard-user.pengerjaan.detail', [
            'pengerjaan'       => $detailPengerjaan,
            'subtotal'         => $subTotal,
            'dataPengerjaan'   => $dataPengerjaan
        ]);
    }
}

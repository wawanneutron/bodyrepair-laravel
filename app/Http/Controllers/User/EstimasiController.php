<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Estimasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstimasiController extends Controller
{
    public function index()
    {
        $estimasies = Estimasi::where('users_id', Auth::user()->id)->get();

        return view('pages.dashboard-user.estimasi.index', compact('estimasies'));
    }

    public function details($id)
    {
        $detailEstimasi = Estimasi::findOrFail($id);
        $subtotal = $detailEstimasi->priceLists()->sum('harga');

        return view('pages.dashboard-user.estimasi.detail', compact('detailEstimasi', 'subtotal'));
    }
}

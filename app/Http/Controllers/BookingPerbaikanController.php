<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BookingPerbaikanController extends Controller
{
    public function index()
    {
        return view('pages.booking');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nopol'          => 'required',
            'nama_mobil'     => 'required',
            'catatan'        => 'required',
            'tgl_kedatangan' => 'required'
        ]);
        /**
         * algorithm create no invoice
         */
        $length = 7;
        $random = '';
        for ($i = 0; $i < $length; $i++) {
            $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
        }
        $noBooking = 'MBS-' . Str::upper($random);

        $data = Booking::create([
            'users_id'       => Auth::user()->id,
            'no_booking'     => $noBooking,
            'nopol'          => $request->nopol,
            'nama_mobil'     => $request->nama_mobil,
            'tgl_kedatangan' => $request->tgl_kedatangan,
            'catatan'        => $request->catatan,
        ]);
        return redirect()->route('success', Auth::user()->id);
    }

    public function success()
    {
        return view('pages.success');
    }
}

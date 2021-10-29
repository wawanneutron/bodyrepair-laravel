<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function booking()
    {
        $infoBooking = Booking::where('users_id', Auth::user()->id)->get();
        return view('pages.dashboard-user.booking.index', compact('infoBooking'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "nopol"             => 'required',
            "nama_mobil"        => 'required',
            "catatan"           => 'required',
            "tgl_kedatangan"    => 'required'
        ]);

        $infoBooking = Booking::findOrFail($id);

        $infoBooking->update([
            "nopol"             => $request->nopol,
            "nama_mobil"        => $request->nama_mobil,
            "catatan"           => $request->catatan,
            "tgl_kedatangan"    => $request->tgl_kedatangan
        ]);

        if ($infoBooking) {
            return redirect()->route('info-booking')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            return redirect()->route('info-booking')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
}

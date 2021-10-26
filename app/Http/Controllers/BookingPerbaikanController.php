<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Estimasi;
use App\Models\Pengerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingPerbaikanController extends Controller
{
    public function index()
    {
        return view('pages.booking');
    }

    public function store(BookingRequest $request)
    {
        DB::transaction(function () {
            /**
             * algorithm create no invoice
             */
            $length = 7;
            $random = '';
            for ($i = 0; $i < $length; $i++) {
                $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
            }
            $noBooking = 'MBS-' . Str::upper($random);
            $request = Request();
            $data = Booking::create([
                'users_id'       => Auth::user()->id,
                'no_booking'     => $noBooking,
                'nopol'          => $request->nopol,
                'nama_mobil'     => $request->nama_mobil,
                'tgl_kedatangan' => $request->tgl_kedatangan,
                'catatan'        => $request->catatan,
            ]);
            Estimasi::create([
                'users_id'      => Auth::user()->id,
                'booking_id'    => $data->id,
            ]);

            Pengerjaan::create([
                'users_id' => $data->users_id,
                'booking_id' => $data->id,
            ]);
        });
        return redirect()->route('success', Auth::user()->id);
    }

    public function success()
    {
        return view('pages.success');
    }
}

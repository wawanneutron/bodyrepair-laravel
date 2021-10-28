<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Pengerjaan;
use App\Models\PengerjaanGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookingMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::with('users')->get();
        return view('pages.dashboard-admin.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);
        $updateStatus = Booking::findOrFail($id);
        $updateStatus->update([
            'status'    => $request->status
        ]);
        if ($updateStatus) {
            return redirect()->route('dashboard.booking-masuk.index')
                ->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            return redirect()->route('dashboard.booking-masuk.index')
                ->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookingDelete = Booking::findOrFail($id);
        $deleteEstimasi = $bookingDelete->estimasies()->delete();

        $pengerjaan = Pengerjaan::where('booking_id', $bookingDelete->id)
            ->where('booking_id', $bookingDelete->id)
            ->delete();
        $galleries = PengerjaanGallery::where('booking_id', $bookingDelete->id)->get();
        foreach ($galleries as $image) {
            Storage::disk('local')->delete('public/' . $image->images);
            $image->delete();
        }

        $bookingDelete->delete();

        if ($bookingDelete || $deleteEstimasi || $galleries || $pengerjaan) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
            ], 500);
        }
    }
}

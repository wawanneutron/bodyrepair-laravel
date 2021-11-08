<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estimasi;
use App\Models\Pengerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EstimasiBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estimasiBooking = Estimasi::with(['users', 'booking'])->get();

        return view('pages.dashboard-admin.estimasi.index', [
            'estimasies' => $estimasiBooking,
        ]);
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
    public function store(Request $request, $id)
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
        $estimasiBooking = Estimasi::findOrFail($id);
        dd($estimasiBooking);
        $subTotal = $estimasiBooking->priceLists()->sum('harga');

        return view('pages.dashboard-admin.estimasi.edit', [
            'estimasi' => $estimasiBooking,
            'subtotal' => $subTotal
        ]);
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
        $data = Estimasi::findOrFail($id);
        $pengerjaan = Pengerjaan::where('estimasi_id', $data->id)->first();

        $data->priceLists()->sync($request->get('listPekerjaan'));

        $data->update([
            'users_id' => $data->users_id,
            'booking_id' => $data->booking_id,
            'total_harga' => $data->priceLists()->sum('harga') +
                hitungPajak($data->priceLists()->sum('harga'))
        ]);

        $pengerjaan->update([
            'status' => 'proses'
        ]);

        $data->save();


        if ($data) {
            return redirect()->route('dashboard.estimasi-booking.edit', $data->id)
                ->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('dashboard.estimasi-booking.edit', $data->id)
                ->with(['error' => 'Data Gagal Disimpan!']);
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
        //
    }
}

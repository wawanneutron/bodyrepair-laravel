<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengerjaan;
use App\Models\PengerjaanGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengerjaan::with(['users', 'booking'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pages.dashboard-admin.pengerjaan.index', compact('data'));
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
        $pengerjaan = Pengerjaan::findOrFail($id);
        $subtotal = $pengerjaan->estimasi->priceLists()->sum('harga');
        $dataPengerjaan = PengerjaanGallery::where('pengerjaan_id', $pengerjaan->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.dashboard-admin.pengerjaan.edit', compact(
            'pengerjaan',
            'subtotal',
            'dataPengerjaan'
        ));
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
        //
    }

    public function createHistory(Request $request, $id)
    {
        $pengerjaan = Pengerjaan::find($id);
        $image = $request->file('images')->store('history-images', 'public');

        $data = PengerjaanGallery::create([
            'pengerjaan_id' => $pengerjaan->id,
            'booking_id' => $pengerjaan->booking_id,
            'nama_pengerjaan' => $request->nama_pengerjaan,
            'images' => $image,
            'status' => 'proses'
        ]);

        if ($data || $image) {
            return redirect()->route('dashboard.pengerjaan-bodyrepair.edit', $pengerjaan->id)
                ->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('dashboard.pengerjaan-bodyrepair.edit', $pengerjaan->id)
                ->with(['error' => 'Data Gagal Disimpan!']);
        }
    }


    public function updateStatus(Request $request, $id)
    {
        $pengerjaan = Pengerjaan::find($id);

        $pengerjaan->update([
            'status' => $request->status
        ]);

        if ($pengerjaan) {
            return redirect()->route('dashboard.pengerjaan-bodyrepair.edit', $pengerjaan->id)
                ->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('dashboard.pengerjaan-bodyrepair.edit', $pengerjaan->id)
                ->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function statusGalleryPengerjaan(Request $request, $id)
    {
        $this->validate($request, [
            'nama_pengerjaan' => 'required'
        ]);

        $pengerjaanGallery = PengerjaanGallery::find($id);

        $pengerjaanGallery->update([
            'nama_pengerjaan' => $request->nama_pengerjaan,
            'status' => $request->status
        ]);

        if ($pengerjaanGallery) {
            return redirect()->route('dashboard.pengerjaan-bodyrepair.edit', $pengerjaanGallery->pengerjaan_id)
                ->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('dashboard.pengerjaan-bodyrepair.edit', $pengerjaanGallery->pengerjaan_id)
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
        $pengerjaan = PengerjaanGallery::findOrFail($id);
        Storage::disk('local')->delete('public/' . $pengerjaan->images);

        $pengerjaan->delete();

        if ($pengerjaan) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}

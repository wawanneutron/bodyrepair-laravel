<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PriceList;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priceList = PriceList::all();
        return view('pages.dashboard-admin.price-list.index', compact('priceList'));
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
        $this->validate($request, [
            'jenis_pekerjaan' => 'required',
            'harga' => 'required'
        ]);
        /* algorithm kode generate */
        $length = 7;
        $rand = '';
        for ($i = 0; $i < $length; $i++) {
            $rand .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
        }
        $kodeListHarga = 'KPL-' . Str::upper($rand); //KPL : Kode Price List

        $dataList = PriceList::create([
            'kd_price_list' => $kodeListHarga,
            'jenis_pekerjaan' => $request->jenis_pekerjaan,
            'harga' => $request->harga
        ]);

        if ($dataList) {
            return redirect()->route('dashboard.price-list.index')
                ->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('dashboard.price-list.index')
                ->with(['error' => 'Data Gagal Disimpan!']);
        }
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
        // $data = PriceList::findOrFail($id);
        // return view('pages.dashboard-admin.price-list.index', compact('data'));
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
            'jenis_pekerjaan' => 'required',
            'harga' => 'required'
        ]);

        $dataList = PriceList::findOrFail($id);
        $dataList->update([
            'jenis_pekerjaan' => $request->jenis_pekerjaan,
            'harga' => $request->harga
        ]);

        if ($dataList) {
            return redirect()->route('dashboard.price-list.index')
                ->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            return redirect()->route('dashboard.price-list.index')
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
        //
    }
}

@extends('layouts.dashboard-user.app')
@section('content')
    <div class="container-fluid">
        <br>
        <div>
            @if ($detailEstimasi->total_harga)
                <div class="alert alert-info mt-5">Customer sudah melakukan <strong>pengecekan</strong> </div>
            @else
                <div class="alert alert-danger mt-5">Anda belum melakukan pengecekan kendaraan, silahkan datang sesuai dengan tanggal kedatangan</div>
            @endif
            <a href="{{ route('laporan-estimasi-customer', $detailEstimasi->id) }}" class="btn btn-sm btn-primary float-end ">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Download Pdf
            </a>
        </div>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Customer Booking No#<strong>{{ $detailEstimasi->booking->no_booking }}</strong> </h1>
        <div class="card  mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Booking Customer</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-1">Nama Pemilik</div>
                        <div class=" text-black-50 mb-2">{{ $detailEstimasi->users->first_name }} {{ $detailEstimasi->users->last_name }}</div>
                        <div class="mb-1">No Whatsapp / Handphone</div>
                        <div class=" text-black-50 mb-2">{{ $detailEstimasi->users->no_wa }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-1">Email</div>
                        <div class=" text-black-50 mb-2">{{ $detailEstimasi->users->email }}</div>
                        <div class="mb-1">Alamat</div>
                        <div class=" text-black-50 mb-2">{{ $detailEstimasi->users->alamat }}</div>

                    </div>
                    <div class="col-md-4">
                        <div class="mb-1">Nomor Polisi</div>
                        <div class=" text-black-50 mb-2">{{ $detailEstimasi->booking->nopol }}</div>
                        <div class="mb-1">Nama Mobil</div>
                        <div class=" text-black-50 mb-2">{{ $detailEstimasi->booking->nama_mobil }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-1">Tanggal Booking</div>
                        <div class=" text-black-50 mb-2">{{ $detailEstimasi->booking->created_at }}</div>
                        <div class="mb-1">Tanggal Kedatangan</div>
                        <div class=" text-black-50 mb-2">{{ dateID($detailEstimasi->booking->tgl_kedatangan) }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-1">Catatan</div>
                        <div class=" text-black-50 mb-2">{{ $detailEstimasi->booking->catatan }}</div>
                        <div class="mb-1">Total Perbaikan</div>
                        @if ($detailEstimasi->total_harga)
                            {{ moneyFormat($detailEstimasi->total_harga) }}
                        @else
                            <span class="badge badge-pill badge-danger">Not check-in</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jenis perbaikan pada kendaraan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm table-hover">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">No</th>
                                <th>Kode</th>
                                <th>Jenis Pekerjaan</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailEstimasi->priceLists as $index => $list)
                                <tr>
                                    <td class="center">{{ $index + 1 }}</td>
                                    <td class="left strong">{{ $list->kd_price_list }}</td>
                                    <td class="left">{{ $list->jenis_pekerjaan }}</td>
                                    <td class="right" width="17%">{{ moneyFormat($list->harga) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-5">
                    </div>
                    <div class="col-md-4 col-sm-5 ml-auto">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>Subtotal</strong>
                                    </td>
                                    <td class="right">{{ moneyFormat($subtotal) }}</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>PPN (10%)</strong>
                                    </td>
                                    <td class="right">{{ moneyFormat(hitungPajak($subtotal)) }}</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong>{{ moneyFormat($subtotal + hitungPajak($subtotal)) }}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

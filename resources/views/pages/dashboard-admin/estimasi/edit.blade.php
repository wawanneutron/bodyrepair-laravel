@extends('layouts.dashboard-admin.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#" class="btn btn-sm btn-primary ml-auto shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Download Laporan
            </a>
        </div>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Estimasi Booking NO#<strong>{{ $estimasi->booking->no_booking }}</strong> </h1>
        <div class="alert alert-info">menentukan kerusakan dan menghitung estimasi harga kerusakan</div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Booking Kerusakan</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-header">Nama Pemilik</div>
                        <div class="text-subheader">{{ $estimasi->users->first_name }} {{ $estimasi->users->last_name }}</div>
                        <div class="text-header">No Whatsapp / Handphone</div>
                        <div class="text-subheader">{{ $estimasi->users->no_wa }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-header">Email</div>
                        <div class="text-subheader">{{ $estimasi->users->email }}</div>
                        <div class="text-header">Alamat</div>
                        <div class="text-subheader">{{ $estimasi->users->alamat }}</div>

                    </div>
                    <div class="col-md-4">
                        <div class="text-header">Nomor Polisi</div>
                        <div class="text-subheader">{{ $estimasi->booking->nopol }}</div>
                        <div class="text-header">Nama Mobil</div>
                        <div class="text-subheader">{{ $estimasi->booking->nama_mobil }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-header">Tanggal Booking</div>
                        <div class="text-subheader">{{ $estimasi->booking->created_at }}</div>
                        <div class="text-header">Tanggal Kedatangan</div>
                        <div class="text-subheader">{{ dateID($estimasi->booking->tgl_kedatangan) }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-header">Catatan</div>
                        <div class="text-subheader">{{ $estimasi->booking->catatan }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-header">Total Perbaikan</div>
                        @if ($estimasi->total_harga)
                            {{ moneyFormat($estimasi->total_harga) }}
                        @else
                            <span class="badge badge-pill badge-danger">Not check-in</span>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="text-header">Status</div>
                        @if ($estimasi->total_harga)
                            <div class="alert alert-info">Customer sudah melakukan <strong>pengecekan</strong> </div>
                        @else
                            <div class="alert alert-danger">Customer belum melakukan pengecekan kendaraan ke lokasi</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

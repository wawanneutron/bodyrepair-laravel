@extends('layouts.dashboard-admin.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Booking Masuk</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            {{-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Booking</th>
                                <th>Nama Mobil</th>
                                <th>No Polisi</th>
                                <th>Tanggal Kedatangan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->no_booking }}</td>
                                    <td>{{ $booking->nama_mobil }}</td>
                                    <td>{{ $booking->nopol }}</td>
                                    <td>{{ dateID($booking->tgl_kedatangan) }}</td>
                                    <td>
                                        <span class=" badge bg-gradient-primary text-light">{{ $booking->status }}</span>
                                    </td>
                                    <td>
                                        <a href="#" class=" btn btn-sm btn-secondary"><i class="far fa-edit mr-2"></i>ubah</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

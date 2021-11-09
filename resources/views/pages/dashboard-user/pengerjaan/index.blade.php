@extends('layouts.dashboard-user.app')
@section('content')
    <!-- section content -->
    <div class="info-booking container">
        <div class="text-header">
            <h3>Tracking Satatus Pengerjaan Kendarann Anda</h3>
        </div>
        <table class="table table-light" id="dataTable" width="100%" cellspacing="0">
            <thead height="60" class=" align-middle">
                <tr>
                    <th>Kode Booking</th>
                    <th>Customer</th>
                    <th>Nama Kendaraan</th>
                    <th>No Polisi</th>
                    <th>Tanggal Booking</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <thead>
                @forelse ($pengerjaan as $item)
                    <tr>
                        <td class=" align-middle">{{ $item->booking->no_booking }}</td>
                        <td class=" align-middle">{{ $item->users->first_name }} {{ $item->users->last_name }}</td>
                        <td class=" align-middle">{{ $item->booking->nama_mobil }}</td>
                        <td class=" align-middle">{{ $item->booking->nopol }}</td>
                        <td class=" align-middle">{{ dateID($item->booking->tgl_kedatangan) }}</td>
                        <td class=" align-middle">
                            @if ($item->status == 'proses')
                                <span class="btn btn-sm btn-warning"> <i class="fas fa-cog fa-spin me-1"></i>pengerjaan</span>
                            @elseif($item->status == 'selesai')
                                <span class="btn btn-sm btn-success"> <i class="fas fa-check-circle me-1"></i>selesai</span>
                            @else
                                <span class="btn btn-sm btn-danger"><i class="fas fa-exclamation-circle me-1"></i>{{ $item->status }}</span>
                            @endif
                        </td>
                        <td width="15%" class="align-middle">
                            <a href="{{ route('detail-pengerjaan', $item->id) }}" class=" btn btn-sm btn-primary">
                                <i class="fa fa-eye me-2"></i>detail
                            </a>
                        </td>
                    </tr>
                    {{-- @if ($item->booking->estimasies->total_harga !== 0)
                    @endif --}}
                @empty
                    <div class="alert alert-danger">Data tracking belum ada</div>
                @endforelse
            </thead>
        </table>
    </div>
@endsection

@extends('layouts.dashboard-user.app')
@section('content')
    <!-- section content -->
    <div class="info-booking container">
        <div class="text-header">
            <h3>Estimasi Harga Perbaikan</h3>
        </div>
        <table class="table table-light" id="dataTable" width="100%" cellspacing="0">
            <thead height="60" class=" align-middle">
                <tr>
                    <th>Kode Booking</th>
                    <th>Customer</th>
                    <th>Nopol</th>
                    <th>Nama Mobil</th>
                    <th>Total Harga</th>
                    <th>status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($estimasies as $item)
                    <tr>
                        <td class="align-middle">{{ $item->booking->no_booking }}</td>
                        <td class="align-middle">{{ $item->users->first_name }} {{ $item->users->last_name }}</td>
                        <td class="align-middle">{{ $item->booking->nopol }}</td>
                        <td class="align-middle">{{ $item->booking->nama_mobil }}</td>
                        <td class="align-middle">
                            @if ($item->total_harga)
                                {{ moneyFormat($item->total_harga) }}
                            @else
                                <span class="badge badge-pill bg-danger">Not check-in</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if ($item->booking->status == 'ditunda')
                                <span class=" badge badge-pill  bg-primary text-light">{{ $item->booking->status }}</span>
                            @else
                                <span class=" badge badge-pill  bg-success text-light">{{ $item->booking->status }}</span>
                            @endif
                        </td>
                        <td width="15%" class="align-middle">
                            <a href="{{ route('detail-estimasi', $item->id) }}" class=" btn btn-sm btn-primary">
                                <i class="fa fa-eye me-2"></i>detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">Data estimasi belum ada</div>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

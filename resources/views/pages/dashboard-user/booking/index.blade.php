@extends('layouts.dashboard-user.app')
@section('content')
    <!-- section content -->
    <div class="info-booking container">
        <div class="text-header">
            <h3>Info Booking</h3>
        </div>
        <table class="table  table-light" id="dataTable" width="100%" cellspacing="0">
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
            <tbody>
                @foreach ($infoBooking as $booking)
                    <tr>
                        <td class=" align-middle">{{ $booking->no_booking }}</td>
                        <td class=" align-middle">{{ $booking->users->first_name }} {{ $booking->users->last_name }}</td>
                        <td class=" align-middle">{{ $booking->nama_mobil }}</td>
                        <td class=" align-middle">{{ $booking->nopol }}</td>
                        <td class=" align-middle">{{ dateID($booking->created_at) }}</td>
                        <td class=" align-middle">
                            @if ($booking->status == 'ditunda')
                                <span class=" badge badge-pill  bg-primary text-light">{{ $booking->status }}</span>
                            @else
                                <span class=" badge badge-pill  bg-success text-light">{{ $booking->status }}</span>
                            @endif
                        </td>
                        <td class=" align-middle">
                            <button type="button" class=" btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#editModal{{ $booking->id }}"><i class="far fa-edit mr-2"></i>ubah</button>
                        </td>
                    </tr>
                    {{-- modal edit --}}
                    <div class="modal fade" id="editModal{{ $booking->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">No Booking <strong>{{ $booking->no_booking }}</strong> </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('info-booking-update', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label small">No Polisi:</label>
                                                    <input type="text" value="{{ $booking->nopol }}" name="nopol" class="form-control @error('nopol') is_invalid @enderror" id="recipient-name">
                                                    @error('nopol')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label small">Nama Kendaraan:</label>
                                                    <input type="text" value="{{ $booking->nama_mobil }}" name="nama_mobil" class="form-control @error('nama_mobil') is_invalid @enderror"
                                                           id="recipient-name">
                                                    @error('nama_mobil')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label small">Tanggal Kedatangan:</label>
                                                    <input type="date" value="{{ $booking->tgl_kedatangan }}" name="tgl_kedatangan" class="form-control @error('tgl_kedatangan') in-valid @enderror"
                                                           id="recipient-name">
                                                    @error('tgl_kedatangan')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1" class="form-label small">Tambahkan Catatan Perbaikan</label>
                                                    <textarea class="form-control" name="catatan" value="{{ old('catatan') }}" class="form-control @error('catatan') is-invalid @enderror"
                                                              id="exampleFormControlTextarea1" rows="3">{{ $booking->catatan }}</textarea>
                                                    @error('catatan')
                                                        <div class="alert alert-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end modal edit --}}
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

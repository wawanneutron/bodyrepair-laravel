@extends('layouts.dashboard-admin.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('laporan-booking-masuk') }}" class="btn btn-sm btn-primary ml-auto shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Download Laporan
            </a>
        </div>
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
                                <th>Customer</th>
                                <th>Nama Kendaraan</th>
                                <th>No Polisi</th>
                                <th>Tanggal Booking</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->no_booking }}</td>
                                    <td>{{ $booking->users->first_name }} {{ $booking->users->last_name }}</td>
                                    <td>{{ $booking->nama_mobil }}</td>
                                    <td>{{ $booking->nopol }}</td>
                                    <td>{{ dateID($booking->created_at) }}</td>
                                    <td>
                                        @if ($booking->status == 'ditunda')
                                            <span class=" badge badge-pill  bg-primary text-light">{{ $booking->status }}</span>
                                        @else
                                            <span class=" badge badge-pill  bg-success text-light">{{ $booking->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class=" btn btn-sm btn-secondary" data-toggle="modal" data-target="#editModal{{ $booking->id }}"><i
                                               class="far fa-edit mr-2"></i>ubah</button>
                                        <button onclick="Delete(this.id)" id="{{ $booking->id }}" class=" btn btn-sm btn-danger"><i class="fa fa-trash mr-2"></i>hapus</button>
                                    </td>
                                </tr>
                                {{-- modal edit --}}
                                <div class="modal fade" id="editModal{{ $booking->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">No Booking <strong>{{ $booking->no_booking }}</strong> </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('dashboard.booking-masuk.update', $booking->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">No Polisi:</label>
                                                        <input type="text" value="{{ $booking->nopol }}" class="form-control" disabled id="recipient-name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Nama Kendaraan:</label>
                                                        <input type="text" value="{{ $booking->nama_mobil }}" class="form-control" disabled id="recipient-name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Status:</label>
                                                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                                                            <option selected disabled>--pilih status diterima--</option>
                                                            <option value="diterima">diterima</option>
                                                            <option value="ditunda">ditunda</option>
                                                        </select>
                                                        @error('status')
                                                            <div class="alert alert-danger mt-1">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
            </div>
        </div>

    </div>
@endsection
@push('addon-script')
    <script>
        //ajax delete switalert
        function Delete(id) {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");
            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    //ajax delete
                    jQuery.ajax({
                        url: "{{ route('dashboard.booking-masuk.index') }}/" + id,
                        data: {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function(response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    // timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: true,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });
                } else {
                    return true;
                }
            })
        }
    </script>
@endpush

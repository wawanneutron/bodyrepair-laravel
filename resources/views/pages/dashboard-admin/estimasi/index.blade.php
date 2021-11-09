@extends('layouts.dashboard-admin.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="#" class="btn btn-sm btn-primary ml-auto shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Download Laporan
            </a>
        </div> --}}
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Estimasi Booking Customer</h1>
        <div class="alert alert-info">menentukan kerusakan dan estimasi harga kerusakan</div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Estimasi Harga Perbaikan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
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
                                @if ($item->booking->status === 'diterima')
                                    <tr>
                                        <td>{{ $item->booking->no_booking }}</td>
                                        <td>{{ $item->users->first_name }} {{ $item->users->last_name }}</td>
                                        <td>{{ $item->booking->nopol }}</td>
                                        <td>{{ $item->booking->nama_mobil }}</td>
                                        <td>
                                            @if ($item->total_harga)
                                                {{ moneyFormat($item->total_harga) }}
                                            @else
                                                <span class="badge badge-pill badge-danger">Not check-in</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->booking->status == 'ditunda')
                                                <span class=" badge badge-pill  bg-primary text-light">{{ $item->booking->status }}</span>
                                            @else
                                                <span class=" badge badge-pill  bg-success text-light">{{ $item->booking->status }}</span>
                                            @endif
                                        </td>
                                        <td width="15%">
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Aksi
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a href="{{ route('dashboard.estimasi-booking.edit', $item->id) }}" class=" btn btn-sm btn-primary dropdown-item ">
                                                        <i class="far fa-edit mr-2"></i>ubah
                                                    </a>
                                                    <button onclick="Delete(this.id)" id="{{ $item->id }}" class=" btn btn-sm btn-danger dropdown-item "><i class="fa fa-trash mr-2"></i>hapus</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <div class="alert alert-danger">Tidak ada list harga</div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    {{-- modal input --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah list harga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dashboard.price-list.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Jenis Pekerjaan:</label>
                            <input type="text" name="jenis_pekerjaan" value="{{ old('jenis_pekerjaan') }}" class="form-control @error('jenis_pekerjaan') is_invalid @enderror" id="recipient-name">
                            @error('jenis_pekerjaan')
                                <div class="alert alert-danger mt-1" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Harga:</label>
                            <input type="number" name="harga" value="{{ old('harga') }}" class="form-control @error('harga') is_invalid @enderror" id="recipient-name">
                            @error('harga')
                                <div class="alert alert-danger mt-1" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    {{-- script sweetalert --}}
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
                        url: "{{ route('dashboard.price-list.index') }}/" + id,
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
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
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

@extends('layouts.dashboard-admin.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Input Pengerjaan Body Repair</h1>
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
                        <thead>
                            @forelse ($data as $item)
                                @if ($item->booking->estimasies->total_harga !== 0)
                                    <tr>
                                        <td>{{ $item->booking->no_booking }}</td>
                                        <td>{{ $item->users->first_name }} {{ $item->users->last_name }}</td>
                                        <td>{{ $item->booking->nama_mobil }}</td>
                                        <td>{{ $item->booking->nopol }}</td>
                                        <td>{{ dateID($item->booking->tgl_kedatangan) }}</td>
                                        <td>
                                            @if ($item->status == 'proses')
                                                <span class="btn btn-sm btn-info"> <i class="fas fa-cog fa-spin mr-1"></i>pengerjaan</span>
                                            @else
                                                <span class="btn btn-sm btn-success"><i class="fas fa-check-circle mr-1"></i>selesai</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    Aksi
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a href="{{ route('dashboard.pengerjaan-bodyrepair.edit', $item->id) }}" class=" btn btn-sm btn-primary dropdown-item ">
                                                        <i class="far fa-edit mr-2"></i>ubah
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <div class="alert alert-danger">Data belum ada</div>
                            @endforelse
                        </thead>
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

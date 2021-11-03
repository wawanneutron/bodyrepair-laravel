@extends('layouts.dashboard-user.app')
@section('content')
    <div class="container-fluid">
        <br>
        <div>
            @if ($pengerjaan->status == 'proses')
                <div class="alert alert-info mt-5">Kendaraan Anda sedang dalam <strong>pengerjaan</strong> </div>
            @elseif($pengerjaan->status == 'selesai')
                <div class="alert alert-success mt-5">Kendaraan Anda sudah <strong>Selesai</strong> dikerjakan, silahkan melakukan pembayaran</div>
            @endif
        </div>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Customer Booking No#<strong>{{ $pengerjaan->booking->no_booking }}</strong> </h1>
        <div class="card  mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Booking Customer</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-header">Nama Pemilik</div>
                        <div class="text-subheader">{{ $pengerjaan->users->first_name }} {{ $pengerjaan->users->last_name }}</div>
                        <div class="text-header">No Whatsapp / Handphone</div>
                        <div class="text-subheader">{{ $pengerjaan->users->no_wa }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-header">Email</div>
                        <div class="text-subheader">{{ $pengerjaan->users->email }}</div>
                        <div class="text-header">Alamat</div>
                        <div class="text-subheader">{{ $pengerjaan->users->alamat }}</div>

                    </div>
                    <div class="col-md-4">
                        <div class="text-header">Nomor Polisi</div>
                        <div class="text-subheader">{{ $pengerjaan->booking->nopol }}</div>
                        <div class="text-header">Nama Mobil</div>
                        <div class="text-subheader">{{ $pengerjaan->booking->nama_mobil }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-header">Tanggal Booking</div>
                        <div class="text-subheader">{{ $pengerjaan->booking->created_at }}</div>
                        <div class="text-header">Tanggal Kedatangan</div>
                        <div class="text-subheader">{{ dateID($pengerjaan->booking->tgl_kedatangan) }}</div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-header">Catatan</div>
                        <div class="text-subheader">{{ $pengerjaan->booking->catatan }}</div>
                        <div class="text-header">Total Perbaikan</div>
                        @if ($pengerjaan->total_harga)
                            {{ moneyFormat($pengerjaan->total_harga) }}
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
                            @foreach ($pengerjaan->estimasi->priceLists as $index => $list)
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
        <div class="card mt-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table pengerjaan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tgl Pengerjaan</th>
                                <th>Nama Pengerjaan</th>
                                <th>Gambar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <thead>
                            @forelse ($dataPengerjaan as $index => $item)
                                <tr>
                                    <td class=" align-middle">{{ $index + 1 }}</td>
                                    <td class=" align-middle">{{ $item->created_at }}</td>
                                    <td class=" align-middle">{{ $item->nama_pengerjaan }}</td>
                                    <td class=" align-middle">
                                        <img src="{{ Storage::url($item->images) }}" width="300" alt="">
                                    </td class=" align-middle">
                                    <td class="align-middle">
                                        @if ($item->status == 'proses')
                                            <span class="btn btn-sm btn-warning"> <i class="fas fa-cog fa-spin mr-1"></i>pengerjaan</span>
                                        @else
                                            <span class="btn btn-sm btn-success"><i class="fas fa-check-circle mr-1"></i>selesai</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">history pengerjaan belum ada</div>
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
                        url: "{{ route('dashboard.pengerjaan-bodyrepair.index') }}/" + id,
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

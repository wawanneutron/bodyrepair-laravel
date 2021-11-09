@extends('layouts.dashboard-admin.app')
@section('content')
    <div class="container-fluid">
        <nav>
            <div class="nav nav-tabs mb-4" id="nav-tab" role="tablist">
                <a class="nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">
                    Detail Booking Customer
                </a>
                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                    Jenis perbaikan pada kendaraan
                </a>
                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                    Update History / Status
                </a>
                <a class="nav-link active" id="nav-pengerjaan-tab" data-toggle="tab" href="#nav-pengerjaan" role="tab" aria-controls="nav-pengerjaan" aria-selected="true">
                    Tabel Pengerjaan
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="card shadow mb-4">
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
                                @if ($pengerjaan->booking->estimasies->total_harga)
                                    {{ moneyFormat($pengerjaan->estimasi->total_harga) }}
                                @else
                                    <span class="badge badge-pill badge-danger">Not check-in</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                            <div class="col-md-5 col-sm-5">
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
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Buat history pengerjaan</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('create-history', $pengerjaan->id) }}" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        @csrf
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="pengerjaan">Nama Pekerjaan</label>
                                                <input type="text" name="nama_pengerjaan" class="form-control" id="pengerjaan">
                                            </div>
                                            <div class="form-group">
                                                <label for="listPekerjaan">upload gambar</label>
                                                <input type="file" name="images" class=" form-control-file">
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                                                SIMPAN</button>
                                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i>
                                                RESET</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Update Status</h6>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('update-status', $pengerjaan->id) }}" method="POST">
                                    <div class="row">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="dikerjakan" value="proses" {{ $pengerjaan->status == 'proses' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="dikerjakan">Sedang dikerjakan</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="status" id="selesai" value="selesai" {{ $pengerjaan->status == 'selesai' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="selesai">Pengerjaan telah selsai</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                                                Update</button>
                                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i>
                                                RESET</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show active" id="nav-pengerjaan" role="tabpanel" aria-labelledby="nav-pengerjaan-tab">
                <div class="card ">
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
                                        <th>Status</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <thead>
                                    @forelse ($dataPengerjaan as $index => $item)
                                        <tr>
                                            <td class=" align-middle">{{ $index + 1 }}</td>
                                            <td class=" align-middle">{{ $item->created_at }}</td>
                                            <td class=" align-middle">{{ $item->nama_pengerjaan }}</td>
                                            <td class=" align-middle">
                                                @if ($item->status == 'proses')
                                                    <span class="btn btn-sm btn-warning"> <i class="fas fa-cog fa-spin mr-1"></i>pengerjaan</span>
                                                @else
                                                    <span class="btn btn-sm btn-success"><i class="fas fa-check-circle mr-1"></i>selesai</span>
                                                @endif
                                            </td>
                                            <td class=" align-middle">
                                                <img src="{{ Storage::url($item->images) }}" width="300" alt="">
                                            </td class=" align-middle">
                                            <td class=" align-middle">
                                                <button onclick="Delete(this.id)" id="{{ $item->id }}" class=" btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                <button class=" btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $item->id }}"><i class="far fa-edit "></i></button>
                                            </td>
                                        </tr>
                                        {{-- modal edit --}}
                                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Update status pengerjaan</strong></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('status-pengerjaan', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="status" id="proses" value="proses"
                                                                           {{ $item->status == 'proses' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="proses">Sedang dikerjakan</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="status" id="success" value="selesai"
                                                                           {{ $item->status == 'selesai' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="success">Pengerjaan telah selsai</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <label for="name">Nama Pekerjaan</label>
                                                                <input type="text" name="nama_pengerjaan" id="name" class="form-control @error('nama_pengerjaan') is_invalid @enderror"
                                                                       value="{{ $item->nama_pengerjaan }}">
                                                                @error('nama_pengerjaan')
                                                                    <div class="alert alert-danger mt-1" role="alert">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group mt-3">
                                                                <label for="img">Photo Pengerjann</label> <br>
                                                                <img src="{{ Storage::url($item->images) }}" width="200" alt="" title="{{ $item->nama_pengerjaan }}">
                                                                <input type="file" name="images" id="img">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                                <button type="reset" class="btn btn-warning">Reset</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end modal edit --}}
                                    @empty
                                        <div class="alert alert-danger">Tabel history pengerjaan belum ada silahkan update history pengerjaan </div>
                                    @endforelse
                                </thead>
                            </table>
                        </div>
                    </div>
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

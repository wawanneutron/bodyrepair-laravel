@extends('layouts.app')

@section('content')
    <div class="header" id="home">
        <div class="header-image">
            <div class="header-color"></div>
        </div>
        <div class="container">
            <div class="row title-header justify-content-center">
                <div class="col">
                    <div class="text-center">
                        <h2>Tracking Pengerjaan Kendaraan</h2>
                        <h1>MBS Auto Car And Paint</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="form-booking">
        <div class="row container-fluid justify-content-center form-pengajuan">
            <div class="col-md-10">
                <!-- Page Heading -->
                {{-- <h1 class="h3 mb-2 text-gray-800">Customer Booking No#<strong>{{ $pengerjaan->booking->no_booking }}</strong> </h1> --}}
                <div class="card  mb-4">
                    <div class="card-header  py-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#customer" type="button" role="tab" aria-controls="customer" aria-selected="true">Detail
                                    Booking</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#list" type="button" role="tab" aria-controls="list" aria-selected="false">List
                                    Perbaikan</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="false">Info
                                    Pengerjaan</button>
                            </li>
                        </ul>

                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="customer" role="tabpanel" aria-labelledby="customer-tab">
                                <div class="row">
                                    @foreach ($trackings as $tracking)
                                        <div class="col-md-4">
                                            <div class="text-header">Nama Pemilik</div>
                                            <div class="text-subheader">{{ $tracking->users->first_name }} {{ $tracking->users->last_name }}</div>
                                            <div class="text-header">No Whatsapp / Handphone</div>
                                            <div class="text-subheader">{{ $tracking->users->no_wa }}</div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-header">Email</div>
                                            <div class="text-subheader">{{ $tracking->users->email }}</div>
                                            <div class="text-header">Alamat</div>
                                            <div class="text-subheader">{{ $tracking->users->alamat }}</div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-header">Nomor Polisi</div>
                                            <div class="text-subheader">{{ $tracking->nopol }}</div>
                                            <div class="text-header">Nama Mobil</div>
                                            <div class="text-subheader">{{ $tracking->nama_mobil }}</div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-header">Tanggal Booking</div>
                                            <div class="text-subheader">{{ $tracking->created_at }}</div>
                                            <div class="text-header">Tanggal Kedatangan</div>
                                            <div class="text-subheader">{{ dateID($tracking->tgl_kedatangan) }}</div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-header">Catatan</div>
                                            <div class="text-subheader">{{ $tracking->catatan }}</div>
                                            <div class="text-header">Total Perbaikan</div>
                                            @if ($tracking->estimasies->total_harga)
                                                {{ moneyFormat($tracking->estimasies->total_harga) }}
                                            @else
                                                <span class="badge badge-pill badge-danger">Not check-in</span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                                @if ($tracking->estimasies->priceLists->count('harga') == !null)
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
                                                @foreach ($tracking->estimasies->priceLists as $index => $list)
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
                                    <div class="row mt-4">
                                        <div class="col-md-7 col-sm-5">
                                        </div>
                                        <div class="col-md-4 col-sm-5 ms-auto">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td class="left">
                                                            <strong>Subtotal</strong>
                                                        </td>
                                                        <td class="right">{{ moneyFormat($tracking->estimasies->priceLists->sum('harga')) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left">
                                                            <strong>PPN (10%)</strong>
                                                        </td>
                                                        <td class="right">{{ moneyFormat(hitungPajak($tracking->estimasies->priceLists->sum('harga'))) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left">
                                                            <strong>Total</strong>
                                                        </td>
                                                        <td class="right">
                                                            <strong>{{ moneyFormat($tracking->estimasies->priceLists->sum('harga') + hitungPajak($tracking->estimasies->priceLists->sum('harga'))) }}</strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-danger"><strong>{{ $tracking->users->first_name }}</strong> Belum melakukan pengecekan kendaraan</div>
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
                                        </table>
                                    </div>
                                @endif

                            </div>
                            <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                                @if ($tracking->pengerjaan->status == 'proses')
                                    <div class="alert alert-info mt-2">Kendaraan Anda sedang dalam <strong>pengerjaan</strong> </div>
                                @elseif($tracking->pengerjaan->status == 'selesai')
                                    <div class="alert alert-success mt-2">Kendaraan Anda sudah <strong>Selesai</strong> dikerjakan, silahkan datang ke lokasi untuk pengambilan unit</div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table  text-center table-striped" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tgl Pengerjaan</th>
                                                <th>Nama Pengerjaan</th>
                                                <th>Status</th>
                                                <th>Gambar</th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            @forelse ($tracking->galleyPengerjaans as $index => $item)
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
                                                        <img src="{{ Storage::url($item->images) }}" width="200" alt="" class=" rounded-3">
                                                    </td class=" align-middle">

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
                </div>
            </div>
        </div>
    </section>
@endsection
@push('addon-script')
    <script>
        $("#myDiv").floatingWhatsApp({
            phone: "6281297135155",
            popupMessage: "Ada yang bisa saya bantu?",
            showPopup: false,
            autoOpenTimeout: 3000,
        });
    </script>
@endpush

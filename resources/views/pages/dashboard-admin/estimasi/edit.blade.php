@extends('layouts.dashboard-admin.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-3">
            <a href="{{ route('laporan-estimasi', $estimasi->id) }}" class="btn btn-sm btn-primary ml-auto shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Download Laporan
            </a>
        </div>
        <nav>
            <div class="nav nav-tabs mb-4" id="nav-tab" role="tablist">
                <a class="nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                    Detail Booking Customer
                </a>
                <a class="nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                    Jenis perbaikan pada kendaraan
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Detail Customer</h6>
                    </div>
                    <div class="card-body">
                        <div>
                            @if ($estimasi->total_harga)
                                <div class="alert alert-info">Customer sudah melakukan <strong>pengecekan</strong> </div>
                            @else
                                <div class="alert alert-danger">Customer belum melakukan pengecekan kendaraan</div>
                            @endif
                        </div>
                        <h1 class="h5 mb-2 text-gray-800">Customer Booking No#<strong>{{ $estimasi->booking->no_booking }}</strong> </h1>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="text-header">Nama Pemilik</div>
                                <div class="text-subheader">{{ $estimasi->users->first_name }} {{ $estimasi->users->last_name }}</div>
                                <div class="text-header">No Whatsapp / Handphone</div>
                                <div class="text-subheader">{{ $estimasi->users->no_wa }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-header">Email</div>
                                <div class="text-subheader">{{ $estimasi->users->email }}</div>
                                <div class="text-header">Alamat</div>
                                <div class="text-subheader">{{ $estimasi->users->alamat }}</div>

                            </div>
                            <div class="col-md-4">
                                <div class="text-header">Nomor Polisi</div>
                                <div class="text-subheader">{{ $estimasi->booking->nopol }}</div>
                                <div class="text-header">Nama Mobil</div>
                                <div class="text-subheader">{{ $estimasi->booking->nama_mobil }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-header">Tanggal Booking</div>
                                <div class="text-subheader">{{ $estimasi->booking->created_at }}</div>
                                <div class="text-header">Tanggal Kedatangan</div>
                                <div class="text-subheader">{{ dateID($estimasi->booking->tgl_kedatangan) }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-header">Catatan</div>
                                <div class="text-subheader">{{ $estimasi->booking->catatan }}</div>
                                <div class="text-header">Total Perbaikan</div>
                                @if ($estimasi->total_harga)
                                    {{ moneyFormat($estimasi->total_harga) }}
                                @else
                                    <span class="badge badge-pill badge-danger">Not check-in</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                {{-- slect-selct estimasi --}}
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Menetukan Jenis Kerusakan</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.estimasi-booking.update', $estimasi->id) }}" method="POST">
                            <div class="row">
                                @csrf
                                @method('PUT')
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="listPekerjaan">Nama Pekerjaan</label>
                                        <select name="listPekerjaan[]" multiple id="listPekerjaan" class="form-control @error('listPekerjaan') is-invalid @enderror">
                                        </select>
                                        @error('listPekerjaan')
                                            <div class="invalid-feedback">
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            </div>
                                        @enderror
                                        {{-- <input type="hidden" name="total_harga" value="{{ $subtotal + hitungPajak($subtotal) }}"> --}}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                                        SIMPAN</button>
                                    <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i>
                                        RESET</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tabel jenis perbaikan pada kendaraan</h6>
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
                                    @foreach ($estimasi->priceLists as $index => $list)
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
        </div>
    </div>
@endsection

@push('addon-script')
    {{-- script slect2 --}}
    <script type="text/javascript">
        $('#listPekerjaan').select2({
            ajax: {
                url: 'http://127.0.0.1:8000/admin/dashboard/ajax/job-list/search',
                processResults: function(data) {
                    return {
                        results: data.map(function(item) {
                            return {
                                id: item.id,
                                text: item.jenis_pekerjaan
                            }
                        })
                    }
                }
            }
        });
        var priceLists = {!! $estimasi->priceLists !!}

        priceLists.forEach(function(pekerjaan) {

            var option = new Option(pekerjaan.jenis_pekerjaan, pekerjaan.id, true, true);
            $('#listPekerjaan').append(option).trigger('change');

        });
    </script>
@endpush

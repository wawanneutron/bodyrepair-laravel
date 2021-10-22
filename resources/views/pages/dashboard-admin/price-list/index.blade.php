@extends('layouts.dashboard-admin.app')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data </button>
            <a href="#" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i>
                Download Laporan
            </a>
        </div>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Price List MBS Body Repair</h1>
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
                                <th>Kode List Harga</th>
                                <th>Jenis Pekerjaan</th>
                                <th>Harga</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($priceList as $item)
                                <tr>
                                    <td>{{ $item->kd_price_list }}</td>
                                    <td>{{ $item->jenis_pekerjaan }}</td>
                                    <td>{{ moneyFormat($item->harga) }}</td>
                                    <td width="15%">
                                        <button class=" btn btn-sm btn-secondary" data-toggle="modal" data-target="#editModal{{ $item->id }}">
                                            <i class="far fa-edit mr-2"></i>ubah
                                        </button>
                                        <a href="#" class=" btn btn-sm btn-danger"><i class="fa fa-trash mr-2"></i>hapus</a>
                                    </td>
                                </tr>
                                {{-- modal edit --}}
                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit list harga</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('dashboard.price-list.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Jenis Pekerjaan:</label>
                                                        <input type="text" name="jenis_pekerjaan" value="{{ $item->jenis_pekerjaan }}" class="form-control @error('jenis_pekerjaan') is_invalid @enderror"
                                                               id="recipient-name">
                                                        @error('jenis_pekerjaan')
                                                            <div class="alert alert-danger mt-1" role="alert">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Harga:</label>
                                                        <input type="number" name="harga" value="{{ $item->harga }}" class="         form-control @error('harga') is_invalid @enderror"
                                                               id="recipient-name">
                                                        @error('harga')
                                                            <div class="alert alert-danger mt-1" role="alert">
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

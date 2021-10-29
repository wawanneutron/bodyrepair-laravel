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
                        <h2>Form Booking Pengajuan</h2>
                        <h1>MBS Auto Car And Paint</h1>
                        <h2>Menerima</h2>
                        <h3><span class="typing"></span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="form-booking">
        <div class="row container-fluid justify-content-center form-pengajuan">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="text-header text-center mb-5">
                            <h4>Form Booking Perbaikan</h4>
                        </div>
                        <form action="{{ route('sendBooking') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label small">No Polisi / Nomor Kendaraan</label>
                                        <input type="text" name="nopol" value="{{ old('nopol') }}" class="form-control @error('nopol') is-invalid @enderror" />
                                        @error('nopol')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label small">Nama Kendaraan</label>
                                        <input type="text" name="nama_mobil" value="{{ old('nama_mobil') }}" class="form-control @error('nama_mobil') is-invalid @enderror" />
                                        @error('nama_mobil')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label small">No Whastapp / Hp</label>
                                        <input type="number" name="no_wa" value="{{ Auth::user()->no_wa }}" class="form-control @error('no_wa') is-invalid @enderror" />
                                        @error('no_wa')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="form-label small">Tanggal Kedatangan</label>
                                        <input type="date" name="tgl_kedatangan" value="{{ old('tgl_kedatangan') }}" class="form-control @error('tgl_kedatangan') is-invalid @enderror" />
                                        @error('tgl_kedatangan')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="form-label small">Alamat Rumah</label>
                                        <textarea class="form-control" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror"
                                                  id="exampleFormControlTextarea1" rows="3">{{ Auth::user()->alamat }}</textarea>
                                        @error('alamat')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="form-label small">Tambahkan Catatan Perbaikan</label>
                                        <textarea class="form-control" name="catatan" value="{{ old('catatan') }}" class="form-control @error('catatan') is-invalid @enderror"
                                                  id="exampleFormControlTextarea1" rows="3"></textarea>
                                        @error('catatan')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col d-grid">
                                <button type="submit" class="btn btn-cte-home ">Submit</button>
                            </div>
                        </form>
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
            popupMessage: "Aada yang bisa saya bantu?",
            showPopup: true,
            autoOpenTimeout: 3000,
        });
    </script>
@endpush

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
            <form>
              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label"
                  >No Polisi / Nomor Kendaraan</label
                >
                <input type="text" class="form-control" />
              </div>
              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label"
                  >Nama Kendaraan</label
                >
                <input type="text" class="form-control" />
              </div>
              <div class="mb-4">
                <label for="jenis_keruasakan" class="form-label"
                  >Pilih Jenis Kerusakan</label
                >
                <select
                  class="form-select"
                  aria-label="Default select example"
                >
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label"
                  >Tanggal Kedatangan</label
                >
                <input type="date" class="form-control" />
              </div>
              <div class="mb-4">
                <label for="exampleFormControlTextarea1" class="form-label"
                  >Catatan Kerusakan</label
                >
                <textarea
                  class="form-control"
                  id="exampleFormControlTextarea1"
                  rows="3"
                ></textarea>
              </div>
              <a
                href="{{url("/booking-success")}}"
                type="submit"
                class="btn btn-cte-home d-grid"
                >Submit</a
              >
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
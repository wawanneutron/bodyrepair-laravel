@extends('layouts.dashboard-user.app')
@section('content')
  <!-- section content -->
  <div class="info-booking container">
    <div class="text-header">
      <h3>Info Booking</h3>
    </div>
    <table class="table table-light table-hover">
      <thead>
        <tr>
          <th scope="col">No Booking</th>
          <th scope="col">Nopol</th>
          <th scope="col">Nama Mobil</th>
          <th scope="col">Tgl Kedatangan</th>
          <th scope="col">Status</th>
          <th scope="col">Option</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row" class="align-middle">BOX-243242</th>
          <td class="align-middle">BG123D</td>
          <td class="align-middle">Xenia</td>
          <td class="align-middle">12/12/2021</td>
          <td class="align-middle">
            <span class="badge bg-info">Pendding</span>
          </td>
          <td class="align-middle">
            <a href="#" class="btn btn-sm btn-secondary">detail</a>
          </td>
        </tr>
        <tr>
          <th scope="row" class="align-middle">BOX-21342</th>
          <td class="align-middle">B133DL</td>
          <td class="align-middle">Pajero</td>
          <td class="align-middle">12/09/2021</td>
          <td class="align-middle">
            <span class="badge bg-success">Acepted</span>
          </td>
          <td class="align-middle">
            <a href="#" class="btn btn-sm btn-secondary">detail</a>
          </td>
        </tr>
        <tr>
          <th scope="row" class="align-middle">BOX-35642</th>
          <td class="align-middle">B145CD</td>
          <td class="align-middle">Pajero</td>
          <td class="align-middle">12/09/2021</td>
          <td class="align-middle">
            <span class="badge bg-success">Acepted</span>
          </td>
          <td class="align-middle">
            <a href="#" class="btn btn-sm btn-secondary">detail</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
@endsection
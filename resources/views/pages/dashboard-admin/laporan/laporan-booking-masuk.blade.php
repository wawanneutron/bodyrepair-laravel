<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Booking Masuk</title>

    <link rel="stylesheet" href="{{ public_path('/vendor/dompdf/bootstrap.min.css') }}">
</head>

<body>
    <div class="laporan">
        <h4 class=" text-center">Laporan Data Booking Masuk</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Booking</th>
                    <th>Nopol</th>
                    <th>Nama Mobil</th>
                    <th>Tgl Booking</th>
                    <th>Tgl Datang</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->no_booking }}</td>
                        <td>{{ $item->nopol }}</td>
                        <td>{{ $item->nama_mobil }}</td>
                        <td>{{ dateID($item->created_at) }}</td>
                        <td>{{ dateID($item->tgl_kedatangan) }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer mt-5 text-right">
            <div class="text-header">Mengetahui</div>
            <br> <br> <br>
            <div class="text-header ">MBS Body Repair</div>
            <span style=" font-size: 12px;">dicetak tanggal
                {{ dateID(Carbon\Carbon::now()->toDateTimeString()) }}</span>
        </div>
    </div>
</body>

</html>

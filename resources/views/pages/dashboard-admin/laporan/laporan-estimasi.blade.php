<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Estimasi</title>

    <link rel="stylesheet" href="{{ public_path('/vendor/dompdf/bootstrap.min.css') }}">
</head>

<body>
    <div class="table-detail-customer mb-5">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Customer Booking No#<strong>{{ $estimasi->booking->no_booking }}</strong> </h1>

        <body style=" font-size: 18px;">
            <table class="table table-bordered">
                <tr>
                    <td width="25%">
                        Nama Pemeilik
                    </td>
                    <td width="1%">:</td>
                    <td>{{ $estimasi->users->first_name }} {{ $estimasi->users->last_name }}</td>
                </tr>
                <tr>
                    <td width="25%">
                        No Whatsapp / Handphone
                    </td>
                    <td width="1%">:</td>
                    <td>{{ $estimasi->users->no_wa }}</td>
                </tr>
                <tr>
                    <td width="25%">
                        Email
                    </td>
                    <td width="1%">:</td>
                    <td>{{ $estimasi->users->email }}</td>
                </tr>
                <tr>
                    <td width="25%">
                        Alamat
                    </td>
                    <td width="1%">:</td>
                    <td>{{ $estimasi->users->alamat }}</td>
                </tr>
                <tr>
                    <td>Nomor Polisi</td>
                    <td>:</td>
                    <td>{{ $estimasi->booking->nopol }}</td>
                </tr>
                <tr>
                    <td>Nama Mobil </td>
                    <td>:</td>
                    <td>{{ $estimasi->booking->nama_mobil }}</td>
                    </td>
                </tr>
                <tr>
                    <td> Tanggal Booking</td>
                    <td>:</td>
                    <td>{{ $estimasi->booking->created_at }}</td>
                </tr>
                <tr>
                    <td>Tanggal Kedatangan</td>
                    <td>:</td>
                    <td>
                        {{ dateID($estimasi->booking->tgl_kedatangan) }}
                    </td>
                </tr>
                <tr>
                    <td>Catatan Customer</td>
                    <td>:</td>
                    <td>
                        {{ $estimasi->booking->catatan }}
                    </td>
                </tr>
                <tr>
                    <td>Total Perbaikan</td>
                    <td>:</td>
                    <td>
                        @if ($estimasi->total_harga)
                            {{ moneyFormat($estimasi->total_harga) }}
                        @else
                            <span class="badge badge-pill badge-danger">Not check-in</span>
                        @endif
                    </td>
                </tr>
            </table>
        </body>
    </div>
    <div class="table-estimasi" style="margin-top: 100px;">
        <h1 class="h3 mb-2 text-gray-800">Jenis perbaikan pada kendaraan</h1>
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
</body>

</html>

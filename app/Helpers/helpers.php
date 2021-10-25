<?php

use Carbon\Carbon;

if (!function_exists('dateID')) {
    function dateID($tanggal)
    {
        $value = Carbon::parse($tanggal);
        $parse = $value->locale('id');
        return $parse->translatedFormat('d F Y');
    }
}

if (!function_exists('moneyFormat')) {
    function moneyFormat($str)
    {
        return 'Rp. ' . number_format($str, '0', '', '.');
    }
}

if (!function_exists('hitungPajak')) {
    function hitungPajak($number)
    {
        $harga = $number;
        $ppn = 0.1;
        return $harga * $ppn;
    }
}

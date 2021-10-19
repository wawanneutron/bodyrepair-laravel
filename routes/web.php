<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/booking-perbaikan', function () {
    return view('pages.booking');
});
Route::get('/booking-success', function () {
    return view('pages.success');
});
Route::get('/customer/dashboard', function () {
    return view('pages.dashboard-user.dashboard');
});
Route::get('/customer/dashboard-booking', function () {
    return view('pages.dashboard-user.dashboard-booking');
});
Route::get('/customer/dashboard-tracking', function () {
    return view('pages.dashboard-user.dashboard-tracking');
});

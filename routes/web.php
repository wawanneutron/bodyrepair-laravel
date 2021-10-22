<?php

use App\Http\Controllers\Admin\BookingMasukController;
use App\Http\Controllers\Admin\EstimasiBookingController;
use App\Http\Controllers\Admin\PriceListController;
use App\Http\Controllers\BookingPerbaikanController;
use Illuminate\Support\Facades\Auth;
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
})->name('home');

Route::prefix('customer')
    ->middleware(['auth', 'user'])
    ->group(function () {
        Route::get('/booking-perbaikan', [BookingPerbaikanController::class, 'index'])
            ->name('booking');
        Route::post('/booking-perbaikan', [BookingPerbaikanController::class, 'store'])
            ->name('sendBooking');

        Route::get('/booking-success/{id}', [BookingPerbaikanController::class, 'success'])
            ->name('success');

        Route::get('/dashboard', function () {
            return view('pages.dashboard-user.dashboard');
        });
        Route::get('/dashboard-booking', function () {
            return view('pages.dashboard-user.dashboard-booking');
        });
        Route::get('/dashboard-tracking', function () {
            return view('pages.dashboard-user.dashboard-tracking');
        });
    });

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.dashboard-admin.dashboard');
        });
        Route::resource('/dashboard/booking-masuk', BookingMasukController::class, ['as' => 'dashboard']);
        Route::resource('/dashboard/estimasi-booking', EstimasiBookingController::class, ['as' => 'dashboard']);
        Route::resource('/dashboard/price-list', PriceListController::class, ['as' => 'dashboard']);
    });

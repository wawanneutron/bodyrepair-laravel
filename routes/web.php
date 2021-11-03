<?php

use App\Http\Controllers\Admin\BookingMasukController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EstimasiBookingController;
use App\Http\Controllers\Admin\PengerjaanController;
use App\Http\Controllers\Admin\PriceListController;
use App\Http\Controllers\BookingPerbaikanController;
use App\Http\Controllers\TrackingPerbaikanController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\EstimasiController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\PengerjaanController as UserPengerjaanController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::post('tracking-perbaikan', [TrackingPerbaikanController::class, 'tracking'])
    ->name('tracking-perbaikan');

Route::prefix('customer')
    ->middleware(['auth', 'user'])
    ->group(function () {
        Route::get('/booking-perbaikan', [BookingPerbaikanController::class, 'index'])
            ->name('booking');
        Route::post('/booking-perbaikan', [BookingPerbaikanController::class, 'store'])
            ->name('sendBooking');
        Route::get('/booking-success/{id}', [BookingPerbaikanController::class, 'success'])
            ->name('success');

        Route::get('/dashboard/info-booking', [BookingController::class, 'booking'])->name('info-booking');
        Route::put('/dashboard/info-booking/{id}', [BookingController::class, 'update'])->name('info-booking-update');

        Route::get('/dashboard/info-estimasi', [EstimasiController::class, 'index'])->name('info-estimasi');
        Route::get('/dashboard/detail-estimasi/{id}', [EstimasiController::class, 'details'])->name('detail-estimasi');

        Route::get('/dashboard/info-pengerjaan', [UserPengerjaanController::class, 'index'])->name('info-pengerjaan');
        Route::get('/dashboard/detail-pengerjaan/{id}', [UserPengerjaanController::class, 'details'])->name('detail-pengerjaan');
    });

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/dashboard/statistik', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/dashboard/booking-masuk', BookingMasukController::class, ['as' => 'dashboard']);
        Route::resource('/dashboard/estimasi-booking', EstimasiBookingController::class, ['as' => 'dashboard']);
        Route::resource('/dashboard/price-list', PriceListController::class, ['as' => 'dashboard']);
        Route::resource('/dashboard/pengerjaan-bodyrepair', PengerjaanController::class, ['as' => 'dashboard']);
        Route::post('/dashboard/create-history-pengerjaan-bodyrepair/{id}', [PengerjaanController::class, 'createHistory'])->name('create-history');
        Route::put('/dashboard/update-pengerjaan-bodyrepair/{id}', [PengerjaanController::class, 'updateStatus'])->name('update-status');
        Route::put('/dashboard/status-pengerjaan/{id}', [PengerjaanController::class, 'statusGalleryPengerjaan'])->name('status-pengerjaan');
        Route::get('/dashboard/ajax/job-list/search', [PriceListController::class, 'ajaxSearch']);
    });

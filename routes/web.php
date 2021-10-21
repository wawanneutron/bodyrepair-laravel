<?php

use App\Http\Controllers\Admin\PriceListController;
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
});
Route::get('/booking-perbaikan', function () {
    return view('pages.booking');
});
Route::get('/booking-success', function () {
    return view('pages.success');
});


Route::prefix('customer')
    ->middleware(['auth', 'user'])
    ->group(function () {
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
        Route::get('/dashboard/booking-masuk', function () {
            return view('pages.dashboard-admin.booking-masuk');
        });
        Route::resource('/dashboard/price-list', PriceListController::class, ['as' => 'dashboard']);
    });

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\Resources\Controllers\ResourcesController;
use App\Modules\Booking\Controllers\BookingController;


Route::prefix('resources')
    ->name('resources.')
    ->group(
        static function () {
            Route::post('/', [ResourcesController::class, 'store'])->name('storeResources');
            Route::get('/', [ResourcesController::class, 'index'])->name('indexResources');
            Route::get('/{resourcesId}/bookings', [ResourcesController::class, 'showBookings'])->name('showBookingsResources');
        }
    );

Route::prefix('bookings')
    ->name('bookings.')
    ->group(
        static function () {
            Route::post('/', [BookingController::class, 'store'])->name('storeBookings');
            Route::delete('/{bookingId}', [BookingController::class, 'destroy'])->name('destroyResources');
        }
    );



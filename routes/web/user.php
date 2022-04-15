<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\RoomController;

Route::prefix('/')
    ->middleware(['auth', 'is.user'])
    ->name('user.')
    ->group(function ()
{
        Route::get('/', [DashboardController::class, 'index'])
            ->name('home');

        Route::get('/rooms', [RoomController::class, 'index'])
            ->name('rooms.index');

        Route::get('/booking', [BookingController::class, 'index'])
            ->name('booking.index');
        Route::get('/booking/create', [BookingController::class, 'create'])
            ->name('booking.create');
        Route::post('/booking/store', [BookingController::class, 'store'])
            ->name('booking.store');
        Route::put('/booking/{id}/cancel', [BookingController::class, 'cancel'])
            ->name('booking.cancel');

        // Route::get('/mail', function () {
        //     Mail::to('fajarwindhuzulfikar@gmail.com')
        //         ->send(new \App\Mail\BookingMail('Booking Ruangan 3', 'Admin'));
        //     return 'Terkirim';
        // });
    });
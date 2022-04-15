<?php

use App\Http\Controllers\Admin\BookingListController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')
    ->middleware(['auth', 'is.admin'])
    ->name('admin.')
    ->group(function ()
{
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/user/json', [UserController::class, 'json'])
            ->name('user.json');

        Route::get('/user/{id}/change-pass', [UserController::class, 'change_pass'])
            ->name('user.change-pass');

        Route::put('/user/{id}/update-pass', [UserController::class, 'update_pass'])
            ->name('user.update-pass');

        Route::get('/booking-list/json', [BookingListController::class, 'json'])
            ->name('booking-list.json');

        Route::get('/booking-list', [BookingListController::class, 'index'])
            ->name('booking-list.index');

        Route::put('/booking-list/{id}/update/{value}', [BookingListController::class, 'update'])
            ->name('booking-list.update');

        Route::resources([
            'user' => UserController::class,
            'room' => RoomController::class,
        ]);
    });
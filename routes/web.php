<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BookingListController;

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

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

Route::prefix('/')
    ->get('/', [UserDashboardController::class, 'index'])
    ->middleware(['auth', 'which.home'])
    ->name('user.dashboard');

Route::prefix('/')
    ->middleware(['auth', 'is.user'])
    ->group(function(){
        // Route::get('/', [UserDashboardController::class, 'index'])
        // ->name('user.dashboard');
    });

Route::prefix('admin')
    ->middleware(['auth', 'is.admin'])
    ->group(function(){
        Route::get('/', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

        Route::get('/user/json', [UserController::class, 'json'])
        ->name('user.json');

        Route::get('/user/{id}/change-pass', [UserController::class, 'change_pass'])
        ->name('user.change-pass');

        Route::put('/user/{id}/update-pass', [UserController::class, 'update_pass'])
        ->name('user.update-pass');

        Route::get('/room/json', [RoomController::class, 'json'])
        ->name('room.json');

        Route::get('/booking-list/json', [BookingListController::class, 'json'])
        ->name('booking-list.json');

        Route::get('/booking-list', [BookingListController::class, 'index'])
        ->name('booking-list.index');

        Route::put('/booking-list/{id}/update/{value}', [BookingListController::class, 'update'])
        ->name('booking-list.update');

        Route::resources([
            'user'          => UserController::class,
            'room'          => RoomController::class,
        ]);
    });
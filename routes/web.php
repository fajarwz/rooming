<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;


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

Auth::routes(['register' => false, 'reset' => false]);

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

        Route::resources([
            'user'          => UserController::class
        ]);
    });